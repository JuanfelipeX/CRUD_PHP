<?php
include("/../xampp/htdocs/CRUD_PHP/Models/connection.php");

define('INDEX_PATH', "../../");
define('CONTROLLER_PATH', "../CRUD_PHP/Controllers/");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $results = mysqli_query($connection, $query);
    if ($results) {
        $_SESSION["message"] = "Task Removed Successfully";
        $_SESSION["message_type"] = "danger";
        header("Location:" . INDEX_PATH . "index.php");
    } else {
        die("Query Failed");
    }
}
?>