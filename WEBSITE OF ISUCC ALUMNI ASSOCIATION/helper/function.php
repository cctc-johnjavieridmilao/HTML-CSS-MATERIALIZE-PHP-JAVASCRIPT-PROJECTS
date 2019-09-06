
<?php
include ('connection/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_code($code,$email){
//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'johnjavieridmilao12@gmail.com';                 // SMTP username
    $mail->Password = 'jhayjhay12345';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('isabelastateuniversityi@gmail.com', 'Alumni Tracking');   // Add a recipient
    $mail->addAddress($email);               // Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation Code';
    $mail->Body    = "Thankyou You for joining Us Your Confimation code is:" .$code;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['user_email'] = $email;
    $_SESSION['account_create'] = 'Your Account is Successfully Created Please Check your Email Now';
    header("location:login.php");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
function send_code1($code,$email){
//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'johnjavieridmilao12@yahoo.com';                 // SMTP username
    $mail->Password = 'clarisedana12345';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('johnjavieridmilao12@yahoo.com', 'Alumni Tracking');   // Add a recipient
    $mail->addAddress($email);               // Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation Code';
    $mail->Body    = "Thankyou You for joining Us Your Confimation code is:" .$code;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['user_email'] = $email;
    $_SESSION['account_create'] = 'Your Account is Successfully Created Please Check your Email Now';
    header("location:confirm.php");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

function confirm_email(){
    GLOBAL $db;
    if (isset($_POST['confirm'])) {
        $code = trim($_POST['confirm_code']);
        $user_email = $_SESSION['user_email'];
        if(empty($code)){
            echo "<script>swal('Please Enter Confirmation Code!','click okay','error');</script>";
        }
        else{
            $Query = $db->prepare("SELECT code FROM account WHERE email = ? && code = ?");
            $Query->execute([$user_email,$code]);
            if($Query->rowCount() == 1){
                $update_code = 1;
                $Query_Update = $db->prepare("UPDATE account SET status = ? WHERE email = ? && code = ?");
                $Query_Update->execute([$update_code, $user_email,$code]);
                if($Query_Update){
                    $_SESSION['confimation_success'] = "Your Account Is Successfully Confirm!";
                    header("location:login.php");
                }
                else{
                   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Query not Work! <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button></div>";
                }
            }else{
             echo "<script>swal('Invalid Code!','click okay','error');</script>";
            }
        }
    }
}

function user_login(){
    include 'connection/mysqliconn.php';
    if(isset($_POST['login'])) 
    {
       $fname = $_POST['firstname'];
       $password =  $_POST['password'];
       $password = md5($password);
       $_SESSION['firstname'] = $_POST['firstname'];
        $queryLogin = "SELECT * FROM account WHERE first_name='$fname' and password ='$password'";
        $res = mysqli_query($connect,$queryLogin);
        $numrow = mysqli_num_rows($res);
        $row = mysqli_fetch_array($res);
        
        
        if ($numrow == 1)
         {
            $Fnamerow = $row['first_name'];
            $Lastnamerow = $row['last_name'];
            $Mnamerow = $row['middle_name'];
            $passwordrow = $row['password'];
            $banrow = $row['ban'];
            $dateofbanrow = $row['dateofban'];
            $status = $row['status'];
            $id =  $row['acc_id'];
            $image = $row['images'];
            $datenow =  Date('Y-m-d');
            $dtnow = new DateTime($datenow);
            $dt = new DateTime($dateofbanrow);
            if ($fname == $Fnamerow && $password == $passwordrow) 
            {
               if ($status == 0)  
               {
                 echo "<script>swal('Account not Yet Approve','','error');</script>";
               }
               else 
               {
                if ($banrow == 0) 
                {
                  
                  $_SESSION['Unaname'] = $Fnamerow;
                   $_SESSION['user_id'] = $id;
                   $_SESSION['fullname'] = "$Fnamerow $Mnamerow $Lastnamerow";
                   $queryUpdate = "UPDATE account SET online='Active',welcome=1 WHERE acc_id='$id'";
                   mysqli_query($connect,$queryUpdate);
                   header("Location:home.php");
                  
                  }
                else
                  {
                  if ($dtnow->format('Y-m-d : H:i:s') > $dateofbanrow) 
                  {
                    //echo "<script>swal('Please Contact Admin to Unbanned your Account','','warning');</script>";
                    header("Location:administrator_contact.php");
                    $_SESSION['fullname_for_contact'] = "$Fnamerow $Mnamerow $Lastnamerow";
                  }
                  else 
                  {
                    echo "<script>swal('Your Account has Been Banned, It Will Unban on ".$dt->format('M-d-y : H:i:s')."','','error');</script>";
                  }
                 
                }
               }
            }
          }
        else 
        {
        echo "<script>swal('Wrong Firstname or Password','','error');</script>";
      }
   }
}

function Logout(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Querys = $db->prepare("UPDATE account SET online='inActive' WHERE acc_id = ?");
$Querys->execute([$user_id]);
header("Location: newhome.php");
}

function user_profile(){
    GLOBAL $db;
    $user_id = $_SESSION['user_id'];
    $Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $email = $row->email;
    $student_id = $row->student_id;
    $marital = $row->marital;
    $year = $row->year;
   
   echo "<div style='height: 25rem;'' class='table-responsive'><table class='table'>
   <tr><td>FirstName</td><td>$first_name</td></tr>
   <tr><td>Lastname</td><td>$last_name</td></tr>
    <tr><td>MiddleName</td><td>$middle_name</td></tr>
   <tr><td>Email</td><td>$email</td></tr>
   <tr><td>Student ID</td><td>$student_id</td></tr>
   <tr><td>Marital Status</td><td>$marital</td></tr>
   <tr><td>Year Graduated</td><td>$year</td></tr>
   <div><tr><td><a href='home.php' class='btn btn-danger'>Back</a> <a href='test.php' class='btn btn-primary edit_data' name='edi'>Update</a></tr></td></div>
   </table></div>";

}

function userupdate(){
    GLOBAL $db;
    $user_id = $_SESSION['user_id'];
    $Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $email = $row->email;
    $student_id = $row->student_id;
    $marital = $row->marital;
    $year = $row->year;
    
    ?>
    <form method='POST'  action='userprofile.php'>
       <div class='form-row'>
       <div class='col-md-6'>
        <label>First Name</label>
        <input type='text' name='fname' class='form-control' value='<?php if(empty($first_name)){echo 'No Data';} else{echo$first_name;} ?>' readonly>
       </div>
       <div class='col-md-6'>
        <label>Last Name</label>
        <input type='text' name='lname' class='form-control' value='<?php if(empty($last_name)){echo 'No Data';} else{echo$last_name;} ?>' readonly>
       </div>
       <div class='col-md-6'>
        <label>Middle Name</label>
        <input type='text' name='mname' class='form-control' value='<?php if(empty($middle_name)){echo 'No Data';} else{echo$middle_name;} ?>' readonly>
       </div>
       <div class='col-md-6'>
        <label>Email</label>
        <input type='text' name='email' class='form-control' value='<?php if(empty($email)){echo 'No Data';} else{echo$email;} ?>' >
       </div>
       <div class='col-md-6'>
        <label>Student ID</label>
        <input type='text' name='studentid' class='form-control' value='<?php if(empty($student_id)){echo 'No Data';} else{echo$student_id;} ?>' readonly>
       </div>
       <div class='col-md-6'>
        <label>Marital Status</label>
        <select class='form-control' name='marital'>
        <option value="Single"
          <?php
          if ($marital == 'Single') {
            echo "selected";
           } 
          ?>
        >Single</option>
       <option value="Divorced"
         <?php
          if ($marital == 'Divorced') {
            echo "selected";
           } 
          ?>
       >Divorced</option>
       <option value="Married"
          <?php
          if ($marital == 'Married') {
            echo "selected";
           } 
          ?>
       >Married</option>
       <option value="Separated"
          <?php
          if ($marital == 'Separated') {
            echo "selected";
           } 
          ?>
       >Separated</option>
       <option value="Windowed"
        <?php
          if ($marital == 'Windowed') {
            echo "selected";
           } 
          ?>
       >Windowed</option>
        </select>
       </div>
       <div class='col-md-6'>
        <label>Year Graduated</label>
        <input type='text' name='year' class='form-control' value='<?php if(empty($year)){echo 'No Data';} else{echo$year;} ?>' readonly>
       </div>

       <div class='form-group col-md-6'>
        <br>
       <button type='submit' name='submitdata' class='btn btn-success btn-block'> <span class="fas fa-edit"> Update Data</span></button>
       <div>
       </div>
    </form>
    <?php
}
$alert = "";
 GLOBAL $db;
include 'connection/mysqliconn.php'; 
if (isset($_POST['submitdata'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $email = $_POST['email'];
    $studentid = $_POST['studentid'];
    $marital = $_POST['marital'];
    $year = $_POST['year'];
	 $user_id = $_SESSION['user_id'];

     $query = "UPDATE account SET first_name = '$fname', last_name = '$lname', middle_name = '$mname', email = '$email',student_id = '$studentid', marital = '$marital',year ='$year' WHERE acc_id = '$user_id'";
    mysqli_query($connect,$query);
    
    if (mysqli_affected_rows($connect)>=1)
    {
     $alert = "<script>swal('Update Successfully','','success');</script>";
    }
    else
    {
       $alert = "<script>swal('No Records Updated','','warning');</script>";
    }
   
}

function DisplayPhoto(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $year = $row->year;
    $program = $row->program;
    echo "<a href='images/$image' uk-tooltip='title: Click to View Your Photo $first_name $middle_name $last_name; pos: right' data-title='$first_name Graduated At Year Of $year Course $program' data-lightbox='image-1'><img src='images/$image' class='img-responsive' width='50px' height='50px'/></a>";
}
function DisplayPhotohome(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $year = $row->year;
    $program = $row->program;
    echo "<a href='images/$image' class='navbar-brand px-lg-4 mr-0' uk-tooltip='title: Click to View Your Photo $first_name $middle_name $last_name; pos: left' data-title='$first_name Graduated At Year Of $year Course $program' data-lightbox='image-1'><img src='images/$image' class='rounded-circle' width='40px' height='40px'/></a>";
}
function DisplayPhotonav(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $year = $row->year;
    $program = $row->program;
    echo "<a href='images/$image' uk-tooltip='title: Click to View Your Photo $first_name $middle_name $last_name; pos: bottom' data-title='$first_name Graduated At Year Of $year Course $program' data-lightbox='image-1'><img src='images/$image' class='rounded-circle' height='100px;' width='100px;'/></a>";
}
function Displayusername(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $year = $row->year;
    $program = $row->program;
    echo "<h1 style='font-size:13px'>$first_name $last_name</h1>";
}
function Displayimgcm(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT images FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    echo "<a href='images/$image'><img src='images/$image' style='height:20px;width:20px; border-radius: 40% !important;' /></a>";
}
function Displaname(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $image = $row->images;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;
    $year = $row->year;
    $program = $row->program;
    echo "<h1 title='$first_name $last_name'></h1>";
}
function DisplayProfilename(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $middle_name = $row->middle_name;

    echo "$first_name $middle_name $last_name";

}
function DisplayCourse(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $program = $row->program;

    echo $program;

}
function DisplayYear(){
GLOBAL $db;
$user_id = $_SESSION['user_id'];
$Query = $db->prepare("SELECT * FROM account WHERE acc_id = ?");
    $Query->execute([$user_id]);
    $row = $Query->fetch(PDO::FETCH_OBJ);
    $year = $row->year;

    echo $year;

}



