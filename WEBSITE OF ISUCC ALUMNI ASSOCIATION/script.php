<style type="text/css">
  .has-error
 {
   border-color:#cc0000;
   background-color:#ffff99;
 }
</style> 
 <script>
$(document).ready(function(){
 
 function load_unseen_notification1(view = '')
 {
  $.ajax({
   url:"fetch4.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   beforeSend:function(){
   $('#spinner').show();
   },
   success:function(data)
   {
    $('#spinner').hide();
    $('.menu').html(data.notification);

    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification1();
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification1('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification1(); 
 }, 1000);
 
});
</script>

 <script>
$(document).ready(function(){
 
 function load_unseen_notification2(view = '')
 {
  $.ajax({
   url:"fetch5.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
    beforeSend:function(){
   $('#spinner1').show();
   },
   success:function(data)
   {
     $('#spinner1').hide();
    $('.menu1').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count1').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification2();

 $(document).on('click', '.dropdown-toggleno', function(){
  $('.count1').html('');
  load_unseen_notification2('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification2(); 
 }, 1000);
 
});
</script>

<script>
$(document).ready(function(){
 
 function load_unseen_notification3(view = '')
 {
  $.ajax({
   url:"fetch6.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
    beforeSend:function(){
   $('#spinner2').show();
   },
   success:function(data)
   {
    $('#spinner2').hide();
    $('.menu2').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.counts').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification3();

 $(document).on('click', '.dropdown-toggles', function(){
  $('.counts').html('');
  load_unseen_notification3('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification3();
 }, 1000);
 
});
</script>
<script>
 $(document).on('click', '#btn_sub_year' , function(event) {
   event.preventDefault();
   var date = $('#date').val();
   dataString = 'date='+date;
   $.ajax({
    url:"post_year.php",
    method:"post",
    data:dataString,
    cache:false,
    beforeSend:function(){
     $('#spinner_pos').show();
     $('#btn_sub_year').attr('disabled', true);
    },
    success:function(data){
      setTimeout(function(){
      $('#btn_sub_year').attr('disabled', false);
      $('#spinner_pos').hide();
      $('#form_data-alert').html(data); 
      $('#year').modal('hide');
      }, 1000)
    }
   });
 });
</script>
<script>
   $(document).ready(function(){
    $('#news_form').on('submit', function(event){
      event.preventDefault();
      if ($('#image').val() == "") {
        alert('Empty image');
      }
      else if ($('#subject').val() == "") {
        alert('Empty subject');
      }
      else if($('#comment').val() == ""){
         alert('News is Empty');
      }
     else{
       $.ajax({
        url:'insert_news.php',
        method:'POST',
        data:new FormData(this),
        cache:false,
        processData: false,
        contentType: false,
        beforeSend:function() {
        $('#spinner_sub_news').show();
        $('#submit_news').attr('disabled',true);
        },
        success:function(data) {
          setTimeout(function(){
          $('#submit_news').attr('disabled',false);
          $('#spinner_sub_news').hide();
          $('#alertsss').html(data);
          $('#news').modal('hide');
          }, 2000);
        }
       });
     }
    });

      $('#form_announcement').on('submit', function(event){
      event.preventDefault();
      if ($('#image_ann').val() == "") {
       alert('Empty Image');
      }
      else if($('#subject_ann').val() == ""){
        alert('Empty Subject');
      }
      else if($('#comment_ann').val() == ""){
         alert('Empty Announcement');
      }
      else{
        $.ajax({
          url:'insert_announcement.php',
          method:'POST',
          data:new FormData(this),
          cache:false,
          processData:false,
          contentType:false,
          beforeSend:function(){
          $('#post_ann_data').attr('disabled', true);
          $('#spinner_sub_ann').show();
          },
          success:function(data){
            setTimeout(function(){
            $('#alert_ann').html(data);
            $('#post_ann_data').attr('disabled', false);
            $('#spinner_sub_ann').hide();
            $('#test1').modal('hide');
            }, 2000);
          }
        });
      }
    });
    $('#form_projects').on('submit' ,function(event){
      event.preventDefault();
      if ($('#image_pro').val() == "") {
        alert('Empty Image');
      }
      else if($('#subject_pro').val() == ""){
        alert('Empty Subject');
      }
      else if($('#comment_pro').val() == ""){
        alert('Empty Discussions');
      }
      else{
        $.ajax({
          url:'insert_projects.php',
          method:'POST',
          data:new FormData(this),
          cache:false,
          processData:false,
          contentType:false,
          beforeSend:function(){
          $('#submit_projects').attr('disabled', true);
          $('#spinner_sub_projects').show();
          },
          success:function(data){
            setTimeout(function(){
            $('#alert_project').html(data);
            $('#submit_projects').attr('disabled', false);
            $('#spinner_sub_projects').hide();
            $('#projects').modal('hide');
            }, 2000);
            
          }
        });
      }
    
    });
   });
 </script>