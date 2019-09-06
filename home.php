<?php
session_start();
$sessionId = $_SESSION['users']['id'];
$sessionname = $_SESSION['users']['username'];
if (empty($sessionId)) {
    header('Location: login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="ellia,limbert,balisi" />
    <meta name="description" content="Capstone project" />
    <title>ISU File Tracker || Login</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!--css plugins-->
    <link rel="stylesheet" href="css/materialize.min.css" />
    <!--My style-->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="fullscreen">
        <nav class="z-depth-1">
            <div class="nav-wrapper green">
                <a href="#" class="brand-logo center text-bold">File Tracker</a>
                <a href="#modal1" id="logout"
                    class="btn-floating btn-large btn-flat waves-effect waves-light modal-trigger green"><i
                        class="material-icons">arrow_back</i></a>
            </div>
        </nav>
        <div class="row">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1 green">
                <li class="tab col s6">
                    <a class="white-text" href="#files" id="tab_files">Files</a>
                </li>
                <li class="tab col s6" id="c_n">
                    <a class="white-text" href="#notification" id="tab_notifications">Notification <span
                            id="c"></span></a>
                </li>
                <li class="tab col s6">
                    <a class="white-text" href="#account" id="tab_accounts">Account</a>
                </li>
            </ul>

            <div id="files" class="col s12">
                <div id="result"></div>
                <h2 id="no" class="center">No Files!</h2>
            </div>
            <div id="notification" class="col s12">
                <h4 class="header_tabs_view text-bold">Notification</h4>
                <div id="Unseen">
                </div>
                <div id="seen">
                    <div id="new"></div>
                    <div id="older"></div>
                </div>
                <h2 id="noti" class="center">No Notification!</h2>
            </div>
            <div id="account" class="col s12">

                <div id="output_acc">
                </div>
                <div id="change_pass">

                </div>

                <ul class="collection with-header account_style">
                    <li class="collection-header" id="h">

                    </li>
                    <div id="output_file">
                    </div>
                </ul>

            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $sessionname; ?>" id="username_logs">
    <input type="hidden" value="<?php echo $sessionId; ?>" id="id_logs">
    <!--Modal-->
    <div id="modal1" class="modal green">
        <div class="modal-content">
            <div class="center-align" id="logo">
                <img src="images/logos.png" />
                <p class="white-text text-bold">Are you sure you want to logout?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="./php/u_logout.php" class="waves-effect waves-green btn-flat">Agree</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
    </div>
    <!--js plugins-->
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/users.js"></script>
</body>

</html>
<script>
let s = document.createElement('script');
s.src = 'js/main.js';
s.type = 'text/javaScript';
document.body.appendChild(s);
</script>