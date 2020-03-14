<?php
    include 'config/connection.php';

    // step 1 of 5 - write query
    $sql = 'SELECT title, details, id FROM projects ORDER BY created_at';

    // step 2 of 5 - make the query
    $result = mysqli_query($connection, $sql);

    // step 3 of 5 - unpack query & translate it to associative array
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // step 4 of 5 clear query result from memory
    mysqli_free_result($result);

    // step 5 of 5 close connection
    mysqli_close($connection);

    // print_r($projects);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <h4 class="center grey-text">Projects</h4>
    <div class="container">
        <div class="row">
            <?php foreach($projects as $project): ?>

                <div class="col s6 m4 l3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h5><?php echo htmlspecialchars($project['title']); ?></h5>
                            <div><?php echo htmlspecialchars($project['details']); ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $project['id']; ?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <?php include 'templates/footer.php'; ?>
    
</html>
