<?php 
require 'conn.php';
if ($_POST) {
	$name = mysqli_real_escape_string($connect, $_POST['name_dish']);
	$des = mysqli_real_escape_string($connect, $_POST['des']);
	$cat = mysqli_real_escape_string($connect, $_POST['cat']);
	$menu_descriptions = mysqli_real_escape_string($connect, $_POST['menu_description']);
	$image = $_FILES['image'] ["name"];
	$tmp_name = $_FILES['image'] ["tmp_name"];
	$r = rand(1,500);
	move_uploaded_file($tmp_name, "../upload/$r$image");

	$query = "INSERT INTO tbl_menus (name,description,image,category,available,descriptions) VALUES ('$name','$des','$r$image','$cat',1,'$menu_descriptions')";
	if (mysqli_query($connect,$query)) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Inserted!</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
	}
	else{
		echo 'Error query!';
	}
}

?>