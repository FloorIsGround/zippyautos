<?php include("view/adminheader.php") ?>
<section>
    <h2>Vehicles Admin</h2>
    <div>
        <h3>Vehicle Make List</h3>
    </div>
    <div>
    <?php if (!empty($makes)) : ?>
        <?php foreach ($makes as $make) : ?>
            <div>
                <p><strong><?= htmlspecialchars($make['Make']) ?></strong></p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="remove_make">
                    <input type="hidden" name="make_id" value="<?=$make['ID']?>">
                    <button onclick="return confirm('Are you sure you want to delete this vehicle make?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No vehicles exist.</p>
    <?php endif; ?>
</section>
<section>
    <h2>Add Vehicle Make</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_make">
        <div>
            <label>Make Name:</label>
            <input type="text" name="make_name" maxlength="30" placeholder="Make" required>
        </div>
        <div>
            <button class="add-button bold">Add</button>
        </div>
    </form>
 </section>

<?php include("../view/footer.php") ?>
