<?php require_once ('database/connection.php');
//check get id 
//
$id = $_GET['id'];
$sql= "SELECT * FROM `posts` INNER JOIN `users` ON `users`.id = `posts`.user_id WHERE `posts`.id='$id' ";
$result = mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);

?>
<?php require_once ('inc/header.php') ?>



 <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?php echo $post['title'] ?></h1>
                            <span class="subheading">
                            <p class="post-meta">
                                Posted by
                                <a href="#!"><?php echo $post['publisher'];?></a>
                                <?php echo date("M d,y",strtotime( $post['created_at'])) ;?>
                        </p></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p class="border p-2"> Created By : <?=$post['name']; echo $id; ?></p>
                        <p><?=$post['content']; echo $id; ?></p>

                        <div class="d-flex align-items-center my-3">
                    <button class="btn btn-outline-primary me-2" id="likeBtn">
                        👍 Like
                    </button>
                    <span id="likeCount">0</span> Likes
                </div>

                 <div class="card mt-4 shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Leave a Comment</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <input type="hidden" name="post_id" value="<?=$id;?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Write a comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Post Comment</button>
                        </form>
                    </div>
                </div>

                <!-- Existing Comments -->
                <div class="mt-4">
                    <h6>Comments</h6>
                    <!-- Example static comments -->
                    <div class="border p-2 mb-2 rounded">
                        <strong>Ahmed</strong> <small class="text-muted">- Aug 18, 2025</small>
                        <p>Great post! Learned a lot 👍</p>
                    </div>
                    <div class="border p-2 mb-2 rounded">
                        <strong>Sarah</strong> <small class="text-muted">- Aug 17, 2025</small>
                        <p>Thanks for sharing this content 👏</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
                        
                    </div>
                </div>
            </div>
        </article>
      <?php require_once('inc/footer.php') ?>
