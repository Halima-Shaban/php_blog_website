<?php
require_once('../../app/config.php');
require_once('../inc/header.php');
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card UI -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white  d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create Post</h4>
                    <a href="<?= URL; ?>/admin/posts/index.php" class="btn btn-light btn-sm">← Back to Posts</a>

                </div>
                <div class="card-body">
                    <?php require_once("../../inc/alert.php"); ?>

                    <form action="<?php echo URL; ?>/admin/action/posts/create.php" method="POST">
                        <!-- Optional hidden ID field -->
                        <input type="hidden" name="id" value="<?= $post['id'] ?? '' ?>">

                        <div class="mb-3">
                            <label class="form-label">Post Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter post title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Publisher</label>
                            <input type="text" name="publisher" class="form-control" placeholder="Publisher name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea rows="6" name="content" class="form-control" placeholder="Write your post content here..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>
