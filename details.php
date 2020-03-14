<?php
    include 'config/connection.php';
    

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        $getQuery = "SELECT * FROM projects WHERE id = $id";

        if(!mysqli_query($connection, $getQuery)){
            echo 'query problem';
            exit;
        } else {
            $selectResult = mysqli_query($connection, $getQuery);
        };

        $project = mysqli_fetch_assoc($selectResult);
        mysqli_free_result($selectResult);
        mysqli_close($connection);
    }

    if(isset($_POST['delID'])){
        $delID = mysqli_real_escape_string($connection, $_POST['delID']);
        $delQuery = "DELETE FROM projects WHERE id = $delID";

        if(mysqli_query($connection, $delQuery)){
            //good
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($connection);
        }

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
            

            <form method="POST" action="details.php">
                <a href="index.php"><input type="button" value="go back" class="btn"></a>
                <input type="hidden" name="delID" value="<?php echo $project['id']; ?>">
                <input type="submit" value="delete" class="btn">
            </form>
            

        <?php else: ?>    
            <p class="red-text">No project here.</p>
        <?php endif; ?>
    </div>

<?php include 'templates/footer.php'; ?>

</html>
