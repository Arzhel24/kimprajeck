<?php

    include 'partials/header.php';

    if(isset($_GET['ID']))
    {
        $ID = filter_var($_GET['ID'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM users WHERE ID=$ID";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
    }
    else{
        header('Location: ' .ROOT_URL . 'admin/manage-users.php');
    }

?>
    
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit User</h2>
            <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="post">
                <input type="hidden" value="<?= $user['ID'] ?>" name="ID">
                <input type="text" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First Name">
                <input type="text" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last Name">
                <select name="userrole" id="">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <button type="submit" name="submit" class="btn">Update User</button>
            </form>
        </div>
    </section>

<?php

    include '../partials/footer.php';

?>