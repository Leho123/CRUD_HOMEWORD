<?php
/**
 * Connect to database
 */
function db() {
    $host = 'localhost';
    $database = 'web_a';
    $user = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
}

/**
 * Create new student record
 */
function createStudent($value) {
    $db = db();
    $statement = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)");

    $statement->bindParam(':name', $value['name']);
    $statement->bindParam(':age', $value['age']);
    $statement->bindParam(':email', $value['email']);
    $statement->bindParam(':profile', $value['profile']);

    $statement->execute();

}

/**
 * Get all data from table student
 */
function selectAllStudents() {

    $db = db();
    $posts = $db->query("SELECT * FROM student");
    return $posts;

}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
  $db = db();
  $post = $db->prepare("SELECT * FROM student where id = :id");

  //Gán các biến (lúc này chưa mang giá trị) vào các placeholder theo thứ tự tương ứng
  $post->bindParam(":id", $id);
  $post->execute();
  $post = $post->fetch();
  return $post;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
  $db = db();
  $statement = $db->prepare("DELETE FROM student WHERE id = :id");

  $statement->bindParam(':id', $id);

  $statement->execute();
}


/**
 * Update students
 * 
 */
function updateStudent($value) {
  $db = db();
  $statement = $db->prepare("UPDATE student SET name =:name, age=:age, email=:email, profile=:profile wHERE id =:id ");

  $statement->bindParam(':name', $value['name']);
  $statement->bindParam(':age', $value['age']);
  $statement->bindParam(':email', $value['email']);
  $statement->bindParam(':profile', $value['profile']);
  $statement->bindParam(':id', $value['id']);

  $statement->execute();
}
