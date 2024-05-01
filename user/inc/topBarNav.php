<style>
  .user-img {
    position: absolute;
    height: 27px;
    width: 27px;
    object-fit: cover;
    left: -7%;
    top: -12%;
}
</style>
<nav class="main-header navbar navbar-expand-lg navbar-light bg-gradient-light border-bottom border-4 shadow">
            <div class="container px-4 px-lg-5 ">
                <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand" href="./">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link" id="upload-modal" aria-current="page" href="javascript:void(0)"><i class="far fa-plus-square mr-2"></i>Upload</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="./?page=user/profile">Profile</a></li>
                    </ul>
                    <div class="d-flex align-items-center">
                      <div class="btn-group nav-link text-reset">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon  text-reset" data-toggle="dropdown">
                          <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image"></span>
                          <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="<?php echo base_url.'user/?page=user' ?>"><span class="fa fa-user"></span> My Account</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="<?php echo base_url.'/classes/Login.php?f=user_logout' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#login-btn').click(function(){
      uni_modal("","login.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
    $('#upload-modal').click(function(){
      uni_modal('<i class="far fa-plus-square"></i> Add New Post','posts/manage_post.php','modal-lg')
    })
  })

</script>