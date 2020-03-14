<?php
    include 'config/connection.php';

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        $getQuery = "SELECT * FROM projects WHERE id = $id";

        if(!mysqli_query($connection, $getQuery)){
            echo 'query problem';
            exit;
        } else {
            $result = mysqli_query($connection, $getQuery);
        };

        $project = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($connection);
    }



?>

<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

    <div class="container center">
        <?php if($project): ?>
            <h4><?php echo htmlspecialchars($project['title']); ?></h4>
            <h5><?php echo htmlspecialchars($project['email']); ?></h5>
            <h5><?php echo date($project['created_at']); ?></h5>
            <p><?php echo htmlspecialchars($project['details']); ?></p>
        <?php else: ?>    
            <p class="red-text">No project here.</p>
        <?php endif; ?>
    </div>

<?php include 'templates/footer.php'; ?>

</html>
