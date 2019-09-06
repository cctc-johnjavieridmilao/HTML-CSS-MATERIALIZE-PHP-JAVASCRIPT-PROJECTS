
<?php
$error="";
 include 'connection/mysqliconn.php';
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
     if (empty($uname) || empty($password)) {
         $error = '<div class="callout callout-danger">
                <h4>Please Enter Admin Username and Password!</h4>
              </div>';
     }
    
    $sql="SELECT * FROM admin_account WHERE user='".$uname."'AND Pass='".$password."' limit 1";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['ID'];

     if (mysqli_num_rows($result) == 1)
    {
     $updateStat = "UPDATE admin_account SET status=1 WHERE ID=1";
     mysqli_query($connect,$updateStat);
    header('location: loadadmin.php');
    $_SESSION['welcomeadmin'] = "Welcome";
    }
    else 
    {
     $error = '<div class="callout callout-danger">
                <h4>Invalid Username and Password!</h4>
              </div>';
    }
 }


function AdminSafe(){
include 'connection/mysqliconn.php';
$query = "SELECT status FROM admin_account WHERE ID=1";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($res);
if ($row['status'] == 0) {
    header("Location:admin_login.php");
}
}
function Adminreload(){
include 'connection/mysqliconn.php';
$query = "SELECT status FROM admin_account WHERE ID=1";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($res);
if ($row['status'] == 1) {
    header("Location:adminlast.php");
}
}
?>
