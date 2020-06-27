<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LOGIN Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

<?php
    // CHECK PARAMETER ERROR PADA URL DARI AUTH
    $error = "";
    if(isset($_GET['error']) && !empty($_GET['error'])){
        switch($_GET['error']){
            case 1:
                $error = "<div class='alert alert-danger'>Username Tidak Boleh Kosong !</div>";
            break;
            case 2:
                $error = "<div class='alert alert-danger'>Password Tidak Boleh Kosong !</div>";
            break;
            case 3:
                $error = "<div class='alert alert-danger'>Username Dan Password Tidak Boleh Kosong !</div>";
            break;
            case 4:
                $error = "<div class='alert alert-danger'>Username atau Password Salah !</div>";
            break;
        }
    }
?>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <center><img src="images/logo.png" style="width : 100px; height: 100px;" class="img-responsive" alt="Responsive image"></center>
            <form action="proses_login_admin.php" method="POST" role="form">
              <h1>LOGIN ADMIN</h1>
              <div>
                <input type="text" class="form-control" name="username_admin" placeholder="Username"/>
              </div>
              <div>
                <input type="password" class="form-control" name="password_admin" id="showPassword" placeholder="Password"/>
                <label><input id="checkbox" type="checkbox" class="form-checkbox"> Tampilkan password</label>
              </div>
              <div class="container">
                <div class="row">
                  <div class="error"><font color="#fffff"><?php echo $error; ?></font></div>
                </div>
              </div>
              <div class="separator">
                <button type="submit" class="btn btn-success">Log in</button>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>

<script type="text/javascript" src="//code.jquery.com/jquery.js" ></script>
  </body>

<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('#showPassword').attr('type','text');
      }else{
        $('#showPassword').attr('type','password');
      }
    });
  });
</script>

</html>
