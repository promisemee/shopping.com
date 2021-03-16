<?php
	include 'Controller.php';
	class Product_Controller extends Controller{

		public function __construct(){
			parent::__construct();
			$this->model= new Product_model();
			
		}

		public function productList(){
    		//calls product category list
    		$category = $_REQUEST['cat'];
            $title = strtoupper($category);
            $type = 'cat';
    		
    		$sql = 'select * from Product where p_category="'.$category.'"';

    		$lst = $this->model->selectSQL($sql);
    		$rows = $lst -> rowCount();
    		$list = $lst->fetchAll();

    		$clist = $this->model->selectFilter2('p_colour', $category);
    		$slist = $this->model->selectFilter2('p_sub', $category);
    		
    		if (!session_start()) session_start();

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();

        	require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_list.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
    	}

    	public function reloadList(){

    		if(isset($_POST["action"])){

                if (isset($_REQUEST['cat'])) {
                    //reload list for category
                    $title = $_REQUEST['cat'];
                    $type = 'cat';
                    $sql = 'select * from Product where p_category= "'.$title.'"';
                }
                
                if (isset($_REQUEST['search'])) {
                    //reload list for search
                    $title = $_REQUEST['search'];
                    $type = 'search';
                    $sql = 'select * from Product where p_name like "%'.$title.'%"';
                }

    		}

    		//Filter by
    		if(isset($_POST["sub"])&&(!empty($_POST["sub"]))){
    			$sub_filter = implode("','", $_POST["sub"]);
    			$sql.=" AND p_sub IN('".$sub_filter."')";
    		}

    		if(isset($_POST["colour"])&&(!empty($_POST["colour"]))){
    			$colour_filter = implode("','", $_POST["colour"]);
    			$sql.=" AND p_colour IN('".$colour_filter."')";
    		}

                        //Sort By

            if(isset($_POST["sortby"])&&(!empty($_POST["sortby"]))){
                switch($_POST["sortby"]){
                    case "recommend":
                        break;
                    case "newest":
                        $sql.=" order by p_id desc";
                        break;
                    case "highPrice":
                        $sql.=" order by p_price desc";
                        break;
                    case "lowPrice":
                        $sql.=" order by p_price";
                        break;
                }
            }

    		$lst = $this->model->selectSQL($sql);
    		$rows = $lst -> rowCount();
    		$list = $lst->fetchAll();

    		if (!isset($_SESSION))	session_start();

    		require_once $_SERVER["DOCUMENT_ROOT"]."/view/album.php";
    	}

    	public function productView(){
    		//calls product view page
    		$pid = $_REQUEST['productNo'];
    		$product = $this->model->selectProduct($pid);


    		if (!$product) {	//such product does not exist
    			require_once $_SERVER["DOCUMENT_ROOT"]."/view/404.php";
    			exit;
    		}

            if ($product['p_quantity']>0){
                $instock = "In Stock";
            }else $instock ="Sold Out";

    		if (!isset($_SESSION))	session_start();

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();

    		require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_detail.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
		}

        public function searchProduct(){
            $search = $_REQUEST['search'];
            $type = 'search';
            $list = $this->model->searchProduct($search);
            $rows = $list -> rowCount();
            $list = $list ->fetchAll();
            $title = $search;
            $clist = $this->model->selectFilter('p_colour');
            $slist = $this->model->selectFilter('p_sub');


            if (!isset($_SESSION))  session_start();

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();

            require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_list.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
        }

		public function addProduct(){
			if (!isset($_SESSION))	session_start();

			if (!isset($_SESSION['user'])||($_SESSION['user']!='Admin')){
				require_once $_SERVER["DOCUMENT_ROOT"]."/view/403.php";
				exit;
			}
            $pid = NULL;
            $pname = NULL;
            $pcat = NULL;
            $psub = NULL;
            $pcolour = NULL;
            $pprice = NULL;
            $pq = NULL;
            $pdesc = NULL;
            $pimg = 
                '<div class="form-group">
                <label class="col-md-4 control-label">PRODUCT IMAGE</label>
                <div class="col-md-4">
                <input id="p_image" name="p_image" type="file" required>
                </div>
            </div> ';
            $action = "checkupdate.php";

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();

            require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_upload.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";

		}

        public function checkProduct(){
            if (!isset($_SESSION))  session_start();

            if (!empty($_POST)){
                if (isset($_POST['p_name'])){
                    $p_id = $this->model->uploadProduct($_POST['p_name'], $_POST['p_category'], $_POST['p_sub'], $_POST['p_colour'], $_POST['p_price'], $_POST['p_quantity'], $_POST['p_description']);

                    try{    //upload image
                        $target_dir = $_SERVER["DOCUMENT_ROOT"]."/public/img/".$_POST['p_category']."/";
                        $target_file = $target_dir . basename($_FILES["p_image"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $newfilename = $p_id.".".$imageFileType;
                        $target_file = $target_dir . $newfilename;
                        
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["p_image"]["tmp_name"]);
                        if($check !== false) {
                            $uploadOk = 1;
                        } else {
                             $this->walert("File is not an image.");
                            $uploadOk = 0;
                        }
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                             $this->walert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                            $uploadOk = 0;
                        }
                        if ($uploadOk == 0) {
                            $this->walert("Sorry, your file was not uploaded.");
                            // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
                                $this->walert("Product Successfully Uploaded. ID :".$p_id);
                                echo "<script type='text/javascript'>
                                window.location.href='/product/addProduct.php'
                                </script>";
                                //TODO : can be done with ajax?
                            } else {
                                $this->walert("Sorry, there was an error uploading your file.");
                            }
                        }

                    }catch(Exception $e){
                        var_dump('Error Uploading:', $e->getMessage());
                    }
                }
            }

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();

            require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_upload.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";

        }

		public function modifyProduct(){
			if (!isset($_SESSION))	session_start();
            if (isset($_REQUEST['pid'])){
    			$pid = $_REQUEST['pid'];
                $product = $this->model->selectProduct($pid);

    			if (!isset($_SESSION['user'])||($_SESSION['user']!='Admin')){
    				require_once $_SERVER["DOCUMENT_ROOT"]."/view/403.php";
    				exit;
    			}else{

                    $_SESSION['p_id'] = $pid;

                    $pname = $product['p_name'];
                    $pcat = $product['p_category'];
                    $psub = $product['p_sub'];
                    $pcolour = $product['p_colour'];
                    $pprice = $product['p_price'];
                    $pq = $product['p_quantity'];
                    $pdesc = $product['p_description'];
                    $pimg=NULL;
                    $action = "/product/update_Product.php";

                    $navbar = $this->navbar();
                    $sidebar = $this->sidebar();

                    require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
                    require_once $_SERVER["DOCUMENT_ROOT"]."/view/product_upload.php";
                    require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
    			}
            }
		}

        public function updateProduct(){
            if (!isset($_SESSION))  session_start();
                if (!empty($_POST)){
                    if (isset($_POST['p_name'])){
                        $result = $this->model->updateProduct($_POST['p_name'], $_POST['p_category'], $_POST['p_sub'], $_POST['p_colour'], $_POST['p_price'], $_POST['p_quantity'], $_POST['p_description'], $_SESSION['p_id']);

                        $this->walert("Item Modified");
                        echo '<script language="javascript">';
                        echo 'window.location.replace("/product/viewProduct.php?productNo='.$_SESSION['p_id'].'")';
                        echo '</script>';

                    }

                }

                
        }

		public function deleteProduct(){
			if (!isset($_SESSION))	session_start();

			$cat = $_REQUEST['cat'];
			$pid = $_REQUEST['productNo'];

			if (!isset($_SESSION['user'])||($_SESSION['user']!='Admin')){
				require_once $_SERVER["DOCUMENT_ROOT"]."/view/403.php";
				exit;
			}else{
				$this->model->deleteProduct($cat, $pid);
				 $this->walert("Item Deleted!");
                echo '<script language="javascript">';
                echo 'window.location.replace("/product/product_list.php?cat='.$cat.'")';
                echo '</script>';
				return $cat;
			}
		}
	}