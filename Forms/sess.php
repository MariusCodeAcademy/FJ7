<?php
// pradedam sesija 
session_start();
// $_SESSION
$name = '';
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $name = $_SESSION['username'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require('./inc/nav.php'); ?>
    <h1>Session <?php echo $name; ?> </h1>
    <pre>
    <?php
    print_r($_SESSION);


    // $_SESSION['loggedIn'] = true;
    // $_SESSION['username'] = 'Bob';

    // uzbaigti sesisja 
    // session_destroy();

    ?>
    </pre>

</body>

</html>