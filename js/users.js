$(document).ready(function () {
  getFile();

  function getFile() {
    $.ajax({
      url: './php/users.php',
      method: 'GET',
      cache: false,
      success: function (data) {
        let res = JSON.parse(data);
        let output = '<h4 class="header_tabs_view text-bold">Files</h4>';
        res.forEach(respo => {
          let str = respo.file;
          let convert_array = Array.from(str);
          let str_result = convert_array.slice(1).join("").toString();
          if (
            respo.acc_username ===
            document.getElementById('username_logs').value
          ) {
            if (
              respo.files_id === respo.id &&
              respo.fileid === null &&
              respo.file_id === null
            ) {
              output += `
                  <ul class="collection">
                  <li class="collection-item avatar">
                  <i class="material-icons circle">folder</i>
                  <span class="title text-bold">Filename : ${str_result}</span>
                  <p class="text-bold text-is-grey">File type: ${respo.file_type}<br>
                  Move by : ${respo.move_by_r}<br>
                  Move at : ${respo.move_at_r}<br>
                  
                  File Destination : <span class="green-text text-bold">Research Office</span>
                  </p>
                  </li>
              </ul>
                  `;
              document.getElementById('no').innerHTML = '';
            } else if (
              respo.files_id === respo.id &&
              respo.fileid === respo.id &&
              respo.file_id === null
            ) {
              output += `
                <ul class="collection">
                <li class="collection-item avatar">
                <i class="material-icons circle">folder</i>
                <span class="title text-bold">Filename : ${str_result}</span>
                <p class="text-bold text-is-grey">File type : ${respo.file_type}<br>
                Move date: ${respo.move_at_a}<br>
                Move by: ${respo.move_by_a}<br>
                File Destination : <span class="green-text text-bold">Ara Office</span>
                </p>
                </li>
            </ul>
            `;
              document.getElementById('no').innerHTML = '';
            } else {
              output += `
                <ul class="collection">
                <li class="collection-item avatar">
                <i class="material-icons circle">insert_drive_file</i>
                <span class="title text-bold">Filename : ${str_result}</span>
                <p class="text-bold text-is-grey">File type : ${respo.file_type}<br>
                Move date: ${respo.move_at_e}<br>
                Move by: ${respo.move_by_e}<br>
                File Destination : <span class="green-text text-bold">EO Office<span>
                </p>
                </li>
            </ul>
                `;
              document.getElementById('no').innerHTML = '';
            }
          }
          document.getElementById('result').innerHTML = output;
        });
      }
    });
  }

  getNotif();

  function getNotif() {
    $.get('./php/check_notif.php', function (data) {
      let res = JSON.parse(data);
      console.log(res);
      let Unseen = '';
      let seen = '<strong style="font-size:20px;">Notification</strong>';
      let newseen = '<strong style="font-size:13px;" class="header_tabs_view">New</strong>';
      let olderseen = '<strong style="font-size:13px;" class="header_tabs_view text-is-grey">Older</st>';
      res.row.forEach(r => {
        let str = r.file;
        let convert_array = Array.from(str);
        let str_result = convert_array.slice(1).join("").toString();
        if (r.acc_username === document.getElementById('username_logs').value) {
          if (r.is_seen == false) {
            setSeen(r.notif_file_id);
            countNotif(r.notif_file_id);
            M.toast({
              html: `Your file is ${r.is_in}`
            });
            Unseen += `
              <ul class="collection bg-grey">
            <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Filename : ${str_result}</span>
            <p>
              Your File is in ${r.is_in}
            </p>
            </li>
            </ul>
            `;
            document.getElementById('noti').innerHTML = '';
            //document.getElementById('Unseen').innerHTML = Unseen;
          } else {
            if (r.send_date > res.datenow) {
              Unseen = '';
              newseen += `
              <ul class="collection bg-grey">
              <li class="collection-item avatar">
              <i class="material-icons circle">folder</i>
              <span class="title">Filename : ${str_result}</span>
              <p>
                Your File is in ${r.is_in}<br>
                <small>Date: ${r.send_date}</small>
              </p>
              </li>
              </ul>
            `;
              document.getElementById('new').innerHTML = newseen;
            } else {
              newseen = '';
              olderseen += `
            <ul class="collection">
            <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Filename : ${str_result}</span>
            <p>
              Your File is in ${r.is_in}<br>
              <small>Date: ${r.send_date}</small>
            </p>
            </li>
            </ul>
          `;
              document.getElementById('older').innerHTML = olderseen;
            }
            document.getElementById('noti').innerHTML = '';
          }
        }
      });
    });
  }

  function countNotif(id) {
    $.post(
      './php/count_seen.php', {
        id: id
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
        './php/set_seen.php', {
          id: id
        },
        function (data) {
          console.log(data);
          getNotif();
        }
      );
    }, 5000);
  }
  // get user accounts info
  $.post(
    './php/getuser_acc.php', {
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
  $.post(
    './php/get_user_file.php', {
      username: document.getElementById('username_logs').value
    },
    function (data) {
      let user = JSON.parse(data);
      let output = '';
      document.querySelector(
        '#h'
      ).innerHTML = `<h5>Uploaded Files <span class="new badge" data-badge-caption="Files">${
        user.length
      }</span></h5>`;
      user.forEach((res, index) => {
        output += `<li class="collection-item">${index + 1} : ${res.file}</li>`;
      });
      document.getElementById('output_file').innerHTML = output;
    }
  );

  $(document).on('click', '#c_pass', function () {
    let form_div = document.querySelector('#change_pass');
    let input_forms = `
        <div class="card account_style">
        <div class="card-content">
        <input type="password" class="form-input" id="current_pass" placeholder=" Current password" />
        <input type="password" class="form-input" id="new_pass" placeholder=" New password" />
        <input type="password" class="form-input" id="confirm_pass" placeholder=" Re-type password" />
        <button class="btn btn-flat" id="save_changes">Save</button><button class="btn btn-flat" id="hide_c_pass">Cancel</button>
        <div id="loader"></div>
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
      document.querySelector('#loader')
    ];

    $.ajax({
      url: './php/fetch_account.php',
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