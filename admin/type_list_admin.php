<?php include("view/adminheader.php") ?>
<section>
    <h2>Vehicles Admin</h2>
    <div>
        <h3>Vehicle Type List</h3>
    </div>
    <div>
    <?php if (!empty($types)) : ?>
        <?php foreach ($types as $type) : ?>
            <div>
                <p><strong><?= htmlspecialchars($type['Type']) ?></strong></p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="remove_type">
                    <input type="hidden" name="type_id" value="<?=$type['ID']?>">
                    <button onclick="return confirm('Are you sure you want to delete this vehicle make?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No vehicles exist.</p>
    <?php endif; ?>
</section>
<section>
    <h2>Add Vehicle Type</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_type">
        <div>
            <label>Type Name:</label>
            <input type="text" name="type_name" maxlength="30" placeholder="Type" required>
        </div>
        <div>
            <button class="add-button bold">Add</button>
        </div>
    </form>
 </section>

<?php include("../view/footer.php") ?>
