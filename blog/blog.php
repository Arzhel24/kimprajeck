<?php

    include 'partials/header.php';

    // Define the number of posts per page
    $posts_per_page = 9;

    // Get the current page number from the URL, default to 1 if not set
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculate the OFFSET for the SQL query
    $offset = ($current_page - 1) * $posts_per_page;

    // Get the total number of posts
    $total_posts_query = "SELECT COUNT(*) FROM posts";
    $total_posts_result = mysqli_query($conn, $total_posts_query);
    $total_posts = mysqli_fetch_row($total_posts_result)[0];

    // Calculate the total number of pages
    $total_pages = ceil($total_posts / $posts_per_page);

    // Get the posts for the current page
    $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT $posts_per_page OFFSET $offset";
    $posts = mysqli_query($conn, $query);

?>

<section class="search_bar">
    <form class="container search_bar-container" action="<?= ROOT_URL ?>search.php" method="get">
        <div class="search">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="search-alt">
                <path fill="#FFFFFF" d="M21.07,16.83,19,14.71a3.08,3.08,0,0,0-3.4-.57l-.9-.9a7,7,0,1,0-1.41,1.41l.89.89A3,3,0,0,0,14.71,19l2.12,2.12a3,3,0,0,0,4.24,0A3,3,0,0,0,21.07,16.83Zm-8.48-4.24a5,5,0,1,1,0-7.08A5,5,0,0,1,12.59,12.59Zm7.07,7.07a1,1,0,0,1-1.42,0l-2.12-2.12a1,1,0,0,1,0-1.42,1,1,0,0,1,1.42,0l2.12,2.12A1,1,0,0,1,19.66,19.66Z"></path>
              </svg>
            </div>
            <input type="search" name="search" id="" placeholder="Search">
        </div>
        <button type="submit" name="submit" class="btn">Go</button>
    </form>
</section>

<section class="posts <?= $featured ? '' : 'section_extra-margin' ?>">
    <div class="container posts_container">
        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post_thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>" alt="">
                </div>
                <div class="post_info">
                    <?php
                        $category_id = $post['category_id'];
                        $category_query = "SELECT * FROM categories WHERE ID=$category_id";
                        $category_result = mysqli_query($conn, $category_query);
                        $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?ID=<?= $category['ID'] ?>" class="category_button"><?= $category['title'] ?></a>
                    <h3 class="post_title"><a href="<?= ROOT_URL ?>post.php?ID=<?= $post['ID'] ?>"><?= $post['title'] ?></a></h3>
                    <p class="post_body"><?= substr($post['body'], 0, 50) ?>...</p>
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

<!-- Pagination Section -->
<section class="pagination">
    <div class="container">
        <div class="pagination_links">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?= $current_page - 1 ?>" class="prev_page">Previous</a>
            <?php endif; ?>

            <?php
                // Display page numbers with an offset around the current page
                $start_page = max(1, $current_page - 5); // Start 5 pages before current
                $end_page = min($total_pages, $current_page + 5); // End 5 pages after current

                for ($page = $start_page; $page <= $end_page; $page++) :
                    if ($page == $current_page) :
            ?>
                        <span class="current_page"><?= $page ?></span>
            <?php
                    else :
            ?>
                        <a href="?page=<?= $page ?>" class="page_number"><?= $page ?></a>
            <?php
                    endif;
                endfor;
            ?>

            <?php if ($current_page < $total_pages): ?>
                <a href="?page=<?= $current_page + 1 ?>" class="next_page">Next</a>
            <?php endif; ?>
        </div>
    </div>
</section>

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
