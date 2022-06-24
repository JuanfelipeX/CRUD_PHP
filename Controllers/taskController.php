<?php
include("/../xampp/htdocs/CRUD_PHP/Models/connection.php");
define('CONTROLLER_PATH', "../CRUD_PHP/Controllers/");
define('INDEX_PATH', "../");

if(isset($_POST["save-task"])){
    $title = $_POST["title-input"];
    $description = $_POST["description-input"];

    $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location:" . INDEX_PATH . "index.php");
        $_SESSION['message'] = 'Task Saved Succesfully';
        $_SESSION['message_type'] = 'success';
        
    } else {
        $_SESSION['error_message'] = 'check the data';
        die("Query Failed");
    }
}
?>