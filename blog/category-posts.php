<?php

    include 'partials/header.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE category_id=$ID ORDER BY date_time DESC";
        $posts = mysqli_query($conn, $query);
    }
    else{
        header('Location: '.ROOT_URL. 'blog.php');
        die();
    }

?>
    
    <header class="category_title">
        <h2>
            <?php
                $category_id = $ID;
                $category_query = "SELECT * FROM categories WHERE ID=$ID";
                $category_result = mysqli_query($conn, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                echo $category['title'];
            ?>
        </h2>
    </header>

    <?php if(mysqli_num_rows($posts) > 0) : ?>
        <section class="posts">
            <div class="container posts_container">
                <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                    <article class="post">
                        <div class="post_thumbnail">
                            <img src="./images/<?= $post['thumbnail'] ?>" alt="">
                        </div>
                        <div class="post_info">
                            <h3 class="post_title"><a href="<?= ROOT_URL ?>post.php?ID=<?= $post['ID'] ?>"><?= $post['title'] ?></a></h3>
                            <p class="post_body"><?= substr($post['body'], 0, 150) ?>...</p>
                            <div class="post_author">
                                <?php 
                                    $author_id = $post['author_id'];
                                    $author_query = "SELECT * FROM users WHERE ID=$author_id";
                                    $author_result = mysqli_query($conn, $author_query);
                                    $author = mysqli_fetch_assoc($author_result);
                                ?>
                                <div class="post_author-avatar">
                                    <img src="./images/<?= $author['avatar'] ?>" alt="">
                                </div>
                                <div class="post_author-info">
                                    <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                                    <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile ?>
            </div>
        </section>
    <?php else : ?>
        <div class="alert_message error lg">
            <p>No posts found for this category.</p>
        </div>
    <?php endif ?>

    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($conn, $all_categories_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
                <a href="<?= ROOT_URL ?>category-posts.php?ID=<?= $category['ID'] ?>" class="category_button"><?= $category['title'] ?></a>
            <?php endwhile ?>
        </div>
    </section>

<?php

    include 'partials/footer.php';

?>