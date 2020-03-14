<?php

    include 'config/connection.php';
    include 'config/regex.php';
    
    $title = $email = $details = '';
    $errors = [
        'email'=>'',
        'title'=>'',
        'details'=>''
    ];

    if(isset($_POST['submit'])){

        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'email cannot be empty';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be valid';
            }
        }

        // check title
        if(empty($_POST['title'])){
            $errors['title'] = 'title cannot be empty';
        } else {
            $title = $_POST['title'];
            if(!preg_match( REG1, $title )){
                $errors['title'] = 'title must be letters and spaces only';
            }
        }

        // check details
        if(empty($_POST['details'])){
            $errors['details'] = 'details cannot be empty';
        } else {
            $details = $_POST['details'];
        }

        if(array_filter($errors)){
            //echo 'there are error(s) in the form';
        } else {
            //echo 'form is valid';
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $title = mysqli_real_escape_string($connection, $_POST['title']);
            $details = mysqli_real_escape_string($connection, $_POST['details']);

            $postQuery = "INSERT INTO projects(title, details, email) VALUES ('$title', '$details', '$email')";
            if(mysqli_query($connection, $postQuery)){
                header('Location: index.php');
            } else {
                echo 'postQuery error ' . mysqli_error($connection);
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
            <input type="text" name="email" value="<?php echo $email; ?>">
                <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Project title:</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
                <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>Project details:</label>
            <input type="text" name="details" value="<?php echo $details; ?>">
                <div class="red-text"><?php echo $errors['details']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0" />
            </div>
        </form>
    </section>

    <?php include 'templates/footer.php'; ?>
    
</html>
