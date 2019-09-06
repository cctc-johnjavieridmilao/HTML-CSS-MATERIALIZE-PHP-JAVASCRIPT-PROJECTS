$(document).ready(function() {
  let [u_name, u_password, loginForm, borderErr, borderNone, loader] = [
    document.getElementById('u_name'),
    document.getElementById('u_password'),
    document.getElementById('loginForm'),
    'red solid 3px',
    '',
    document.getElementById('loader')
  ];
  loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    let btnokay = `<span>Please fill in all fields</span><button class="btn-flat toast-action"></button>`;
    if (u_name.value === '' || u_password.value === '') {
      M.toast({
        html: btnokay
      });
      u_name.style.borderRight = borderErr;
      u_password.style.borderRight = borderErr;
    } else {
      u_name.style.borderRight = borderNone;
      u_password.style.borderRight = borderNone;
      $.ajax({
        url: './php/u_login.php',
        method: 'POST',
        data: {
          u_name: u_name.value,
          u_password: u_password.value
        },
        beforeSend: function() {
          loader.innerHTML =
            '<div class="progress"><div class="indeterminate"></div></div>';
        },
        success: function(data) {
          let res = JSON.parse(data);
          setTimeout(() => {
            switch (res.success) {
              case 'yesAra':
                window.location.href = './offices/Ara/home_ara.php';
                break;
              case 'yesEo':
                window.location.href = './offices/Eo/home_eo.php';
                break;
              case 'yesFaculty':
                window.location.href = './offices/Faculty/home_faculty.php';
                break;
              case 'yesHr':
                window.location.href = './offices/Hr/home_hr.php';
                break;
              case 'yesResearch':
                window.location.href = './offices/research/home_research.php';
                break;
              case 'yesUsers':
                window.location.href = 'home.php';
                break;
              default:
                M.toast({
                  html: `<span>${res.error}</span>`
                });
                loader.innerHTML = '';
                loginForm.reset();
                break;
            }
          }, 2000);
        }
      });
    }
    u_name.addEventListener('keyup', checkForm);
    u_password.addEventListener('keyup', checkForm);

    function checkForm() {
      if (this.value !== '') {
        this.style.borderRight = borderNone;
      } else {
        this.style.borderRight = borderErr;
      }
    }
  });
});
