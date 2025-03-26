<?php
require_once('database.php');

// get all types
function get_types() {
    global $db;
    $query = "SELECT * FROM types";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
//get type by id
function get_type($type_id) {
    global $db;
    $query = "SELECT * FROM types WHERE ID = :type_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
//get type by name
function get_type_name($type_id) {
    global $db;
    $query = "SELECT Type FROM types WHERE ID = :type_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result ? $result['Type'] : "Unknown Type";

}
//add type with a name
function add_type($type){
    global $db;
    $query = "INSERT INTO types (Type) VALUES (:type)";
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}
//delete type by id
function delete_type($type_id){
    global $db;
    $query = "DELETE FROM types WHERE ID = :type_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

?>