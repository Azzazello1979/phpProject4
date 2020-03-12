<?php
    // connect to DB using mysqli
    $connection = mysqli_connect('localhost', 'project4', '1234', 'project4');

    // check connection
    if(!$connection){
        echo 'connection error' . mysqli_connect_error();
    }
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>
    <?php include 'templates/footer.php'; ?>
    
</html>
