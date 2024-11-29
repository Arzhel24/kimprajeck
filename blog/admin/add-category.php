<?php

    include 'partials/header.php';

    $title = $_SESSION['add-category-data']['title'] ?? null;
    $description = $_SESSION['add-category-data']['description'] ?? null;

    unset($_SESSION['add-category-data']);
?>
    
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
            <?php if(isset($_SESSION['add-category'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add-category'];
                        unset ($_SESSION['add-category']);
                        ?>
                    </p>
                </div>
                <?php endif ?>
            <form action="<?= ROOT_URL?>admin/add-category-logic.php" method="post">
                <input type="text" value="<?= $title ?>" name="title" placeholder="Title">
                <textarea value="<?= $description ?>" name="description" id="" rows="4" placeholder="Description"></textarea>
                <button type="submit" name="submit" class="btn">Add Category</button>
            </form>
        </div>
    </section>

<?php

    include '../partials/footer.php';

?>