<?php
require_once('../model/database.php');
require_once('../model/vehicles.php');
require_once('../model/makes.php');
require_once('../model/types.php');
require_once('../model/classes.php');

$GLOBALS['sort_by'] = filter_input(INPUT_POST, 'sort_by', FILTER_UNSAFE_RAW) ?: 'price';

$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);

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
        include('vehicle_list_admin.php');
        break;
    case 'add_vehicle':
        add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
        header("Location: .?action=list_vehicles");
        exit();
        break;
    case 'remove_vehicle':
        delete_vehicle($vehicle_id);
        header("Location: .?action=list_vehicles");
        exit();
        break;
    case 'update_vehicle':
        if ($vehicle_id) {
            update_vehicle($vehicle_id, $year, $model, $price, $type_id, $class_id, $make_id);
            header("Location: .?action=list_vehicles");
            exit();
        } else {
            $error = "Invalid vehicle data. Please check all fields.";
            include("view/error.php");
            exit();
        }
        break;
    case 'list_classes':
        $classes = get_classes();
        include('class_list_admin.php');
        break;
    case 'add_class':
        add_class($class_name);
        header("Location: .?action=list_classes");
        exit();
        break;
    case 'remove_class':
        delete_class($class_id);
        header("Location: .?action=list_classes");
        exit();
        break;
    case 'list_makes':
        $makes = get_makes();
        include('make_list_admin.php');
        break;
    case 'add_make':
        add_make($make_name);
        header("Location: .?action=list_makes");
        exit();
        break;
    case 'remove_make':
        delete_make($make_id);
        header("Location: .?action=list_makes");
        exit();
        break;
    case 'list_types':
        $types = get_types();
        include('type_list_admin.php');
        break;
    case 'add_type':
        add_type($type_name);
        header("Location: .?action=list_types");
        exit();
        break;
    case 'remove_type':
        delete_type($type_id);
        header("Location: .?action=list_types");
        exit();
        break;
    default:
        $vehicles = get_vehicles();
        $classes = get_classes();
        $makes = get_makes();
        $types = get_types();
        include('vehicle_list_admin.php');
}