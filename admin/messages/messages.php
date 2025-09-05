<?php
require_once('../../app/config.php');
require_once('../../database/connection.php');
require_once('../../app/validations.php');


  $count_message = mysqli_query($conn, "SELECT count(*) as messages_number FROM messages");
    $all_messages_number = mysqli_fetch_assoc($count_message)['messages_number'];
  $page = $_GET['page'] ?? 0;
    $limit = 10;
    $page_number =(int)($all_messages_number / $limit);
    $offset = (int) $page_number * $page;



$sql = "SELECT * FROM `messages` LIMIT  $limit OFFSET $offset";
$result = mysqli_query($conn,$sql);

require_once('../inc/header.php');
?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Messages</h4>
                    <a href="<?php echo URL; ?>/admin/index.php" class="btn btn-light btn-sm">← Back to Dashboard</a>
                </div>
                <div class="card-body">
                    <?php require_once("../../inc/alert.php") ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($message = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($message['name']); ?></td>
                                    <td><?= htmlspecialchars($message['email']); ?></td>
                                    <td><?= htmlspecialchars($message['phone']); ?></td>
                                    <td><?= htmlspecialchars($message['content']); ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" 
                                           href="<?= URL; ?>/admin/action/messages/delete.php?id=<?= $message['id']; ?>">
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
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>
