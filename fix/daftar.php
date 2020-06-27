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

    <title>LOGIN SIMDAS</title>

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
            <form class="form-horizontal form-label-left" method="POST" action="proses_edit_akun.php">
                    <input type="hidden" name="id_user" >
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" placeholder="Nama" required="required" type="text" value="<?php echo $row['nama_user'];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="username" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['username_user'];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['password_user'];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email_user'];?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="foto">
                          <input type="hidden" name="foto_old" value="<?=$row['profil_user']?>">
                            <label>
                              <input type="checkbox" class="js-switch" name="ubah_foto" /> *Klik jika ingin mengubah foto profil
                            </label>
                        </div>
                      </div>
                      <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea class="resizable_textarea form-control" style="height:250px;" name="alamat"><?php echo $row['alamat_user']?></textarea>
                    </div>
                  </div>  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button class='btn btn-success' type=submit value=Update><span class='fa fa-save' aria-hidden='true'></span> Update</button>
                          <a class='btn btn-danger' href="user.php" role='button'><span class='fa fa-close' aria-hidden='true'></span> Batal</a>
                        </div>
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
