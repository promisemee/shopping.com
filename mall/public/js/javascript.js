function deleteObject(cat, id){
	var c = confirm('Are you sure want to delete this item?');
	if (c == true){
		window.location.href = "/mall/product/deleteProduct.php?cat="+cat+"&productNo="+id;
	}
}

var subcategory={
    outerwears:['jacket', 'coat'],
    dresses:['long', 'short'],
    tops:['t-shirt', 'hoodies','shirt','blouse'],
    bottoms:['jeans','skirt']
}

function makeSubmenu(value) {
    if (value.length == 0) document.getElementById("p_sub").innerHTML = "<option></option>";
    else {
        var citiesOptions = "";
        for (categoryId in subcategory[value]) {
            citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
        }
        document.getElementById("p_sub").innerHTML = citiesOptions;
    }
}

function plsLogin(){
  alert("Please Login!");
}

//https://codepen.io/damianocel/pen/EVpqNJ
$(document).ready(function () {
  $(window).scroll(function () {
    var top =  $(".goto-top");
        if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 200 )) {
  top.animate({"margin-left": "0px"},1500);
        } else {
            top.animate({"margin-left": "-100%"},1500);
        }
    });

    $(".goto-top").on('click', function () {
        $("html, body").animate({scrollTop: 0}, 400);
    });
});