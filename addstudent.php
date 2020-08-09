<?php 

    include('db_connect.php');

    $fullname = $subject = $course = $age = '';

    // array error
    $error = array('fullname'=>'', 'subject'=>'', 'course'=>'', 'age'=>'');

    if(isset($_POST['submit'])){

        // check input fields
        if(empty($_POST['fullname'])){
            $error['fullname'] = 'fullname is required';
        }
        else{
            $fullname = $_POST['fullname'];
        }

        if(empty($_POST['subject'])){
            $error['subject'] = 'Subject is required';
        }
        else{
            $subject = $_POST['subject'];
        }

        if(empty($_POST['course'])){
            $error['course'] = 'Course is required';
        }
        else{
            $course = $_POST['course'];
        }

        if(empty($_POST['age'])){
            $error['age'] = 'Age is required';
        }
        else{
            $age = $_POST['age'];
        }

        if(array_filter($error)){
            // error
        }
        else{
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
            $course = mysqli_real_escape_string($conn, $_POST['course']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
    
            $sql = "INSERT INTO students (fullname, subject, course, age) values ('$fullname','$subject','$course','$age')";
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            }
            else{
                echo 'Error : ' . mysqli_error($conn);
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('header.php')?>

        <form action="addstudent.php" method="POST">
            <h2>Form Student</h2>
            <div>
                <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname) ?>"/> <p><?php echo $error['fullname'] ?></p>
            </div>
            <div>
                <input type="text" name="subject" value="<?php echo htmlspecialchars($subject) ?>"/><p><?php echo $error['subject'] ?></p>
            </div>
            <div>
                <input type="text" name="course" value="<?php echo htmlspecialchars($course) ?>"/><p><?php echo $error['course'] ?></p>
            </div>
            <div>
                <input type="number" name="age" value="<?php echo htmlspecialchars($age) ?>"/><p><?php echo $error['age'] ?></p>
            </div>
            <div>
                <input type="submit" name="submit" value="Submit"/>
            </div>
        </form>

        <br>

    <?php include('footer.php')?>

</html>