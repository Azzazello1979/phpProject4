<?php
    // connect to DB using mysqli
    $connection = mysqli_connect('localhost', 'project4', '1234', 'project4');

    // check connection
    if(!$connection){
        echo 'connection error' . mysqli_connect_error();
    }

    // step 1 of 3 - write query
    $sql = 'SELECT title, details, id FROM projects ORDER BY created_at';

    // step 2 of 3 - make the query
    $result = mysqli_query($connection, $sql);

    // step 3 of 3 - unpack query & translate it to associative array
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // clear query result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($connection);

    // print_r($projects);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <h4 class="center grey-text">Projects</h4>
    <div class="container">
        <div class="row">
            <?php foreach($projects as $project){ ?>

                <div class="col s6 m4 l3">
                    <div class="card z-depth-0 my-card">
                        <div class="card-content center">
                            <h5><?php echo htmlspecialchars($project['title']); ?></h5>
                            <div><?php echo htmlspecialchars($project['details']); ?></div>
                        </div>
                        <div class="card-action right-align my-card-footer">
                            <a href="#" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>
    
</html>
