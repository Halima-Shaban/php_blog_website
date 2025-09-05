<?php

require_once('../../app/config.php');
require_once('../../database/connection.php');

if ($_SESSION['auth']['role'] == "admin") {


    $count_posts = mysqli_query($conn, "SELECT count(*) as posts_number FROM posts");
    $all_posts_number = mysqli_fetch_assoc($count_posts)['posts_number'];


    // $count_posts_ress =mysqli_fetch_all($count_posts) ;
    $page = $_GET['page'] ?? 0;
    $limit = 10;
$page_number =(int)($all_posts_number / $limit);
    $offset = (int) $page_number * $page;
    // $offset=0;

    $sql = "SELECT *, `posts`.`id` AS post_id FROM `posts` 
            INNER JOIN `users` ON `users`.`id` = `posts`.`user_id` LIMIT  $limit OFFSET $offset";
} else {

    $user_id = $_SESSION['auth']['id'];
    $sql = "SELECT *, `posts`.`id` AS post_id FROM `posts` 
            INNER JOIN `users` ON `users`.`id` = `posts`.`user_id` WHERE `posts`.`user_id`=$user_id  LIMIT  $limit OFFSET $offset";
}

$result = mysqli_query($conn, $sql);



require_once('../inc/header.php');
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">

                <?php
                if ($_SESSION['auth']['role'] == "admin") : ?>

                    <h2> Admin Posts</h2>

                    <!-- <form action="/action/search.php" method="POST" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->

                <?php else: ?>
                    <h2> Writer Posts</h2>;
                <?php endif ?>


                <a href="<?php echo URL; ?>/admin/posts/create.php" class="btn btn-success">
                    Add New Post
                </a>
            </div>

            <?php require_once("../../inc/alert.php") ?>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">User</th>
                            <th scope="col">Content</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php while ($post = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <th scope="row"><?php echo $counter++; ?></th>
                                <td><?php echo htmlspecialchars($post['title']) . " - " . $post['post_id']; ?></td>
                                <td><?php echo htmlspecialchars($post['publisher']); ?></td>
                                <td><?php echo htmlspecialchars($post['name']); ?></td>
                                <td class="text-start"><?php echo nl2br(htmlspecialchars($post['content'])); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-outline-info" href="<?php echo URL; ?>/admin/posts/edit.php?id=<?php echo $post['post_id']; ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-outline-danger" href="<?php echo URL; ?>/admin/action/posts/delete.php?id=<?php echo $post['post_id']; ?>">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for($i=1;$i<=$page_number;$i++):  ?>
                            <li class="page-item <?=$i==$page ?"active":"" ?>"><a class="page-link" href="?page=<?php echo $i?>"> <?php echo $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>