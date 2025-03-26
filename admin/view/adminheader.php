<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos Admin</title>
    <link rel="stylesheet" href="..\view\css\basicformatting.css" type="text/css">
</head>
<body>
    <main>
        <header>
            <h1>Zippy Used Autos</h1>
            <nav>
                <ul>
                    <li class="<?= ($action == 'list_vehicles') ? 'current' : '' ?>"><a href=".?action=list_vehicles">Manage Vehicles</a></li>
                    <li class="<?= ($action == 'list_makes') ? 'current' : '' ?>"><a href=".?action=list_makes">Manage Vehicle Makes</a></li>
                    <li class="<?= ($action == 'list_types') ? 'current' : '' ?>"><a href=".?action=list_types">Manage Vehicle Types</a></li>
                    <li class="<?= ($action == 'list_classes') ? 'current' : '' ?>"><a href=".?action=list_classes">Manage Vehicle Classes</a></li>
                </ul>
            </nav>
        </header>
