<?php
require_once('../../app/config.php');
require_once('../inc/header.php');
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Create New User</h3>
                </div>
                <div class="card-body">
                    <?php require_once("../../inc/alert.php") ?>

                    <form action="<?= URL; ?>/admin/action/users/create.php" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id'] ?? '' ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select" required>
                                <option value="writer" >Writer</option>
                                <option value="admin">Admin</option>
                                <option value="admin" selected>reader</option>
                            </select>
                        </div>

                       

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success text-uppercase">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>
