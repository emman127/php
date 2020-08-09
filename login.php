<?php 

    if(isset($_POST['submit'])){
        session_start();

        $_SESSION['name'] = $_POST['email'];

        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>

        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Enter email"/>
            <input type="password" name="password" placeholder="Enter password"/>
            <input type="submit" name="submit" value="Login"/>
        </form>

    <?php include('footer.php'); ?>

</html>