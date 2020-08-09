<?php 

    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }

    $name = $_SESSION['name'] ?? 'GUEST'



?>

<head>
    <title>School Records</title>
</head>
<body>
    <nav>
        <a href="index.php"><h2>AICS</h2></a>
        <ul>
            <li>Hello <?php echo htmlspecialchars($name) ?></li>
            <li>
                <a href="addstudent.php">Add Student</a>
            </li>
        </ul>
    </nav>