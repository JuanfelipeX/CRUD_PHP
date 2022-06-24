<?php
include("/../xampp/htdocs/CRUD_PHP/Models/connection.php");

define('INDEX_PATH', "../");
define('CONTROLLER_PATH', "../CRUD_PHP/Controllers/");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $results = mysqli_query($connection, $query);
    if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_array($results);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        die("Query Failed");
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($connection, $query);

    $_SESSION["message"] = "Task Updated Successfully";
    $_SESSION["message_type"] = "warning";
    header("Location:" . INDEX_PATH . "index.php");
}
?>

<?php include("/../xampp/htdocs/CRUD_PHP/Views/Shared/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <class class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editController.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control"
                            placeholder="Update Title">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" id="description" cols="4" rows="10" class="form-control"
                            placeholder="Update description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn-success" name="update">Update</button>
                </form>
            </div>
        </class>
    </div>
</div>


<?php include("/../xampp/htdocs/CRUD_PHP/Views/Shared/footer.php"); ?>