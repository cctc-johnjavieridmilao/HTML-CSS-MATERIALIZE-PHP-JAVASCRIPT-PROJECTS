$(document).ready(function () {
  getData();
  // get data
  function getData() {
    $.ajax({
      url: '../../php/hr.php',
      method: 'GET',
      success: function (data) {
        let res = JSON.parse(data);
        let output = '';
        res.forEach(responce => {
          if (
            responce.acc_username === 'faculty' &&
            responce.file_type === 'Personal Data Sheet'
          ) {
            output += `
                        <ul class="collection">
                        <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Filename : ${responce.file}</span>
                        <p>File type : ${responce.file_type}<br>
                        Move at : ${responce.move_date}<br>
                        Move by : ${responce.move_by}
                        </p>
                        <div class="secondary-content">
                        <a href="#" id="d_loader${
                          responce.file
                        }" data-filename="${
              responce.file
            }" class="download_file"><i class="material-icons">cloud_download</i></a>
                        </div>
                        </li>
                    </ul>
                        `;
          }
          document.getElementById('result').innerHTML = output;
        });
      }
    });
  }
  // dowload file
  $(document).on('click', '.download_file', function (e) {
    e.preventDefault();
    let file_name = this.getAttribute('data-filename');
    $.ajax({
      url: `../Faculty/uploaded_files/${file_name}`,
      method: 'GET',
      xhrFields: {
        responseType: 'blob'
      },
      beforeSend: function () {
        document.getElementById('d_loader' + file_name).innerHTML = `
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
        setTimeout(() => {
          var a = document.createElement('a');
          var url = window.URL.createObjectURL(data);
          a.href = url;
          a.download = file_name;
          document.body.append(a);
          a.click();
          a.remove();
          window.URL.revokeObjectURL(url);
          document.getElementById(
            'd_loader' + file_name
          ).innerHTML = `<i class="material-icons">cloud_download</i>`;
        }, 2000);
      }
    });
  });

  getNotif();

  // get notification
  function getNotif() {
    $.get('../../php/hr.php', function (data) {
      let res = JSON.parse(data);
      let Unseen = '';
      let seen = '';
      res.forEach(r => {
        if (r.is_seen == false) {
          setSeen(r.notif_file_id);
          countNotif();
          M.toast({
            html: `Faculty Send Personal Data Sheet`
          });
          Unseen += `
              <ul class="collection" id="un">
            <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Filename : ${r.file}</span>
            <p>
              Send by : ${r.send_by}<br>
              Send Date : ${r.send_date}
            </p>
            </li>
            </ul>
            `;
        } else {
          let id = parseInt(r.file_hr_id);
          countCom(id);
          seen += `
                <ul class="collection file_tems" id="${r.file_hr_id}">
              <li class="collection-item avatar">
              <i class="material-icons circle">folder</i>
              <span class="title">Filename : ${r.file}</span>
              <p>
              Send by : ${r.send_by}<br>
              Send Date : ${r.send_date}
              </p>
              <input type='hidden' class="countCom" id='countCom${
                r.file_hr_id
              }'>
              <input type='hidden' class="countCom1" id='countCom1${
                r.file_hr_id
              }'>
              <span id="show${r.file_hr_id}" data-id="${
            r.file_hr_id
          }" class="show">Show Comment</span>
          <a href="#" id="${
            r.file_hr_id
          }" class="secondary-content comment"><i class="material-icons">comment</i></a>
              <div id="s-h${r.file_hr_id}" style="display:none;"></div>
              <div class="input-field" id="input_com${r.file_hr_id}">
              </div>
              </li>
              </ul>
              `;
        }
        document.getElementById('unseen').innerHTML = Unseen;
        document.getElementById('seen').innerHTML = seen;
      });
    });
  }
  // show/hide form to div
  $(document).on('click', '.comment', function (e) {
    e.preventDefault();
    let id = $(this).attr('id');
    let input_div = document.getElementById('input_com' + id);
    input_div.innerHTML = `<input type='text' id='comment'>
    <button class='btn btn-flat' id='btn_comment'>Comment</button>
    <button class='btn btn-flat cancel' id="${id}">Cancel</button>
    <input type='hidden' class='id_input' id="${id}">
    <div id='loader'></div>`;
  });

  //hide form to div
  $(document).on('click', '.cancel', function (e) {
    e.preventDefault();
    let id = this.getAttribute('id');
    document.getElementById('input_com' + id).innerHTML = '';
  });

  // save comment to database
  $(document).on('click', '#btn_comment', function () {
    let id = document.querySelector('.id_input').getAttribute('id');
    console.log(id)
    let comment = document.querySelector('#comment').value;
    let loader = document.querySelector('#loader');
    if (comment === '' || comment === null) {
      M.toast({
        html: 'Empty Comment'
      });
      console.log(comment.value)
    } else {
      $.ajax({
        url: '../../php/comment.php',
        method: 'POST',
        data: {
          id: id,
          comment: comment
        },
        beforeSend: function () {
          loader.innerHTML =
            '<div class="progress"><div class="indeterminate"></div></div>';
        },
        success: function (data) {
          setTimeout(() => {
            let res = JSON.parse(data);
            document.getElementById('input_com' + id).innerHTML = '';
            M.toast({
              html: res.success
            });
            document.querySelector('#s-h' + id).style.display = 'block';
            getComment(id);
            countCom(id);
          }, 3000);
        }
      });
    }
  });
  // show comment
  $(document).on('click', '.show', function () {
    let id = this.getAttribute('data-id');
    getComment(id);
    if (document.querySelector('#s-h' + id).style.display === 'none') {
      document.querySelector('#s-h' + id).style.display = 'block';
      this.textContent = document.querySelector('#countCom1' + id).value;
    } else {
      document.querySelector('#s-h' + id).style.display = 'none';
      this.textContent = document.querySelector('#countCom' + id).value;
    }
  });

  // count comment
  function countCom(id) {
    $.post(
      '../../php/count_comment.php', {
        id: id
      },
      function (data) {
        let res = JSON.parse(data);
        document.querySelector(
          '#show' + id
        ).innerHTML = `<strong>Show comment (${res.count})</strong>`;
        document.querySelector('#countCom' + id).value = `Show comment (${
          res.count
        })`;
        document.querySelector('#countCom1' + id).value = `Hide comment (${
          res.count
        })`;
      }
    );
  }

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

  // get comments
  function getComment(id) {
    let showComment = '';
    $.post(
      '../../php/get_comment.php', {
        id: id
      },
      function (data) {
        let res = JSON.parse(data);
        console.log(res);
        res.forEach(com => {
          let comid = parseInt(com.id);
          countrepy(comid);
          showComment += `
                    <div class="card z-depth-1 divcom" id="divcom${comid}" style="border-radius:25px;">
                    <div class="card-content">
                    <p class="text-bold">Hr office <span style="font-size:10px;">${com.com_date}</span></p>
                    <p id="comment-text${com.id}">${com.comment}</p>
                    <input type='hidden' class="countrep" id='countrep${
                      com.id
                    }'>
                    <input type='hidden' class="countrep1" id='countrep1${
                      com.id
                    }'>
                    <span id="show_reply${com.id}" data-id="${
                com.id
                  }" class="show_reply">Show Reply</span>
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
                    <div class="secondary-content">
                    <a class='dropdown-trigger reply' href='#' id="${com.id}" data-file-id="${com.come_file_id}"><i class="material-icons">comment</i></a>
                    <a class='dropdown-trigger edit' href='#' id="${com.id}"><i class="material-icons">edit</i></a>
                    <a class='dropdown-trigger remove' data-file-id="${com.come_file_id}" data-id="${com.id}" href='#' id="item-remove${com.id}"><i class="material-icons">delete</i></a>
                    </div>
                    </div>
                 `;
        });
        document.querySelector('#s-h' + id).innerHTML = showComment;
      }
    );
  }

  // remove comment
  $(document).on('click', '.remove', function (e) {
    e.preventDefault();
    let id = this.getAttribute('data-id');
    let file_id = this.getAttribute('data-file-id');
    $.ajax({
      url: '../../php/delete_comment.php',
      method: 'POST',
      data: {
        id: id,
      },
      async: true,
      beforeSend: function () {
        document.querySelector('#item-remove' + id).innerHTML = `
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
          document.querySelector('#item-remove' + id).innerHTML = `<i class="material-icons">delete</i>`;
          document.getElementById('divcom' + id).style.display = 'none';
          countCom(file_id);
        }, 2000)
      }
    })
  })

  // edit comment
  $(document).on('click', '.btn_reply_edit', function (e) {
    e.preventDefault();
    let id = this.getAttribute('id');
    let edit_comment = document.querySelector('#reply-edit' + id).value;
    let loader = document.querySelector('#loader_edit' + id);
    $.ajax({
      url: '../../php/edit_comment.php',
      method: 'POST',
      data: {
        id: id,
        edit_comment: edit_comment
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
          document.querySelector('#comment-text' + id).textContent = edit_comment;
          document.querySelector('#input_edit' + id).style.display = 'none';
        }, 2000)
      }
    })
  })

  // edit comment toggle
  $(document).on('click', '.edit', function (e) {
    e.preventDefault();
    let id = this.getAttribute('id');
    let input_edit = document.querySelector('#input_edit' + id);
    if (input_edit.style.display === 'none') {
      input_edit.style.display = 'block';
    } else {
      input_edit.style.display = 'none';
    }
  })

  //edit cancel comment
  $(document).on('click', '.cancel_edit', function (e) {
    e.preventDefault();
    let id = this.getAttribute('id');
    let input_edit = document.querySelector('#input_edit' + id);
    input_edit.style.display = 'none';
  })

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

  // get reply
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
          if (coms.user_name === document.querySelector('#username_logs').value) {
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

  // reply
  $(document).on('click', '.reply', function (e) {
    e.preventDefault();
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

  //save reply to database
  $(document).on('click', '#btn_reply_comment', function () {
    let reply_id = document.querySelector('.reply_id').getAttribute('id');
    let file_id = document.querySelector('.reply_file_id').getAttribute('id');
    let reply = document.querySelector('#reply-comments').value;
    let username = document.querySelector('#username_logs').value;
    let loader = document.querySelector('#loader_reply');
    if (reply === '' || reply === null) {
      M.toast({
        html: 'Empty Reply'
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
            countrepy(reply_id);
          }, 3000);
        }
      });
    }
  });

  // cancel reply
  $(document).on('click', '.cancel_reply', function (e) {
    e.preventDefault();
    let id = this.getAttribute('id');
    document.getElementById('input_reply' + id).innerHTML = '';
  });

  // count notification
  function countNotif() {
    $.post(
      '../../php/count_notif_hr.php', {
        id: 'Hr Office'
      },
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
  function setSeen(id) {
    setTimeout(() => {
      $.post(
        '../../php/hr_seen.php', {
          id: id
        },
        function (data) {
          console.log(data);
          getNotif();
        }
      );
    }, 5000);
  }
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
                    <li class="collection-item">Created at : ${
                      res.created_at
                    }</li>
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
  });

  $(document).on('click', '#hide_c_pass', function () {
    this.parentNode.parentNode.style.opacity = '0';
    this.parentNode.parentNode.style.transition = 'opacity 0.5s ease-in-out';
    setTimeout(() => {
      this.parentNode.parentNode.style.display = 'none';
    }, 500);
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
        loader.innerHTML =
          '<div class="progress"><div class="indeterminate"></div></div>';
      },
      success: function (data) {
        let res = JSON.parse(data);
        setTimeout(() => {
          if (res.success === 'yes') {
            loader.innerHTML = '';
            M.toast({
              html: 'Password Change'
            });
            document.querySelector('#current_pass').value = '';
            document.querySelector('#new_pass').value = '';
            document.querySelector('#confirm_pass').value = '';
            setTimeout(() => {
              document.querySelector(
                '#save_changes'
              ).parentNode.parentNode.style.opacity = '0';
              document.querySelector(
                  '#save_changes'
                ).parentNode.parentNode.style.transition =
                'opacity 0.5s ease-in-out';
              setTimeout(() => {
                document.querySelector(
                  '#save_changes'
                ).parentNode.parentNode.style.display = 'none';
              }, 500);
            }, 1000);
          } else {
            loader.innerHTML = '';
            M.toast({
              html: res.error
            });
          }
        }, 2000);
      }
    });
  });
});