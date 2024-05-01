<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
    <?php if($_settings->chk_flashdata('success')): ?>
    <script>
      alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
    <?php endif;?>      
  <script>
    start_loader()
  </script>
  <style>
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
      backdrop-filter: contrast(1);
    }
    #page-title{
      text-shadow: 6px 4px 7px black;
      font-size: 3.5em;
      color: #fff4f4 !important;
    }
  </style>
  <h1 class="text-center text-white px-4 py-5" id="page-title"><b><?php echo $_settings->info('name') ?></b></h1>
<div class="login-box w-100 h-75">
  <div class="container h-100">
    <div class="d-flex w-100 px-4 h-100 align-items-center">
      <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
        <div class="container">
          <?php 
            $files = array();
              $fopen = scandir(base_app.'uploads/banner');
              foreach($fopen as $fname){
                if(in_array($fname,array('.','..')))
                  continue;
                $files[]= validate_image('uploads/banner/'.$fname);
              }
          ?>
          <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="2500" data-pause="false">
              <div class="carousel-inner h-100">
                  <?php foreach($files as $k => $img): ?>
                  <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
                      <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
                  </div>
                  <?php endforeach; ?>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <!-- /.login-logo -->
        <div class="card card-navy my-2">
          <div class="card-body">
            <p class="login-box-msg">Please enter your credentials</p>
            <form id="ulogin-frm" action="" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="email" autofocus placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control"  name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <a href="./register.php">Create an Account</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                
                <!-- /.col -->
              </div>
            </form>
            <!-- /.social-auth-links -->

            <!-- <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p> -->
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
    $('#ulogin-frm').submit(function(e) {
        e.preventDefault()
        start_loader()
        if ($('.err_msg').length > 0)
            $('.err_msg').remove()
        $.ajax({
            url: _base_url_ + 'classes/Login.php?f=user_login',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)

            },
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp.status == 'success') {
                        location.replace(_base_url_ + 'user');
                    } else if (resp.status == 'incorrect') {
                        var _frm = $('#ulogin-frm')
                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                        _frm.prepend(_msg)
                        _frm.find('input').addClass('is-invalid')
                        $('[name="username"]').focus()
                    }
                    end_loader()
                }
            }
        })
    })
  })
</script>
</body>
</html>