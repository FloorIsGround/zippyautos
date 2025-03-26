<?php
require_once('model/database.php');
require_once('model/vehicles.php');
require_once('model/makes.php');
require_once('model/types.php');
require_once('model/classes.php');

$GLOBALS['sort_by'] = filter_input(INPUT_POST, 'sort_by', FILTER_UNSAFE_RAW) ?: 'price';

$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_vehicles';

switch ($action) {
    case 'list_vehicles':
        $vehicles = get_vehicles();
        $classes = get_classes();
        if($class_id != 0){
            $vehicles = get_vehicles_by_class($class_id);
        }
        $makes = get_makes();
        if($make_id != 0){
            $vehicles = get_vehicles_by_make($make_id);
        }
        $types = get_types();
        if($type_id != 0){
            $vehicles = get_vehicles_by_type($type_id);
        }
        include('view/vehicles_list.php');
        break;
    default:
        $vehicles = get_vehicles();
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        include('view/vehicles_list.php');
}