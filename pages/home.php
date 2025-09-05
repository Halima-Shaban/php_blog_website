<?php require_once ('database/connection.php') ;
    // $sql = "SELECT * FROM `posts`";

    $sql="SELECT posts.id AS post_id,posts.title,posts.publisher,posts.content,posts.user_id,posts.created_at,users.id,users.name
     FROM `posts`INNER JOIN `users` ON users.id =posts.user_id ORDER BY `post_id` DESC";

    $result=mysqli_query($conn,$sql);
    

    // $posts = mysqli_fetch_assoc($result);

    // while ($row=mysqli_fetch_assoc($result)) {
        
    //         echo "<pre>";
    //         var_dump($row);
    //         echo "</pre>";
    // }

    // die;

?>
<?php require_once ('inc/header.php') ?>


 <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1><?php echo $site_info['site_name'] ?></h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                <?php while ($row=mysqli_fetch_assoc($result)):  ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="index.php?url=post&id=<?php echo $row['post_id'];?>">
                            <h2 class="post-title"><?php echo $row['title'];?></h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row['publisher'];?></a>
                            <?php echo date("M d,y",strtotime( $row['created_at'])) ;?>
                        </p>
                        <p class="post-meta">
                            Posted by
                          <?php echo $row['name'];?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />

                    <?php endwhile; ?>
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
       
<?php require_once('inc/footer.php') ?>
