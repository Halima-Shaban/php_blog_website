<?php
require_once('../../app/config.php');
require_once('../../database/connection.php');
require_once('../../app/helpers.php');
require_once('../../app/validations.php');

$id = $_GET['id'];
$sql = "SELECT * FROM `posts` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

require_once('../inc/header.php');
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0"> Edit Post</h2>
                <a href="<?= URL; ?>/admin/posts/index.php" class="btn btn-outline-secondary">
                    ← Back to Posts
                </a>
            </div>

            <?php require_once("../../inc/alert.php") ?>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="<?= URL; ?>/admin/action/posts/update.php?id=<?= $post['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Post Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $post['title']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Publisher</label>
                            <input type="text" name="publisher" class="form-control" value="<?= $post['publisher']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Content</label>
                            <textarea name="content" rows="8" class="form-control" required><?= trim($post['content']); ?></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                 Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>
