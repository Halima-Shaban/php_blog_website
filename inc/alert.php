                <?php if(isset($_SESSION['success'])): ?>

                            <div class="alert alert-success text-center p-1">
                                <?=  $_SESSION['success'];   ?>
                                <?php unset ($_SESSION['success']);   ?>
                            </div>


                            <?php endif; ?>



                               <?php if(isset($_SESSION['errors'])): ?>

                            <?php foreach($_SESSION['errors'] as $error): ?>

                            <div class="alert alert-danger text-center p-1">
                                <?= $error;   ?>
                            </div>
                            
                            <?php endforeach; ?>
                            
                            <?php unset ($_SESSION['errors']);   ?>

                            <?php endif; ?>