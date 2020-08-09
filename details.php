<?php  

    include('db_connect.php');

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $sql = "DELETE FROM students WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }
        else{
            echo 'Error : ' . mysqli_error($conn);
        }
    }

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // create sql query
        $sql = "SELECT * FROM students WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        //get one student
        $student = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>

        <?php if($student): ?>
            <p><?php echo $student['fullname'] ?></p>
            <p><?php echo $student['course'] ?></p>
            <p><?php echo $student['age'] ?></p>
            <?php foreach(explode(',', $student['subject']) as $subj): ?>
                <ul>
                    <li><?php echo htmlspecialchars($subj); ?></li>
                </ul>
            <?php endforeach; ?>

            <!-- delete form  -->
            <form action="details.php" method="POST">
                <input type="text" name="id" value="<?php echo $student['id'] ?>" />
                <input type="submit" name="delete" value="Delete"/>
            </form>

        <?php else: ?>
            <p>No such student exists!</p>
        <?php endif;?>

    <?php include('footer.php'); ?>

</html>