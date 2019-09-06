$(document).ready(function () {
    getData();

    function getData() {
        $.ajax({
            url: '../../php/research.php',
            method: 'GET',
            success: function (data) {
                let res = JSON.parse(data);
                let output = '';
                let output2 = '';
                let output3 = '';
                res.forEach(responce => {
                    if (responce.acc_username === 'faculty' && responce.file_type === 'Personal Data Sheet') {
                        if (responce.is_forward == false) {
                            output3 += `
                            <ul class="collection">
                            <li class="collection-item avatar">
                            <i class="material-icons circle">folder</i>
                            <span class="title">Filename : ${responce.file}</span>
                            <p>File type : ${responce.file_type}<br>
                            Uploaded at:  ${responce.uploded_at}
                            </p>
                            <a href="#" id="${responce.id}" class="secondary-content move_to_hr"><i class="material-icons">arrow_forward</i></a>
                            </li>
                        </ul>
                            `;


                        } else {
                            output2 += `
                            <ul class="collection">
                            <li class="collection-item avatar">
                            <i class="material-icons circle">folder</i>
                            <span class="title">Username : ${responce.acc_username}</span><br>
                            <p>
                            Filename : ${responce.file}<br>
                            File type : ${responce.file_type}<br>
                            Uploaded at : ${responce.uploded_at}
                            </p>
                            </li>
                        </ul>
                            `;

                        }

                    } else {
                        if (responce.is_forward == false) {
                            output += `
                            <ul class="collection">
                            <li class="collection-item avatar">
                            <i class="material-icons circle">folder</i>
                            <span class="title">Username : ${responce.acc_username}</span><br>
                            <p>
                            Filename : ${responce.file}<br>
                            File type : ${responce.file_type}<br>
                            Uploaded at : ${responce.uploded_at}
                            </p>
                            <a href="#" id="${responce.id}" class="secondary-content move"><i class="material-icons">arrow_forward</i></a>
                            </li>
                        </ul>
                            `;
                            document.getElementById('check_all_move_text').innerText = '';
                        } else {
                            output2 += `
                            <ul class="collection">
                            <li class="collection-item avatar">
                            <i class="material-icons circle">folder</i>
                            <span class="title">Username : ${responce.acc_username}</span><br>
                            <p>
                            Filename : ${responce.file}<br>
                            File type : ${responce.file_type}<br>
                            Uploaded at : ${responce.uploded_at}
                            </p>
                            </li>
                        </ul>
                            `;
                            document.getElementById('check_all_move_text').innerText = 'All Files Are Move!';
                        }
                    }
                    document.getElementById('result').innerHTML = output;
                    document.getElementById('result1').innerHTML = output2;
                    document.getElementById('resultsheet').innerHTML = output3;
                })
            }

        })
    }
    getcomment_hr();

    function getcomment_hr() {
        $.get('../../php/get_hr_com.php', function (data) {
            let res = JSON.parse(data);
            let output1 = '';
            let output2 = '';
            let newseen = '<strong style="font-size:13px;" class="header_tabs_view text-is-grey">New</strong>';
            let olderseen = '<strong style="font-size:13px;" class="header_tabs_view text-is-grey">Older</strong>';
            res.row.forEach(responce => {
                if (responce.is_seen == false) {
                    count_comm();
                    // M.toast({
                    //     html: `Hr commented on your ${responce.file}`
                    // })
                    output1 += `
                    <ul class="collection show_all unn un${responce.come_file_id}" id="${responce.id}" data-file-id="${responce.come_file_id}">
                    <li class="collection-item avatar">
                    <i class="material-icons circle">folder</i>
                    <span class="title">Filename : ${responce.file}</span><br>
                    <p>
                    Filetype : ${responce.file_type}<br>
                    Date : ${responce.com_date}
                    </p>
                    </li>
                    </ul>
                    `;

                } else if (responce.com_date > res.datenow) {

                    newseen += `
                    <ul class="collection show_all" id="${responce.id}" data-file-id="${responce.come_file_id}">
                    <li class="collection-item avatar">
                    <i class="material-icons circle">folder</i>
                    <span class="title text-is-grey text-bold">Filename : ${responce.file}</span><br>
                    <p class="text-is-grey text-bold">
                    Filetype : ${responce.file_type}<br>
                    Date : ${responce.com_date}
                    </p>
                    </li>
                    </ul>
                    `;
                    document.getElementById('newseen').innerHTML = newseen;
                } else {
                    //newseen = '';
                    olderseen += `
                    <ul class="collection show_all" id="${responce.id}" data-file-id="${responce.come_file_id}">
                    <li class="collection-item avatar">
                    <i class="material-icons circle">folder</i>
                    <span class="title">Filename : ${responce.file}</span><br>
                    <p>
                    Filetype : ${responce.file_type}<br>
                    Date : ${responce.com_date}
                    </p>
                    </li>
                    </ul>
                    `;
                    document.getElementById('older').innerHTML = olderseen;
                }
            })
            document.getElementById('unseen').innerHTML = output1;

        })

        //document.getElementById('unseen').innerHTML = output2;
    }


    $(document).on('click', '.show_all', function () {
        let output = '';
        let id = this.getAttribute('id');
        let com_file_id = this.getAttribute('data-file-id');
        $.post('../../php/show_all.php', {
            com_file_id: com_file_id
        }, function (data) {
            let res = JSON.parse(data);
            res.forEach(r => {
                output += `
            <ul class="collection">
            <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Filename : ${r.file}</span><br>
            <span class="title">Uploaded at : ${r.uploded_at}</span><br>
            <p>
             <div id="comment_show${r.id}"></div>
            </p>
            </li>
            </ul>
            `;
                getComment(r.id);
                setSeen(r.id);
            })

            document.querySelector('#show_all').innerHTML = output;
            document.querySelector('#seen').style.display = 'none';
            document.querySelector('#unseen').style.display = 'none';
            document.querySelector('#tabs_fac').style.display = 'none';
            document.querySelector('#logout').style.display = 'none';
            document.querySelector('#show_tabs').style.display = 'block';
        })
    })

    //back
    $(document).on('click', '#show_tabs', function () {
        document.querySelector('#seen').style.display = '';
        document.querySelector('#unseen').style.display = '';
        document.querySelector('#tabs_fac').style.display = '';
        document.querySelector('#logout').style.display = '';
        document.querySelector('#show_all').innerHTML = '';
        this.style.display = 'none';
        getcomment_hr();
    })

    // get comments
    function getComment(id) {
        let showComments = '';
        $.post(
            '../../php/get_comment.php', {
                id: id
            },
            function (data) {
                let res = JSON.parse(data);
                res.forEach(com => {
                    let comid = parseInt(com.id);
                    countrepy(comid);
                    showComments += `
                        <div class="card z-depth-1" style="border-radius:25px;">
                        <div class="card-content">
                        <p class="text-bold">Hr office <span style="font-size:10px;">${com.com_date}</span></p>
                        <p>${com.comment}</p>
                        <input type='hidden' class="countrep" id='countrep${com.id}'>
                          <input type='hidden' class="countrep1" id='countrep1${com.id}'>
                        <span id="show_reply${com.id}" data-id="${com.id}" class="show_reply">Show Reply</span>
                        <div id="s-r${com.id}" style="display:none;"></div>
                        <div id="s-r_1${com.id}" style="display:none;"></div>
                        <div class="input-field" id="input_reply${com.id}"></div>
                        <div class="input-field" id="input_edit${com.id}" style="display:none">
                            <input type='text' id='reply-edit${com.id}' value="${com.comment}">
                            <button class='btn btn-flat btn_reply_edit' id='${com.id}'>Edit</button>
                            <button class='btn btn-flat cancel_edit' id='${com.id}'>Cancel</button>
                            <div id='loader_edit${com.id}'></div>
                            </div>
                        </div>
                        <a href="#" id="${com.id}" data-file-id="${com.come_file_id}" class="secondary-content reply"><i class="material-icons">comment</i></a>
                        </div>
                     `;
                });

                document.getElementById('comment_show' + id).innerHTML = showComments;
            }
        );
    }
    // show & hide reply
    $(document).on('click', '.show_reply', function () {
        let id = this.getAttribute('data-id');
        getreply(id);
        if (document.querySelector('#s-r' + id).style.display === 'none' || document.querySelector('#s-r_1' + id).style.display === 'none') {
            document.querySelector('#s-r' + id).style.display = 'block';
            document.querySelector('#s-r_1' + id).style.display = 'block';
            this.textContent = document.querySelector('#countrep' + id).value;
        } else {
            document.querySelector('#s-r' + id).style.display = 'none';
            document.querySelector('#s-r_1' + id).style.display = 'none';
            this.textContent = document.querySelector('#countrep1' + id).value;
        }
    });

    // reply
    $(document).on('click', '.reply', function () {
        let com_id = this.getAttribute('id');
        let file_hr_id = this.getAttribute('data-file-id');
        let inputs = `
        <input type='text' id='reply-comments'>
        <button class='btn btn-flat' id='btn_reply_comment'>Reply</button>
        <button class='btn btn-flat cancel_reply' id='${com_id}'>Cancel</button>
        <input type='hidden' class='reply_id' id='${com_id}'>
        <input type='hidden' class='reply_file_id' id='${file_hr_id}'>
        <div id='loader_reply'></div>
        `;
        document.querySelector('#input_reply' + com_id).innerHTML = inputs;
    });

    // cancel reply
    $(document).on('click', '.cancel_reply', function () {
        let id = this.getAttribute('id');
        document.getElementById('input_reply' + id).innerHTML = '';
    })

    //save reply to database
    $(document).on('click', '#btn_reply_comment', function () {
        let reply_id = document.querySelector('.reply_id').getAttribute('id');
        let file_id = document.querySelector('.reply_file_id').getAttribute('id');
        let reply = document.querySelector('#reply-comments').value;
        let username = document.querySelector('#username').value;
        let loader = document.querySelector('#loader_reply');
        if (reply === '' || reply === null) {
            M.toast({
                html: 'Empty Comment'
            });
        } else {
            $.ajax({
                url: '../../php/reply.php',
                method: 'POST',
                data: {
                    reply_id: reply_id,
                    file_id: file_id,
                    reply: reply,
                    username: username
                },
                beforeSend: function () {
                    loader.innerHTML =
                        '<div class="progress"><div class="indeterminate"></div></div>';
                },
                success: function (data) {
                    setTimeout(() => {
                        let res = JSON.parse(data);
                        document.getElementById('input_reply' + reply_id).innerHTML = '';
                        M.toast({
                            html: res.success
                        });
                        document.querySelector('#s-r' + reply_id).style.display = 'block';
                        getreply(reply_id);
                        countrepy(reply_id)
                    }, 3000);
                }
            });
        }
    });

    // count replies
    function countrepy(id) {
        $.post(
            '../../php/count_reply.php', {
                id: id
            },
            function (data) {
                let res = JSON.parse(data);
                document.querySelector(
                    '#show_reply' + id
                ).innerHTML = `<strong>Replies (${res.count})</strong>`;
                document.querySelector('#countrep' + id).value = `Hide (${res.count})`;
                document.querySelector('#countrep1' + id).value = `Replies (${
          res.count
        })`;
            }
        );
    }
    //get replies
    function getreply(id) {
        let showreply = '';
        let showreply1 = '';
        $.post(
            '../../php/get_reply.php', {
                id: id
            },
            function (data) {
                let res = JSON.parse(data);
                res.forEach(coms => {
                    if (coms.user_name === document.querySelector('#username').value) {
                        showreply += `
                <div class="card z-depth-1" id="divcom_reply${coms.reply_id}" style="border-radius:25px;">
                <div class="card-content">
                <p class="text-bold">${coms.user_name} <span style="font-size:10px;">${coms.reply_date}</span></p>
                <p id="comment-text-reply${coms.reply_id}">${coms.reply}</p>
                <div class="input-field" id="input_edit_reply${coms.reply_id}" style="display:none">
                <input type='text' id='show-reply-edit${coms.reply_id}' value="${coms.reply}">
                <button class='btn btn-flat btn_show-reply_edit' id='${coms.reply_id}'>Edit</button>
                <button class='btn btn-flat cancel_show-edit' id='${coms.reply_id}'>Cancel</button>
                <div id='loader_show_edit${coms.reply_id}'></div>
                </div>
                </div>
                <div class="secondary-content">
              <a class='dropdown-trigger edit_replies' href='#' id="${coms.reply_id}"><i class="material-icons">edit</i></a>
              <a class='dropdown-trigger remove_replies' data-file-id="${coms.commment_id}" data-id="${coms.reply_id}" href='#' id="item-remove_replies${coms.reply_id}"><i class="material-icons">delete</i></a>
              </div>
                </div>
                `;
                    } else {
                        showreply1 += `
                <div class="card z-depth-1" id="divcom_reply${coms.reply_id}" style="border-radius:25px;">
                <div class="card-content">
                <p class="text-bold">${coms.user_name} <span style="font-size:10px;">${coms.reply_date}</span></p>
                <p>${coms.reply}</p>
                </div>
                </div>
                `;
                    }
                });
                document.querySelector('#s-r' + id).innerHTML = showreply;
                document.querySelector('#s-r_1' + id).innerHTML = showreply1;
            }
        );
    }

    //delete reply 
    $(document).on('click', '.remove_replies', function (e) {
        e.preventDefault();
        let id = this.getAttribute('data-id');
        let comment_id = this.getAttribute('data-file-id');
        $.ajax({
            url: '../../php/delete_replies.php',
            method: 'POST',
            data: {
                id: id,
            },
            async: true,
            beforeSend: function () {
                document.querySelector('#item-remove_replies' + id).innerHTML = `
        <div class="preloader-wrapper small active">
        <div class="spinner-layer spinner-green-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>`;
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    M.toast({
                        html: res.success
                    })
                    document.querySelector('#item-remove_replies' + id).innerHTML = `<i class="material-icons">delete</i>`;
                    document.getElementById('divcom_reply' + id).style.display = 'none';
                    countrepy(comment_id);
                }, 2000)
            }
        })
    })

    //edit reply
    $(document).on('click', '.btn_show-reply_edit', function (e) {
        e.preventDefault();
        let id = this.getAttribute('id');
        let edit_reply = document.querySelector('#show-reply-edit' + id).value;
        let loader = document.querySelector('#loader_show_edit' + id);
        $.ajax({
            url: '../../php/edit_reply.php',
            method: 'POST',
            data: {
                id: id,
                edit_reply: edit_reply
            },
            async: true,
            beforeSend: function () {
                loader.innerHTML = `<div class="progress"><div class="indeterminate"></div></div>`;
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    M.toast({
                        html: res.success
                    })
                    loader.innerHTML = '';
                    document.querySelector('#comment-text-reply' + id).textContent = edit_reply;
                    document.querySelector('#input_edit_reply' + id).style.display = 'none';
                }, 2000)
            }
        })
    })

    // edit reply toggle
    $(document).on('click', '.edit_replies', function (e) {
        e.preventDefault();
        let id = this.getAttribute('id');
        let input_edit = document.querySelector('#input_edit_reply' + id);
        if (input_edit.style.display === 'none') {
            input_edit.style.display = 'block';
        } else {
            input_edit.style.display = 'none';
        }
    })
    //cancel reply edit
    $(document).on('click', '.cancel_show-edit', function (e) {
        e.preventDefault();
        let id = this.getAttribute('id');
        let input_edit = document.querySelector('#input_edit_reply' + id);
        input_edit.style.display = 'none';
    })

    function count_comm() {
        $.post(
            '../../php/count_com_n.php',
            function (data) {
                let res = JSON.parse(data);
                document.getElementById('c').style.background = '#d40606';
                document.getElementById('c').style.padding = '7px';
                document.getElementById('c').innerHTML = res.count;
            }
        );
    }

    document.getElementById('c_n').onclick = function () {
        document.getElementById('c').innerHTML = '';
        document.getElementById('c').style.background = '';
        document.getElementById('c').style.padding = '0';
    };

    // set seen to 5 secons
    // function setSeen() {
    //     setTimeout(() => {
    //         $.post(
    //             '../../php/set_seen_notif.php', {
    //                 id: 0
    //             },
    //             function (data) {
    //                 console.log(data);
    //                 getcomment_hr();
    //             }
    //         );
    //     }, 5000);
    // }

    function setSeen(id) {
        $.post(
            '../../php/set_seen_notif.php', {
                id: id
            },
            function (data) {
                console.log(data);
            }
        );
    }

    $(document).on('click', '.move_to_hr', function () {
        let file_id = $(this).attr('id');
        let username = document.getElementById('username').value;
        let loaders = document.querySelector('#loader_h');
        $.ajax({
            url: '../../php/move_hr.php',
            method: 'POST',
            data: {
                file_id: file_id,
                username: username
            },
            cache: false,
            beforeSend: function () {
                loaders.innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    if (res.success === 'yes') {
                        loaders.innerHTML = '';
                        M.toast({
                            html: '<span>File Move to Hr office</span>'
                        })
                        getData();
                    } else {
                        loaders.innerHTML = '';
                        M.toast({
                            html: `<span>${res.error}</span>`
                        })
                    }
                }, 2000)
            }
        })
    })

    $(document).on('click', '.move', function () {
        let id = $(this).attr('id');
        let username = document.getElementById('username').value;
        let loaders = document.querySelector('#loaders');
        $.ajax({
            url: '../../php/move_research.php',
            method: 'POST',
            data: {
                id: id,
                username: username
            },
            cache: false,
            beforeSend: function () {
                loaders.innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    if (res.success === 'yes') {
                        loaders.innerHTML = '';
                        M.toast({
                            html: '<span>File Move to Research office</span>'
                        })
                        getData();
                    } else {
                        loaders.innerHTML = '';
                        M.toast({
                            html: `<span>${res.error}</span>`
                        })
                    }
                }, 2000)
            }
        })

    })
    // init
    $('.tabs').tabs({
        swipeable: true
    });
    $('.modal').modal();
    $('select').formSelect();
    // functions
    function readpic(input) {
        document.querySelector('#resultFile').innerHTML = `<strong style='color:green;font-size:20px;'>${input.files[0].name}</strong>`;
        document.querySelector('#submit').removeAttribute('disabled', 'yes');
    }

    // variables for faculty folder
    let upload_icon = document.querySelector('#upload_icon i');
    let input_files = document.querySelector('#file');
    input_files.style.display = 'none';

    // change event
    input_files.addEventListener('change', function () {
        readpic(this);
    })

    // bind click event
    upload_icon.addEventListener('click', function () {
        $(input_files).click();
    })
    // end
    // document.querySelector('#fileType').addEventListener('change', function () {
    //     if (this.value === 'Personal Data Sheet') {
    //         document.querySelector('#account_uname').value = 'faculty';
    //     }
    // })
    // ajax upload
    let upload_file = document.querySelector('#submitFiles');
    let loader = document.querySelector('#loader');
    upload_file.addEventListener('submit', function (e) {
        e.preventDefault();
        // if (document.querySelector('#account_uname').value === 'faculty' && document.querySelector('#fileType').value === 'Report Letters' || document.querySelector('#fileType').value === 'Proposal Letters') {
        //     M.toast({
        //         html: `<span>Please change your Account name! faculty is for personal data sheet only!</span>`
        //     });
        // } else {
        $.ajax({
            url: '../../php/upload.php',
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
                loader.innerHTML = '<div class="progress"><div class="indeterminate"></div></div>'
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    if (res.success === 'yes') {
                        M.toast({
                            html: `<span>File Uploaded</span>`
                        });
                        loader.innerHTML = '';
                        upload_file.reset();
                        getData();
                    } else {
                        M.toast({
                            html: `<span>${res.error}</span>`
                        });
                        loader.innerHTML = '';
                        upload_file.reset();
                    }
                }, 3000);
            }
        })

    })

    // get offices accounts info
    $.post(
        '../../php/getuser_acc.php', {
            id: document.getElementById('id_logs').value
        },
        function (data) {
            let user = JSON.parse(data);
            let output = '';
            user.forEach(res => {
                output = `
                    <ul class="collection with-header account_style">
                        <li class="collection-header">
                            <h5>General Information <span class="new badge" id="c_pass" data-badge-caption="Change password"></span></h5>
                        </li>
                        <li class="collection-item">Fullname : ${res.fullname}</li>
                        <li class="collection-item">Username : ${res.username}</li>
                        <li class="collection-item">Created at : ${res.created_at}</li>
                    </ul>
                    `;
            });
            document.getElementById('output_acc').innerHTML = output;
        }
    );

    // change password
    $(document).on('click', '#c_pass', function () {
        let form_div = document.querySelector('#change_pass');
        let input_forms = `
        <div class="card account_style">
        <div class="card-content">
        <input type="password" class="form-input" id="current_pass" placeholder=" Current password" />
        <input type="password" class="form-input" id="new_pass" placeholder=" New password" />
        <input type="password" class="form-input" id="confirm_pass" placeholder=" Re-type password" />
        <button class="btn btn-flat" id="save_changes">Save</button><button class="btn btn-flat" id="hide_c_pass">Cancel</button>
        <div id="loader_c"></div>
       </div>
        </div>
        `;

        form_div.innerHTML = input_forms;
    })

    $(document).on('click', '#hide_c_pass', function () {
        this.parentNode.parentNode.style.opacity = '0';
        this.parentNode.parentNode.style.transition = 'opacity 0.5s ease-in-out';
        setTimeout(() => {
            this.parentNode.parentNode.style.display = 'none';
        }, 500)
    });

    $(document).on('click', '#save_changes', function () {
        let [current_pass, new_pass, confirm_pass, user_id, loader] = [
            document.querySelector('#current_pass').value,
            document.querySelector('#new_pass').value,
            document.querySelector('#confirm_pass').value,
            document.querySelector('#id_logs').value,
            document.querySelector('#loader_c')
        ];

        $.ajax({
            url: '../../php/fetch_account.php',
            method: 'POST',
            data: {
                id: user_id,
                current_pass: current_pass,
                new_pass: new_pass,
                confirm_pass: confirm_pass
            },
            async: true,
            beforeSend: function () {
                loader.innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
            },
            success: function (data) {
                let res = JSON.parse(data);
                setTimeout(() => {
                    if (res.success === 'yes') {
                        loader.innerHTML = '';
                        M.toast({
                            html: 'Password Change'
                        })
                        document.querySelector('#current_pass').value = '';
                        document.querySelector('#new_pass').value = '';
                        document.querySelector('#confirm_pass').value = '';
                        setTimeout(() => {
                            document.querySelector('#save_changes').parentNode.parentNode.style.opacity = '0';
                            document.querySelector('#save_changes').parentNode.parentNode.style.transition = 'opacity 0.5s ease-in-out';
                            setTimeout(() => {
                                document.querySelector('#save_changes').parentNode.parentNode.style.display = 'none';
                            }, 500)
                        }, 1000)
                    } else {
                        loader.innerHTML = '';
                        M.toast({
                            html: res.error
                        })
                    }
                }, 2000)
            }
        })
    })
});