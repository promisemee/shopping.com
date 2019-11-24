  <?php
    if (!empty($_POST)){
        if (isset($_POST['email'])&&isset($_POST['password'])){
          $result = $this->model->getUser($_POST['email'], $_POST['password']);
          if ($result->rowCount()>0){
            if ($result[0]['admin']==1){
              $_SESSION['admin']='admin';
            }else{
              $_SESSION['username'] = $result[0]['fname'];
            }
            header('Location:/mall/index.php');
          } else{
            echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";
          }
        } 
      }

  ?>
