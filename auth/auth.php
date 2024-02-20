<?php
session_start();
if (isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
// Include database connectivity

include_once('../koneksi.php');

if (isset($_POST['submit'])) {
    $errorMsg = "";
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string(md5($_POST['password']));

    if (!empty($username) || !empty($password)) {
        $query  = "SELECT * FROM admins WHERE username = '$username'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['NAME'] = $row['name'];
            header("Location:dashboard.php");
            die();
        } else {
            $errorMsg = "No user found on this username";
        }
    } else {
        $errorMsg = "Username and Password is required";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn&SignUp</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="icon" href="../admin/favicon.png" type="image/x-icon">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../cek_login.php" method="post" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>


          <form action="../cek_register.php" method="post" class="sign-up-form">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
           
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="alamat" placeholder="Addres" />
            </div>
            <div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" id="password" placeholder="Password" />
    <span toggle="#password" class="fas fa-eye field-icon toggle-password"></span>
</div>
            <div class="input-field ">
               <i class="fas fa-user"></i>
               <select name="role" id="role">
    <option value="" disabled selected>Register as</option>
    <option value="1">Admin</option>
    <option value="2">Dokter</option>
    <option value="3">Apoteker</option>
    <option value="4">Pasien</option>
</select>
<!-- <br>
<div class="input-field " id="bpjsField" style="display: none;">
                            <label>Kelas BPJS</label>
                            <input class="form-control" type="text" name="bpjs_class">
                        </div> -->
          </div>  
            <input type="submit" value="Sign Up" class="btn solid" />

            
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>Hello, Friend!</h3>
                <p>Step into the World of Medico, Your Health Companion</p>
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="./img/top_service.png" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us?</h3>
                <p>Register with your personal details to use all of site features</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="./img/ability_img.png" class="image" alt="">
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
    <script>
      const roleSelect = document.querySelector('select[name="role"]');
      const bpjsField = document.getElementById('bpjsField');

      roleSelect.addEventListener('change', function(){
        if (roleSelect.value === "4") {
          bpjsField.style.display = 'block';
        }else{
          bpjsField.style.display = 'none';
        }
        
      });
    </script>
    <script>
    const passwordField = document.getElementById('password');
    const togglePassword = document.querySelector('.toggle-password');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
  </body>
</html>
