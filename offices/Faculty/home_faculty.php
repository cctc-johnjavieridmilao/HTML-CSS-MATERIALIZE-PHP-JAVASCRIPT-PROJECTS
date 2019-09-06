<?php
session_start();
$sessionId = $_SESSION['users']['id'];
$sessionuname = $_SESSION['users']['username'];
if (empty($sessionId)) {
    header('Location: ../../login.html');
}
//echo $sessionId;
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
    <link rel="stylesheet" href="../../css/materialize.min.css" />
    <!--My style-->
    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body>
    <div class="fullscreen">
        <nav class="z-depth-1">
            <div class="nav-wrapper green">
                <a href="#" class="brand-logo center text-bold">File Tracker</a>
                <a href="#modal1" id="logout"
                    class="btn-floating btn-large btn-flat waves-effect waves-light modal-trigger green"><i
                        class="material-icons">arrow_back</i></a>
                <a href="#" id="show_tabs"
                    class="btn-floating btn-large btn-flat waves-effect waves-light modal-trigger green"><i
                        class="material-icons">arrow_back</i></a>
            </div>
        </nav>
        <div class="row">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1 green" id="tabs_fac">
                <li class="tab col s6">
                    <a class="white-text" href="#uploadFiles">Upload</a>
                </li>
                <li class="tab col s6">
                    <a class="white-text" href="#test2">Uploaded Files</a>
                </li>
                <li class="tab col s6">
                    <a class="white-text" href="#testmove">Move Files</a>
                </li>
                <li class="tab col s6">
                    <a class="white-text" href="#test3">Personal Data Sheet</a>
                </li>
                <li class="tab col s6" id="c_n">
                    <a class="white-text" href="#test4">Notification <span id="c"></span></a>
                </li>
                <li class="tab col s6">
                    <a class="white-text" href="#test5">Account</a>
                </li>
            </ul>

            <div id="uploadFiles" class="col s12">
                <div class="col s12 m6 offset-m3">
                    <form id="submitFiles" enctype="multipart/form-data">
                        <div class="card">
                            <div id="loader">
                            </div>
                            <div class="card-content text-bold">
                                <span class="card-title black-text">Upload Files</span>
                                <input type="text" class="form-input" name="account_uname" id="account_uname"
                                    placeholder=" Account Username" />
                                <select id="fileType" name="fileType">
                                    <option value="" disabled selected>Select File Type</option>
                                    <option value="Personal Data Sheet">Personal Data Sheet</option>
                                    <option value="Report Letters">Report Letters</option>
                                    <option value="Proposal Letters">Proposal Letters</option>
                                </select>
                                <label>Materialize Select</label>
                                <!-- <input type="hidden" name="uploader_id" id="uploader_id"
                                    value="<?php //echo $sessionId; ?>"> -->
                            </div>
                        </div>
                        <div class="card">
                            <div id="upload_icon" class="card-content center-align">
                                <i class="material-icons">cloud_upload</i>
                                <p class="text-bold">Click the image to choose files</p>
                                <p class="text-bold" id="resultFile"></p>
                            </div>
                            <input type="file" id="file" name="file">
                        </div>
                        <button type="submit" id="submit" class="btn waves-effect waves-light sign-in-btn green"
                            disabled>
                            <div id="btn_text">Upload</div>
                        </button>
                    </form>
                </div>
            </div>
            <input type="hidden" id="username" value="<?php echo $sessionuname . " office" ?>">
            <input type="hidden" id="id_logs" value="<?php echo $sessionId ?>">
            <div id="test2" class="col s12">
                <h4 class="header_tabs_view text-bold">Uploaded Files</h4>
                <div id="loaders"></div>
                <div id="result"></div>
            </div>
            <div id="testmove" class="col s12">
                <h4 class="header_tabs_view text-bold">Move Files</h4>
                <div id="result1"></div>
                <h2 id="check_all_move_text" class="center"></h2>
            </div>
            <div id="test3" class="col s12">
                <h4 class="header_tabs_view text-bold">Personal Data Sheet</h4>
                <div id="loader_h"></div>
                <div id="resultsheet"></div>
            </div>
            <div id="test4" class="col s12">
                <h4 class="header_tabs_view text-bold">Notification</h4>
                <div id="unseen"></div>
                <div id="seen">
                    <div id="newseen"></div>
                    <div id="older"></div>
                </div>
                <div id="show_all"></div>
            </div>
            <div id="test5" class="col s12">
                <div id="output_acc">
                </div>
                <div id="change_pass">
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div id="modal1" class="modal green">
        <div class="modal-content">
            <div class="center-align" id="logo">
                <img src="../../images/logos.png" />
                <p class="white-text text-bold">Are you sure you want to logout?</p>
            </div>
        </div>
        <div class="modal-footer">
            <a href="../../php/u_logout.php" class="waves-effect waves-green btn-flat">Agree</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
    </div>
    <!--End modal-->
    <!--js plugins-->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/materialize.min.js"></script>
    <script src="faculty.js"></script>
</body>

</html>
<script>
let s = document.createElement('script');
s.src = '../../js/main.js';
s.type = 'text/javaScript';
document.body.appendChild(s);
</script>