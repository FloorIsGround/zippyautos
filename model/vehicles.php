<?php
require_once('database.php');

// --- Main Vehicle Functions ---


// Gets all vehicles sorted by price in descending order.
function get_vehicles() {
    global $db;
    global $sort_by;
    $query = "SELECT vehicles.ID, vehicles.model, vehicles.year, vehicles.price, types.Type, classes.Class, makes.Make  FROM vehicles
    INNER JOIN types ON vehicles.type_id = types.ID
    INNER JOIN classes ON vehicles.class_id = classes.ID
    INNER JOIN makes ON vehicles.make_id = makes.ID
    ORDER BY vehicles." . $sort_by . " DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


//vehicles by class
function get_vehicles_by_class($class_id) {
    if(!$class_id){
        return;
    }
    global $db;
    global $sort_by;
    $query = "SELECT vehicles.ID, vehicles.model, vehicles.year, vehicles.price, types.Type, classes.Class, makes.Make FROM vehicles
    INNER JOIN types ON vehicles.type_id = types.ID
    INNER JOIN classes ON vehicles.class_id = classes.ID
    INNER JOIN makes ON vehicles.make_id = makes.ID
    WHERE class_id = :class_id
    ORDER BY vehicles." . $sort_by . " DESC";
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

//vehicles by make
function get_vehicles_by_make($make_id) {
    if(!$make_id){
        return;
    }
    global $db;
    global $sort_by;
    $query = "SELECT vehicles.ID, vehicles.model, vehicles.year, vehicles.price, types.Type, classes.Class, makes.Make FROM vehicles
    INNER JOIN types ON vehicles.type_id = types.ID
    INNER JOIN classes ON vehicles.class_id = classes.ID
    INNER JOIN makes ON vehicles.make_id = makes.ID
    WHERE make_id = :make_id
    ORDER BY vehicles." . $sort_by . " DESC";
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

//vehicles by type
function get_vehicles_by_type($type_id) {
    if(!$type_id){
        return;
    }
    global $db;
    global $sort_by;
    $query = "SELECT vehicles.ID, vehicles.model, vehicles.year, vehicles.price, types.Type, classes.Class, makes.Make FROM vehicles
    INNER JOIN types ON vehicles.type_id = types.ID
    INNER JOIN classes ON vehicles.class_id = classes.ID
    INNER JOIN makes ON vehicles.make_id = makes.ID
    WHERE type_id = :type_id
    ORDER BY vehicles." . $sort_by . " DESC";
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($vehicle_id){
    global $db;
    $query = 'SELECT * FROM vehicles WHERE ID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}

// Adds a new vehicle
function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) 
    VALUES (:year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

// Deletes a vehicle from the database.
function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE ID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

// Updates an existing vehicle in the database.

function update_vehicle($vehicle_id, $year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $query = 'UPDATE vehicles 
              SET year = :year, price = :price, model = :model ,type_id = :type_id, class_id = :class_id, make_id = :make_id
              WHERE ID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
