<?php  
 include 'functioncontent.php'; 
 ?>
 <?php require_once 'connect.php'; require_once 'functions.php'; include 'adminselect.php';?>
 <?php  
 include 'count.php';
 ?>
  <?php AdminSafe(); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AlumniTracking Admin</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
  <!-- Ionicons -->
  <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" type="text/css" href="css/Lastadmin.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<style type="text/css">
  .removeRow
{
    background-color: red;
    color:red;
}

</style>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
//session_start();
 if(isset($_SESSION['updated'])):
  echo "<script>swal('AnnounceMent Updated','','success');</script>";
 endif;
 unset($_SESSION['updated']);
 ?>
<?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>

   <?php Alumni_Project(); ?>
      <!-- /.row -->
       <div id="alert_popover">
    <div class="wrappers">
     <div class="contents">
    </section>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Admin Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: green;text-align: center;">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title" style="font-size: 18px;color: white;"> <span class="fas fa-newspaper"> Edit Project</span></h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Edit Title</label>
                          <input type="text" name="title" class="form-control" id="title" oninvalid="alert('# number is not Alowed')"  pattern="[^#]*">
                          <br/>
                           <label>Edit Description</label>
                           <textarea class="form-control" style="height: 200px;" cols="5" rows="5" name="description" id="newss"></textarea>
                           <br/>
                          <input type="hidden" name="news_id" id="news_id" />  
                           
                    
                </div>  
                <div class="modal-footer">  
                  <button type="submit" name="insert" id="insert" class="btn btn-success"> <span class="fas fa-check"> Update</span> <i class="fa fa-spinner fa-spin" id="spinnerup" style="display: none;"></i></button> 
                     <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>  
                </div>  
                 </form>
           </div>  
      </div>  
 </div>  

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" style="background-color: green;text-align: center;">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title" style="font-size: 18px;color: white;"> <span class="fas fa-newspaper"> Project</span></h4>  
                </div>  
                <div class="modal-body" id="acc_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button>  
                </div>  
           </div>  
      </div>  
 </div>  
<div id="approve" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="modal-title">Confirm Account</h4><br>
        <form action="" method="post" class="main">
        <label>Enter Account Code</label>
        <input class="form-text form-control" required name="confirm_code"  />
        <br />
        <input style="margin-top: 0 auto;margin: 0 auto;"  type="submit" class="form-submit btn btn-success"  name="approve" value="Approve">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
      </form>
      </div>      
    </div>
  </div>
</div>
<?php include 'postnew_postann.php'; ?>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="lisenme.js"></script>
<script src="js/lightbox.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'pagingType' : 'full_numbers',
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
</script>
<script>
      $(document).ready(function(){

       setInterval(function(){
        load_last_notification();
       }, 5000);

       function load_last_notification()
       {
        $.ajax({
         url:"fetchregnotif.php",
         method:"POST",
         success:function(data)
         {
          $('.contents').html(data);
         }
        })
       }
    });
  </script>

<script>  
 $(document).ready(function(){  
    $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $('#example2').on('click', '.edit_data', function(){  
           var news_id = $(this).attr("id");  
           $.ajax({  
                url:"fetchproject.php",  
                method:"POST",  
                data:{news_id:news_id},  
                dataType:"json",  
                beforeSend:function(){
                $('.edit_data').attr('disabled',true);
                $('.edit_data'+news_id).html($('#spniner_edit_project'+news_id).show());
                },
                success:function(data){  
                  setTimeout(function(){
                    $('.edit_data').attr('disabled',false);
                   $('.edit_data'+news_id).html($('#spniner_edit_project'+news_id).hide());
                     $('#title').val(data.subject);  
                     $('#newss').val(data.project);  
                     $('#news_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                  }, 1000);
                   
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#newstitle').val() == "")  
           {  
                alert(" Title is required");  
           }  
           else if($('#News').val() == '')  
           {  
                alert("Project is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"updateproject.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                     $('#spinnerup').show();
                      $('#insert').attr('disabled', true);
                     },  
                     success:function(data){  
                       $('#spinnerup').hide();
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#news_table').html(data);
                          swal({
                          title: 'Project Updated!',
                          text: '',
                          type: 'success',
                          timer: 2000,
                          showCancelButton: false,
                          showConfirmButton: false
                        })            
                          timedRefresh();

                     }  
                });  
           }  
      });  
     $('#example2').on('click','.view_data',function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"viewproject.php",  
                method:"post",  
                data:{employee_id:employee_id}, 
                beforeSend:function(){
                 $('.view_data'+employee_id).html($('#spinner1'+employee_id).show());
                 $('.view_data').attr('disabled', true);
                },
                success:function(data){  
                setTimeout(function(){
                  $('.view_data').attr('disabled', false);
                  $('.view_data'+employee_id).html($('#spinner1'+employee_id).hide());
                     $('#acc_detail').html(data);  
                     $('#dataModal').modal("show");  
                  }, 2000);
                }  
           });  
      });  
 });  
 </script>
 <script type="text/javascript">
  function timedRefresh() {
  setTimeout("location.reload(true);",3000);
}
 </script>
 <script>
  
  $(document).ready(function(){
      $('#checkAll').click(function(){
         if(this.checked){
             $('.checkbox').each(function(){
                this.checked = true;
             });   
         }else{
            $('.checkbox').each(function(){
                this.checked = false;
             });
         } 
      });


    $('#delete').click(function(){
      if (confirm("Are you Sure you want to delete This?")) {
       var dataArr  = new Array();
       if($('input:checkbox:checked').length > 0){
          $('input:checkbox:checked').each(function(){
              dataArr.push($(this).attr('id'));
              $(this).closest('tr').remove();
          });
          }
          else {
            alert('No Record Selected');
          }
          sendResponse(dataArr)
       }else{
         alert('No record selected ');
       }

    });  


    function sendResponse(dataArr){
        $.ajax({
            type    : 'post',
            url     : 'function1.php',
            data    : {'data' : dataArr},
            success : function(response){
                        alert(response);
                      },
            error   : function(errResponse){
                      alert(errResponse);
                      }                     
        });
    }

  });

   $(document).ready(function(){
  $('.search').keyup(function(){
   var searchTerm = $(".search").val();
   var listItem = $('.results tbody').children('tr');
   var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
   $.extend($.expr[':'],{
    'containsi': function(elem,i,match,array){
      return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >=0;
    }
   })
   $(".results tbody tr").not(":containsi('"+ searchSplit +"')").each(function(){
    $(this).attr('visible','false');
   })
   $(".results tbody tr:containsi('"+ searchSplit +"')").each(function(){
    $(this).attr('visible','true');
   })
   var jobCount = $('.results tbody tr[visible="true"]').length;
   $('.counter').text(jobCount + '  Results');
   if (jobCount == 0) {
     $('.no-result').show();
   } else {
    $('.no-result').hide();
   }
  })
 })
</script>
 <script>
     $('.button').click(function(){
        var printme = document.getElementById('example2');
        var wme = window.open("","","width=900,height=700");
        wme.document.write(printme.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        wme.close();
     })
 </script>
 
 <?php include 'script.php' ?>

<script>
  $(document).ready(function(){
    
    readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '#delete_product', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Are you sure?',
      text: "This Account Will be Deleted!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'deleteproject.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
            window.location.reload(true);
            readProducts();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  
  function readProducts(){
    $('#load-products').load('alumniacc.php'); 
  }
  
</script>
<script>
$(document).ready(function(){
  $('.delete_checkbox').click(function(){
    if ($(this).is(':checked')) {
      $(this).closest('tr').addClass('removeRow');
    }
    else{
      $(this).closest('tr').removeClass('removeRow');
    }
  });

 $('#btn_delete').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if (checkbox.length > 0) {

  var checkbox_value = [];
  $(checkbox).each(function(){
  checkbox_value.push($(this).val());
  });

  $.ajax({
   url:'deleteproject1.php',
   method:'POST',
   data:{
   checkbox_value:checkbox_value
   },
   success:function(){
    $('.removeRow').fadeOut('slow');
   }
  });
  }
  else{
     swal("Please Select atleast one records",'','warning');
  }
 });
 
});
</script>