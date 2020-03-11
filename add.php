<?php

    if(isset($_POST['submit'])){

        // check email
        if(empty($_POST['email'])){
            echo 'email is required <br />' ;
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'email must be valid';
            }
        }

        // check title
        if(empty($_POST['title'])){
            echo 'title is required <br />' ;
        } else {
            $title = $_POST['title'];
            if(!preg_match( '/^[a-zA-Z\s]+$/', $title )){
                echo 'title must be letters and spaces only';
            }
        }

        // check details
        if(empty($_POST['details'])){
            echo 'details is required <br />' ;
        } else {
            if(!preg_match( '/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $details )){
                echo 'details must be letters and spaces only';
            }
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
