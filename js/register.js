$(document).ready(function () {

    let [f_name, u_name, u_password, u_cpassword, regForm, borderErr, borderNone, loader] = [
        document.getElementById('f_name'),
        document.getElementById('u_name'),
        document.getElementById('u_password'),
        document.getElementById('u_cpassword'),
        document.getElementById('regForm'),
        'red solid 3px',
        '',
        document.getElementById('loader')

    ];

    regForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let btnokay = `<span>Please fill in all fields</span><button class="btn-flat toast-action"></button>`;
        if (f_name.value === '' || u_name.value === '' || u_password.value === '' || u_cpassword.value === '') {
            M.toast({
                html: btnokay
            });
            f_name.style.borderRight = borderErr;
            u_name.style.borderRight = borderErr;
            u_password.style.borderRight = borderErr;
            u_cpassword.style.borderRight = borderErr;
        } else {
            f_name.style.borderRight = borderNone;
            u_name.style.borderRight = borderNone;
            u_password.style.borderRight = borderNone;
            u_cpassword.style.borderRight = borderNone;
            if (u_password.value !== u_cpassword.value) {
                u_password.style.borderRight = borderErr;
                u_cpassword.style.borderRight = borderErr;
                M.toast({
                    html: '<span>Password do not match</span>'
                });
            } else {
                $.ajax({
                    url: './php/u_register.php',
                    method: 'POST',
                    data: {
                        f_name: f_name.value,
                        u_name: u_name.value,
                        u_password: u_password.value,
                    },
                    beforeSend: function () {
                        loader.innerHTML = '<div class="progress"><div class="indeterminate"></div></div>';
                    },
                    success: function (data) {
                        let res = JSON.parse(data);
                        setTimeout(() => {
                            if (res.success == 'success') {
                                M.toast({
                                    html: `<span>User Registered</span>`
                                });
                                console.log(res.success);
                                loader.innerHTML = '';
                                regForm.reset();
                            } else {
                                M.toast({
                                    html: `<span>${res.error}</span>`
                                });
                                console.log(res.error);
                                loader.innerHTML = '';
                                regForm.reset();
                            }

                        }, 2000)

                    }

                })
            }
        }
        // keyup event 
        f_name.addEventListener('keyup', checkForm);
        u_name.addEventListener('keyup', checkForm);
        u_password.addEventListener('keyup', checkForm);
        u_cpassword.addEventListener('keyup', checkForm);
        // check if empty
        function checkForm() {
            if (this.value !== '') {
                this.style.borderRight = borderNone;
            } else {
                this.style.borderRight = borderErr;
            }
        }
    })
    //end
});