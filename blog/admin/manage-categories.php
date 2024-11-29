<?php

    include 'partials/header.php';
    $query = "SELECT * FROM categories ORDER BY title";
    $categories = mysqli_query($conn, $query);

?>
    <section class="dashboard">
        <?php if(isset($_SESSION['add-category'])) : ?>
            <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-category'];
                    unset ($_SESSION['add-category']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['add-category-success'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-category-success'];
                    unset ($_SESSION['add-category-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['edit-category-success'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-category-success'];
                    unset ($_SESSION['edit-category-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['edit-category'])) : ?>
            <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-category'];
                    unset ($_SESSION['edit-category']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['delete-category-success'])) : ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['delete-category-success'];
                    unset ($_SESSION['delete-category-success']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <div class="container dashboard-container">
            <button class="sidebar_toggle" id="show_sidebar-btn"><</button>
            <button class="sidebar_toggle" id="hide_sidebar-btn">></button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="pen"><path fill="#FFFFFF" d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z"></path></svg><h5>Add Post</h5></a>                      
                    </li>
                    <li>
                        <a href="<?= ROOT_URL ?>admin/index.php"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="newspaper"><path fill="#FFFFFF" d="M17,11H16a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm0,4H16a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2ZM11,9h6a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2ZM21,3H7A1,1,0,0,0,6,4V7H3A1,1,0,0,0,2,8V18a3,3,0,0,0,3,3H18a4,4,0,0,0,4-4V4A1,1,0,0,0,21,3ZM6,18a1,1,0,0,1-2,0V9H6Zm14-1a2,2,0,0,1-2,2H7.82A3,3,0,0,0,8,18V5H20Zm-9-4h1a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Zm0,4h1a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Z"></path></svg><h5>Manage Posts</h5></a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])) : ?>
                        <li>
                            <a href="add-user.php"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="user-plus"><path fill="#FFFFFF" d="M21,10.5H20v-1a1,1,0,0,0-2,0v1H17a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0v-1h1a1,1,0,0,0,0-2Zm-7.7,1.72A4.92,4.92,0,0,0,15,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,2,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,13.3,12.22ZM10,11.5a3,3,0,1,1,3-3A3,3,0,0,1,10,11.5Z"></path></svg><h5>Add User</h5></a>
                        </li>
                        <li>
                            <a href="manage-users.php"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="users-alt"><path fill="#FFFFFF" d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"></path></svg><h5>Manage User</h5></a>
                        </li>
                        <li>
                            <a href="add-category.php"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="folder-plus"><path fill="#FFFFFF" d="M14,12.5H13v-1a1,1,0,0,0-2,0v1H10a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0v-1h1a1,1,0,0,0,0-2Zm5-7H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z"></path></svg><h5>Add Category</h5></a>
                        </li>
                        <li>
                            <a href="manage-categories.php" class="active"><svg class="icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="books"><path fill="#FFFFFF" d="M22.47,18.82l-1-3.86h0L18.32,3.37a1,1,0,0,0-1.22-.71l-3.87,1a1,1,0,0,0-.73-.33H2.5a1,1,0,0,0-1,1v16a1,1,0,0,0,1,1h10a1,1,0,0,0,1-1v-8l2.2,8.22a1,1,0,0,0,1,.74,1.15,1.15,0,0,0,.26,0l4.83-1.29a1,1,0,0,0,.61-.47A1.05,1.05,0,0,0,22.47,18.82Zm-16,.55h-3v-2h3Zm0-4h-3v-6h3Zm0-8h-3v-2h3Zm5,12h-3v-2h3Zm0-4h-3v-6h3Zm0-8h-3v-2h3Zm2.25-1.74,2.9-.78.52,1.93-2.9.78Zm2.59,9.66-1.55-5.8,2.9-.78,1.55,5.8Zm1,3.86-.52-1.93,2.9-.78.52,1.93Z"></path></svg><h5>Manage Categories</h5></a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Categories</h2>
                <?php if(mysqli_num_rows($categories) >0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                                <tr>
                                    <td><?= $category['title']?></td>
                                    <td><a href="<?= ROOT_URL ?>admin/edit-category.php?ID=<?= $category['ID']?>" class="btn sm">Edit</a></td>
                                    <td><a href="<?= ROOT_URL ?>admin/delete-category.php?ID=<?= $category['ID']?>" class="btn sm danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert_message error">
                        <?= "No categories found."?>
                    </div>
                <?php endif ?>
            </main>
        </div>
    </section>

<?php

    include '../partials/footer.php';

?>