<?php
include("../CRUD_PHP/Models/connection.php");
include("../CRUD_PHP/Views/shared/header.php");

define('CONTROLLER_PATH', "../CRUD_PHP/Controllers/");
?>


<div class="container p-4 ">
    <div class="row">
        <div class="col">
            <!-- INPUT SECTION -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
                            <strong><?= $_SESSION['message'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php session_unset();
                        } ?>
                        <div class="card card-body">
                            <form action="<?php echo CONTROLLER_PATH; ?>taskController.php" method="POST">
                                <div class="mb-3">
                                    <label for="title-input" class="form-label">Task Title</label>
                                    <input type="text" class="form-control" id="title-input" name="title-input"
                                        aria-describedby="title-input" placeholder="Task Title" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="description-input" class="form-label">Task Description</label>
                                    <textarea name="description-input" class="form-control" id="description-input"
                                        name="description-input" rows="4" aria-describedby="description-input"
                                        placeholder="Task Description"></textarea>
                                </div>
                                <input type="submit" class="btn btn-success btn-block" name="save-task"
                                    value="Save Task">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <!-- TABLE SECTION -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $results_tasks = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($results_tasks)) { ?>
                    <tr>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['created_at'] ?></td>
                        <td>
                            <a href="../CRUD_PHP/Views/Pages/edit.php?id=<?php echo $row['id'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../CRUD_PHP/Views/Pages/delete-task.php?id=<?php echo $row['id'] ?>"><i
                                    class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include("../CRUD_PHP/Views/shared/footer.php");
?>