<style type="text/css">
   .dropdown-menu2 {
 position: absolute;
  top: 100%;
  left: -100px;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
   box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  max-height: 350px !important;
}
.dmenu2::-webkit-scrollbar {
    width: .5em;
}
 
.dmenu2::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
.menu2::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
  }
  .menu2::-webkit-scrollbar {
    width: .5em;
}
.menu1::-webkit-scrollbar {
    width: .5em;
}
 
.menu1::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
.menu1::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
  }
  .menu1::-webkit-scrollbar {
    width: .5em;
}
.menu::-webkit-scrollbar {
    width: .5em;
}
 
.menu::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
.menu::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
  }
  .menu::-webkit-scrollbar {
    width: .5em;
}
ul {
  list-style: none;
}

 .menu1{
 padding: 10px;
 margin: 0;
 }
 .menu2{
 padding: 10px;
 margin: 0;
 }
 .menu{
 padding: 10px;
 margin: 0;
 }
.scrollable-menu2 {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;
}
.scrollable-menu {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;
}
.scrollable-menu1 {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;
}
#small{
  overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       line-height: 15px;     /* fallback */
       max-height: 42px;      /* fallback */
       -webkit-line-clamp: 1; /* number of lines to show */
       -webkit-box-orient: vertical;
}
</style>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a class="logo" style="background-color: green;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="img/graduate.png" style="height: 40px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="img/graduate.png" style="height: 40px;"> Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: green;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="src-only"></span>
      </a>
      <!-- Navbar Right Menu -->
     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
              
               <li class="dropdown messages-menu">
          <a  href="#" class="dropdown-toggles" data-toggle="dropdown" uk-tooltip="title: Who Commented your Post!; pos: bottom">
            <span class="label label-pill label-primary counts" style="border-radius:20px;"></span><span  class="fas fa-comments" id="hover"></span></a>
       <ul class="dropdown-menu">
          <li class="header"> <span class="fas fa-comments"></span> Comments</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu2 scrollable-menu2">
                    <p style="text-align: center;">
                    <br>
                    <span style="text-align: center; display: inline-block;font-size: 25px;" class="fa fa-spinner fa-spin" id="spinner2"></span>
                  </p>
                  </ul>
                </li>
              </ul>


          
          </li>

            <li class="dropdown tasks-menu">
           <a  href="#" class="dropdown-toggleno" data-toggle="dropdown" uk-tooltip="title: Records!; pos: bottom"><span class="label label-pill label-info count1" style="border-radius:20px;"></span><span  class="fa fa-bell" id="hover"></span></a>
       <ul class="dropdown-menu">
         <li class="header"> <span class="fas fa-globe"></span> Send Records</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu1 scrollable-menu1">
                   <p style="text-align: center;">
                    <br>
                    <span style="text-align: center; display: inline-block;font-size: 25px;" class="fa fa-spinner fa-spin" id="spinner1"></span>
                  </p>
                  </ul>
                </li>
              </ul>
      


          </li>

            <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" uk-tooltip="title: Feedback and Messages!; pos: bottom"><span class="label label-pill label-danger count" style="border-radius:20px;"></span><span  class="fas fa-envelope" id="hover"></span></a>
       <ul class="dropdown-menu">
          <li class="header"> <span class="fas fa-envelope"></span> Feedback</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu scrollable-menu">
                  <p style="text-align: center;">
                    <br>
                    <span style="text-align: center; display: inline-block;font-size: 25px;" class="fa fa-spinner fa-spin" id="spinner"></span>
                  </p>
                  </ul>
                </li>
              </ul>
      

          <!-- Control Sidebar Toggle Button -->
          </li>
            <li class="dropdown announcement-menu">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#test1" uk-tooltip="title: Post AnnouceMent!; pos: bottom">
              <i class="fas fa-bullhorn"></i>
              <span class="label label-success"></span>
            </a>
            <li>
            <li class="dropdown announcement-menu">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#news" uk-tooltip="title: Post News!; pos: bottom">
              <i class="fas fa-newspaper"></i>
              <span class="label label-success"></span>
            </a>
            <li>
              <li class="dropdown announcement-menu">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#projects" uk-tooltip="title: Post Projects; pos: bottom">
              <i class="fas fa-plus"></i>
              <span class="label label-success"></span>
            </a>
            <li class="dropdown announcement-menu">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#year" uk-tooltip="title: Post Schoolyear!; pos: bottom">
              <i class="fas fa-calendar"></i>
              <span class="label label-success"></span>
            </a>

          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>