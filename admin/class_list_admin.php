<?php include("view/adminheader.php") ?>
<section>
    <h2>Vehicles Admin</h2>
    <div>
        <h3>Vehicle Class List</h3>
    </div>
    <div>
    <?php if (!empty($classes)) : ?>
        <?php foreach ($classes as $class) : ?>
            <div>
                <p><strong><?= htmlspecialchars($class['Class']) ?></strong></p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="remove_class">
                    <input type="hidden" name="class_id" value="<?=$class['ID']?>">
                    <button onclick="return confirm('Are you sure you want to delete this vehicle class?')">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No vehicles exist.</p>
    <?php endif; ?>
</section>
<section>
    <h2>Add Vehicle Class</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_class">
        <div>
            <label>Class Name:</label>
            <input type="text" name="class_name" maxlength="30" placeholder="Class" required>
        </div>
        <div>
            <button class="add-button bold">Add</button>
        </div>
    </form>
 </section>

<?php include("../view/footer.php") ?>
