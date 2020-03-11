<?php
    if(isset($_GET['submit'])){
        echo $_GET['email'];
        echo $_GET['title'];
        echo $_GET['details'];
    }
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <section class="container grey-text">
        <h4 class="center">Add project</h4>
        <form method="GET" action="add.php" class="white">
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
