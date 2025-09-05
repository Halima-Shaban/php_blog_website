<?php 
require_once('../../app/config.php');
require_once('../../database/connection.php');
require_once('../../app/helpers.php');
require_once('../../app/validations.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

require_once('../inc/header.php');
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Edit User</h3>
                </div>
                <div class="card-body">
                    <?php require_once("../../inc/alert.php") ?>

                    <form action="<?= URL; ?>/admin/action/users/update.php?id=<?= $user['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success text-uppercase">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>
