<?php

    include 'partials/header.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM categories WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 1){
            $category = mysqli_fetch_assoc($result);
        }
    }
    else{
        header('Location: ' .ROOT_URL . 'admin/manage-categories.php');
        die();
    }
?>
    
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Category</h2>
            <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="post">
                <input type="hidden" name="ID" value="<?= $category['ID'] ?>">
                <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
                <textarea name="description" rows="4" placeholder="Description"><?= $category['description'] ?></textarea>
                <button type="submit" name="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>

<?php

    include '../partials/footer.php';

?>