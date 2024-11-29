<?php

    include 'partials/header.php';

    if(isset($_GET['ID'])){
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM posts WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        $post = mysqli_fetch_assoc($result);
    }
    else{
        header('Location: '.ROOT_URL. 'blog.php');
        die();
    }

?>

    <section class="singlepost">
        <div class="singlepost_container">
            <h2><?= $post['title'] ?></h2>
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
            <div class="singlepost_thumbnail">
                <img src="./images/<?= $post['thumbnail'] ?>" alt="">
            </div>
            <p><?= $post['body'] ?></p>
        </div>
    </section>

<?php

    include 'partials/footer.php';

?>