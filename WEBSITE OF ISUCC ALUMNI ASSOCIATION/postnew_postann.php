
 <div id="news" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <?php //require_once 'check_newss.php'; ?>
         <?php //echo $message; ?>
         <div id="alertsss"></div>
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;text-align: center;">  
      <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 class="modal-title" style="color: white;font-size: 18px;"> <span class="fas fa-newspaper"> Post News</span></h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="main" id="news_form" enctype="multipart/form-data">
           <label>Choose Photo</label>
          <input type="file" name="image" class="form-control" accept="image/*" id="image">
        <br />
          <label>Subject</label>
          <input type="text" name="subject" class="form-control" id="subject" pattern="[^#]*" oninvalid="alert('# number is not Alowed')">
        <br />
        <label>Enter News</label>
        <textarea class="form-text form-control" style="height: 200px;" name="editor" id="comment"></textarea>
        <br />
        <button style="margin-top: 0 auto;margin: 0 auto;"  type="submit" id="submit_news" class="form-submit btn btn-success" name="postnews"><span class="fas fa-check"> Post</span> <span class="fas fa-spinner fa-spin" id="spinner_sub_news" style="display: none;"></span></button>
        <button class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>
      </form>
      </div>      
    </div>
  </div>
</div>
 
<div id="test1" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
    <div id="alert_ann"></div>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;text-align: center;">  
      <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 class="modal-title" style="color: white;font-size: 18px;"> <span class="fas fa-bullhorn"> Post Announcement</span></h4>
      </div>
      <div class="modal-body">
        <?php //require_once 'check_com.php'; ?>
         <?php //echo $message; ?>
        <form action="" method="post" id="form_announcement" class="main" enctype="multipart/form-data">
           <label>Choose Photo</label>
          <input type="file" name="image" class="form-control" accept="image/*" id="image_ann">
        <br />
          <label>Subject</label>
          <input type="text" name="subject" class="form-control" id="subject_ann" oninvalid="alert('# number is not Alowed')" pattern="[^#]*">
        <br />
        <label>Enter AnnounceMent</label>
        <textarea class="form-text form-control" style="height: 200px;" name="editor2" id="comment_ann"></textarea>
        <br />
        <button style="margin-top: 0 auto;margin: 0 auto;"  type="submit" id="post_ann_data" class="form-submit btn btn-success" name="new_comment"> <span class="fas fa-check"> Post </span> <span class="fas fa-spinner fa-spin" id="spinner_sub_ann" style="display: none;"></span></button>
        <button class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>
      </form>
      </div>      
    </div>
  </div>
</div>

<div id="projects" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
    <div id="alert_project"></div>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: green;text-align: center;">  
      <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 class="modal-title" style="color: white;font-size: 18px;"> <span class="fas fa-bullhorn"> Post Project</span></h4>
      </div>
      <div class="modal-body">
        <?php //require_once 'check_project.php'; ?>
         <?php //echo $message; ?>
        <form action="" method="post" class="main" id="form_projects" enctype="multipart/form-data">
           <label>Choose Photo</label>
          <input type="file" name="image" class="form-control" id="image_pro" accept="image/*">
        <br />
          <label>Subject</label>
          <input type="text" name="subject" class="form-control" id="subject_pro" oninvalid="alert('# number is not Alowed')" pattern="[^#]*">
        <br />
        <label>Discuss Here</label>
        <textarea class="form-text form-control" style="height: 200px;" name="editor3" id="comment_pro" ></textarea>
        <br />
        <button style="margin-top: 0 auto;margin: 0 auto;" type="submit" id="submit_projects" class="form-submit btn btn-success"> <span class="fas fa-check"> Post</span> <span class="fas fa-spinner fa-spin" id="spinner_sub_projects" style="display: none;"></span></button>
        <button class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>
      </form>
      </div>      
    </div>
  </div>
</div>

 <div id="year" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
   <div id="form_data-alert"></div>
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" style="background-color: green;text-align: center;">  
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 class="modal-title" style="font-size: 18px;color: white;"> <span class="fas fa-calendar-alt"> Post Year</span></h4>  
        </div>
         <div class="modal-body">  
    
        <label>Example Format(2012-2013)</label>
        <input class="form-text form-control" readonly name="date" value="<?php $current= new \DateTime();
    $future = new \DateTime('+ 1 years'); ?> <?php  echo $current->format('Y'); echo "-"; echo $future->format('Y'); ?>"  placeholder="2012-2013" id="date" />
        <br />
        <button style="margin-top: 0 auto;margin: 0 auto;" type="button" class="form-submit btn btn-success" name="submit" id="btn_sub_year"> <span class="fas fa-check"> Post</span> <span style="display: none;" class="fas fa-spinner fa-spin" id="spinner_pos"></span> </button>
        <button class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>
    
      </div>      
    </div>
  </div>
</div>
<div id="logout_dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: green;text-align: center;">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title" style="font-size: 18px;color: white;"> <span class="fas fa-sign-out-alt"> Are you Sure you want to Sign-out?</span></h4>  
                </div>
                
                <div class="modal-footer">  
                     <button class="btn btn-success"><a href="admin_logout.php" style="color: white;"> <span class="fas fa-check"> Yes</a></span></button>
                     <button type="button" class="btn btn-warning" data-dismiss="modal"> <span class="fas fa-sign-out-alt"> No</span></button> 

                </div>  
           </div>  
      </div>  
 </div> 
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'editor' );
CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
</script>


