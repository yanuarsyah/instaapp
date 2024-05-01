<?php 
$user = $conn->query("SELECT *, concat(firstname, ' ', coalesce(concat(middlename,' '),''),lastname) as `name` FROM member_list where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$$k = $v;
}
?>
<style>
	#profile-avatar{
      height: 8em;
      width: 8em !important;
      object-fit: cover;
      object-position: center;
    }
    .post-holder{
        width:100%;
        height:20em;
    }
    .post-img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:center center;
        transition:transform .3s ease-in-out;
    }
    .post-item:hover .post-img{
        transform:scale(1.2);
    }
</style>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-light shadow blur d-flex w-100 justify-content-center align-items-center flex-column">
	<img src="<?= validate_image(isset($avatar) ? $avatar : '') ?>" alt="" class="img-thumbnail rounded-circle p-0" id="profile-avatar">
    <h3 class="text-center font-weight-bolder"><?= isset($name) ? $name : '' ?></h3>
    <div class="text-center font-weight-light text-muted"><?= isset($email) ? $email : '' ?></div>
</div>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <?php 
                            $qry = $conn->query("SELECT p.*, concat(m.firstname, ' ', coalesce(concat(m.middlename,' '),''),m.lastname) as `name`, m.avatar, COALESCE((SELECT count(member_id) FROM `like_list` where post_id = p.id),0) as `likes`, COALESCE((SELECT count(member_id) FROM `comment_list` where post_id = p.id),0) as `comments` FROM post_list p inner join `member_list` m on p.member_id = m.id where p.member_id = '{$_settings->userdata('id')}' order by unix_timestamp(p.date_updated) desc");
                            while($row = $qry->fetch_assoc()):
                            $files = array();
                            $fopen = scandir(base_app.$row['upload_path']);
                            foreach($fopen as $fname){
                                if(in_array($fname,array('.','..')))
                                  continue;
                                $files[]= validate_image($row['upload_path'].$fname);
                            }
                        ?>
                        <a href="./?page=posts/view_post&id=<?= $row['id'] ?>" class="card rounded-0 shadow col-lg-4 col-md-6 col-sm-12 col-xs-12 post-item px-0 text-decoration-none text-reset">
                            <div class="post-holder overflow-hidden">
                                <img src="<?= isset($files[0]) ? $files[0] : validate_image('') ?>" class="card-img-top post-img" alt="...">
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="like_post" data-id="<?= $row['id'] ?>"><i class="fa fa-heart text-danger"></i> <?= format_num($row['likes']) ?> Likes</div>
                                    <div class="post_comments" data-id="<?= $row['id'] ?>"><i class="far fa-comment"></i> <?= format_num($row['comments']) ?> Comments</div>
                                </div>
                            </div>
                        </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>