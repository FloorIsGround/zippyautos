<?php 
require_once('database.php');

// get all makes
function get_makes() {
    global $db;
    $query = "SELECT * FROM makes";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
//get make by id
function get_make($make_id) {
    global $db;
    $query = "SELECT * FROM makes WHERE ID = :make_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
//get make by name
function get_make_name($make_id) {
    global $db;
    $query = "SELECT Make FROM makes WHERE ID = :make_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result ? $result['Make'] : "Unknown Make";

}
//add make with a name
function add_make($make){
    global $db;
    $query = "INSERT INTO makes (Make) VALUES (:make)";
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}
//delete make by id
function delete_make($make_id){
    global $db;
    $query = "DELETE FROM makes WHERE ID = :make_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

?>