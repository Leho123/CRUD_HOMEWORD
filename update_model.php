<?php
include 'database/database.php';

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$image_url = $_POST['image_url'];
$id = $_POST['id'];

$value = array(
    'name' => $name,
    'age' => $age,
    'email' => $email,
    'profile' => $image_url,
    'id' => $id
);

updateStudent($value);
header('Location: index.php');

if (isset($_POST['submit'])){
    exit();
}