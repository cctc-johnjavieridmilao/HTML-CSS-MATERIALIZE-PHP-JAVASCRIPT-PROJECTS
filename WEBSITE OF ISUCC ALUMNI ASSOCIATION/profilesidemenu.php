<div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic" align="center">
         <?php DisplayPhoto(); ?>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name" style="color: green;">
           <?php DisplayProfilename(); ?>
          </div>
          <div class="profile-usertitle-job">
           <?php DisplayCourse(); ?> Graduate, Batch <?php DisplayYear() ?>
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal"> <span class="fas fa-user-edit"> Change Profile</span></button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <div class="profile-usermenu">
        <div class="list-group">
    <strong style=" font-size: 13px;"><a href="userprofile.php" class="list-group-item ">General Information</a></strong>
    <strong style=" font-size: 13px;"><a href="user_records.php" class="list-group-item">My Records</a></strong>
    <strong style=" font-size: 13px;"><a href="userchangepass.php" class="list-group-item">Change Password</a></strong>
   <strong style=" font-size: 13px;"><a href="home.php" class="list-group-item">Back</a></strong> 
   
    </div>
    </div>
     