<?php 

    include('db_connect.php');

    $sql = "SELECT * FROM students";

    $get = mysqli_query($conn, $sql);

    // get all student records 
    $students = mysqli_fetch_all($get, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('header.php')?>

        <?php foreach($students as $student): ?>
            <p><?php echo $student['id'] ?></p>
            <p><?php echo $student['fullname'] ?></p>
            <p><?php echo $student['course'] ?></p>
            <p><?php echo $student['age'] ?></p>
            <?php foreach(explode(',', $student['subject']) as $subj): ?>
                <ul>
                    <li><?php echo $subj ?></li>
                </ul>
            <?php endforeach; ?>
            <a href="details.php?id=<?php echo $student['id']?>">more info</a>
        <?php endforeach; ?>

    <?php include('footer.php')?>

</html>