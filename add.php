<?php

    /* if(isset($_GET['submit'])){
        echo $_GET['email'];
        echo $_GET['title'];
        echo $_GET['details'];
    } */

    if(isset($_POST['submit'])){
        /* echo htmlspecialchars($_POST['email']);
        echo htmlspecialchars($_POST['title']);
        echo htmlspecialchars($_POST['details']); */

        // check email
        if(empty($_POST['email'])){
            echo 'email is required <br />' ;
        } else {
            echo htmlspecialchars($_POST['email']);
        }

        // check title
        if(empty($_POST['title'])){
            echo 'title is required <br />' ;
        } else {
            echo htmlspecialchars($_POST['title']);
        }

        // check details
        if(empty($_POST['details'])){
            echo 'details is required <br />' ;
        } else {
            echo htmlspecialchars($_POST['details']);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <section class="container grey-text">
        <h4 class="center">Add project</h4>
        <form method="POST" action="add.php" class="white">
            <label>Your email:</label>
            <input type="text" name="email">
            <label>Project title:</label>
            <input type="text" name="title">
            <label>Project details:</label>
            <input type="text" name="details">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0" />
            </div>
        </form>
    </section>

    <?php include 'templates/footer.php'; ?>
    
</html>
