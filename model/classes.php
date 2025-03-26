<?php
require_once('database.php');

// get all class
function get_classes() {
    global $db;
    $query = "SELECT * FROM classes";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
//get class by id
function get_class_id($class_id) {
    global $db;
    $query = "SELECT * FROM classes WHERE ID = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
//get class by name
function get_class_name($class_id) {
    global $db;
    $query = "SELECT Class FROM classes WHERE ID = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result ? $result['Class'] : "Unknown Class";

}
//add class with a name
function add_class($class){
    global $db;
    $query = "INSERT INTO classes (Class) VALUES (:class)";
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}
//delete class by id
function delete_class($class_id){
    global $db;
    $query = "DELETE FROM classes WHERE ID = :class_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

?>