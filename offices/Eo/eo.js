$(document).ready(function () {
    getMovesFile();

    function getMovesFile() {
        $.ajax({
            url: '../../php/fetch_eo.php',
            method: 'GET',
            cache: false,
            success: function (data) {
                let output = '';
                let res = JSON.parse(data);
                res.forEach(responce => {
                    if (responce.acc_username === 'faculty' && responce.file_type === 'Personal Data Sheet') {
                        output += ''
                    } else {
                        output += `
                        <ul class="collection">
                        <li class="collection-item avatar">
                        <i class="material-icons circle">insert_drive_file</i>
                        <span class="title">Username : ${responce.acc_username}</span>
                        <p>
                        Filename : ${responce.file}<br>
                        File type : ${responce.file_type}<br>
                        Move date: ${responce.move_at_e}<br>
                        Move by: ${responce.move_by_e}
                        </p>
                        </li>
                    </ul>
                        `;
                    }
                    document.getElementById('result').innerHTML = output;
                })
            }
        })
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
})