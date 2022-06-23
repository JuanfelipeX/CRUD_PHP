<?php
include("../CRUD_PHP/Models/connection.php");
include("../CRUD_PHP/Views/shared/header.php");

define('CONTROLLER_PATH', "../CRUD_PHP/Controllers/");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
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
                    <input type="submit" class="btn btn-success btn-block" name="save-task" value="Save Task">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("../CRUD_PHP/Views/shared/footer.php");
?>