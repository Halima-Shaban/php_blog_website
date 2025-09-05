<?php
require_once('../../app/config.php');
require_once('../../database/connection.php');

$count_user = mysqli_query($conn, "SELECT count(*) as users_number FROM users");
    $all_users_number = mysqli_fetch_assoc($count_user)['users_number'];
  $page = $_GET['page'] ?? 0;
    $limit = 10;
    $page_number =(int)($all_users_number / $limit);
    var_dump($page_number);
    $offset = (int) $page_number * $page;



$sql = "SELECT * FROM `users` LIMIT  $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
require_once('../inc/header.php');
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Users Management</h2>
                <a href="<?php echo URL;?>/admin/users/create.php" class="btn btn-success">Add User</a>
            </div>

            <?php require_once("../../inc/alert.php") ?>

            <div class="table-responsive shadow-sm">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= htmlspecialchars($user['name']); ?></td>
                            <td><?= htmlspecialchars($user['username']); ?></td>
                            <td><?= htmlspecialchars($user['role']); ?></td>

                            <td>
                                <a href="<?= URL; ?>/admin/users/edit.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </td>

                            <td>
                                <a href="<?= URL; ?>/admin/action/users/delete.php?id=<?= $user['id']; ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                    <i class="bi bi-trash"></i> Delete
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
