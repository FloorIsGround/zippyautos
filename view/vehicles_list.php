<?php include("header.php") ?>
<section>
    <h2>Vehicles</h2>
    <div>
    <form action="." method="get">
        <input type="hidden" name="action" value="list_vehicles">
        <label for="make_id">Make:</label>
        <select name="make_id" id="make_id">
            <option value="0">View All</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['ID'] ?>">
                    <?= htmlspecialchars($make['Make']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="type_id">Type:</label>
        <select name="type_id" id="type_id">
            <option value="0">View All</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['ID'] ?>" <?= ($type_id == $type['ID']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($type['Type']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="class_id">Class:</label>
        <select name="class_id" id="class_id">
            <option value="0">View All</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['ID'] ?>" <?= ($class_id == $class['ID']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['Class']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Go</button>
    </form>
    </div>
    <div>
    <form method="post">
            <input type="hidden" name="action" value="list_vehicles">
            <h3>Listings currently sorted by: 
                <button type="submit" name="sort_by" value="price" class="<?= ($GLOBALS['sort_by'] == 'price') ? 'active-sort' : '' ?>">Price</button>
                <button type="submit" name="sort_by" value="year" class="<?= ($GLOBALS['sort_by'] == 'year') ? 'active-sort' : '' ?>">Year</button>
            </h3>
        </form>
    </div>
    <?php if (!empty($vehicles)) : ?>
        <?php foreach ($vehicles as $vehicle) : ?>
            <div>
                <p><strong><?= htmlspecialchars($vehicle['year']) ?> <?= htmlspecialchars($vehicle['Make']) ?> <?= htmlspecialchars($vehicle['model']) ?></strong></p>
                <p>Type: <?= htmlspecialchars($vehicle['Type']) ?></p>
                <p>Class: <?= htmlspecialchars($vehicle['Class']) ?></p>
                <p>Price: $<?= number_format($vehicle['price'], 2) ?></p>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No vehicles exist.</p>
    <?php endif; ?>
</section>
<?php include("footer.php") ?>
