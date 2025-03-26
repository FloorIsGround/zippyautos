<?php
require_once('../model/database.php');
require_once('../model/vehicles.php');
require_once('../model/makes.php');
require_once('../model/types.php');
require_once('../model/classes.php');


// Get the course ID from GET parameters.
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT)?: filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);

if (!$vehicle_id) {
    $error = "Invalid Vehicle ID.";
    include('../view/error.php');
    exit();
}

// Retrieve the current course details.
$vehicle = get_vehicle($vehicle_id);
$class_id = $vehicle['class_id'];
$make_id = $vehicle['make_id'];
$type_id = $vehicle['type_id'];

$classes = get_classes();
$makes = get_makes();
$types = get_types();
if (!$vehicle) {
    $error = "Vehicle not found.";
    include('../view/error.php');
    exit();
}
?>

<?php include('view/adminheader.php'); ?>
<h1>Update Vehicle</h1>

<form action="index.php" method="post">
    <!-- Hidden fields to pass the action and course ID -->
    <input type="hidden" name="action" value="update_vehicle">
    <input type="hidden" name="vehicle_id" value="<?= $vehicle['ID'] ?>">
    <div>
        <div>
            <label>Year:</label>
            <input type="text" name="year" maxlength="30" placeholder="<?= $vehicle['year'] ?>" required>
        </div>
        <div>
            <label>Model:</label>
            <input type="text" name="model" maxlength="30" placeholder="<?= $vehicle['model'] ?>" required>
        </div>
        <div>
            <label>Price:</label>
            <input type="text" name="price" maxlength="30" placeholder="<?= $vehicle['price'] ?>" required>
        </div>
        <div>
            <label for="make_id">Make:</label>
            <select name="make_id" id="make_id" required>
                <option value="<?= $vehicle['make'] ?>">Pick a Make</option>
                <?php foreach ($makes as $make) : ?>
                    <option value="<?= $make['ID'] ?>" <?= ($make_id == $make['ID']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($make['Make']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="type_id">Type:</label>
            <select name="type_id" id="type_id" required>
                <option value="0">Pick a Type</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['ID'] ?>" <?= ($type_id == $type['ID']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($type['Type']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id" required>
                <option value="0">Pick a Class</option>
                <?php foreach ($classes as $class) : ?>
                    <option value="<?= $class['ID'] ?>" <?= ($class_id == $class['ID']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($class['Class']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    <button type="submit">Update Vehicle</button>
    </div>
</form>

<p><a href=".?action=list_vehicles">Back to Vehicle Admin</a></p>
<?php include('../view/footer.php'); ?>