	<?php 
include 'conn.php';
if ($_POST) {
	$id = $_POST['img_id'];
	$dis = mysqli_real_escape_string($connect,$_POST['name_dish']);
	$des = mysqli_real_escape_string($connect,$_POST['des']);
	$menu_des = mysqli_real_escape_string($connect, $_POST['edit_menu_description']);
	$cat = mysqli_real_escape_string($connect, $_POST['cat_update']);
	$image = $_FILES['image'] ["name"];
	$tmp_name = $_FILES['image'] ["tmp_name"];
	$r = rand(1,500);
	move_uploaded_file($tmp_name, "../upload/$r$image");

	if (empty($image)) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Image is Empty</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
	}
	else{
     $query = "UPDATE tbl_menus SET name='$dis', description='$des', image='$r$image',descriptions='$menu_des',category='$cat' WHERE id='$id'";
	if (mysqli_query($connect,$query)) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Updated!</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
	}
	else {
		echo 'query Error';
	}
	}

}




?>