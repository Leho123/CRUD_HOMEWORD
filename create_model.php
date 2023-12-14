<?php
include 'database/database.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $image = $_POST['image_url'];

    $user = array(
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'profile' => $image
    );

    createStudent($user);

    if (isset($_POST['submit'])){
        header('Location: index.php');
        exit();
    }
}

?>
