<?php

    include 'partials/header.php';

    $category_query = "SELECT * FROM categories";
    $categories = mysqli_query($conn, $category_query);

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE ID=$ID";
        $result = mysqli_query($conn, $query);

        $post = mysqli_fetch_assoc($result);
    }
    else{
        header('Location: '.ROOT_URL.'admin/');
        die();
    }

    // $title = $_SESSION['add-post-data']['title'] ?? null;
    // $body = $_SESSION['add-post-data']['body'] ?? null;

    // unset($_SESSION['add-post-data']);

?>
    
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Post</h2>
            <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="ID" value="<?= $post['ID'] ?>">
                <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
                <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
                <select name="category" id="">
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category['ID'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea name="body" id="" rows="10" placeholder="Body"><?= $post['body'] ?></textarea>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                    <div class="form_control inline">
                        <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                        <label for="is_featured">Featured</label>
                    </div>
                <?php endif ?>
                <div class="form_control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Update Post</button>
            </form>
        </div>
    </section>

<?php

    include '../partials/footer.php';

?>