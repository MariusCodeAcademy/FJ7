<?php
session_start();

function generateFormData()
{

    foreach ($_SESSION['formData'] as $field => $value) {
        if ($field === 'newsLetter') {
            $field = 'Our newsletter';
            $value = ' Subscribed';
        }
        if ($field === 'montUpd') {
            $field = 'Our monthly update';
            $value = ' Subscribed';
        }

        // isjungiam php
?>
        <!-- html -->
        <div class="one-line">
            <p class='form-output-line'><?php echo $field ?>: </p>
            <p class='output-value'> <?php echo $value ?></p>
        </div>
<?php // isijungiam php atgal
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require('./inc/nav.php'); ?>
    <div class="container">
        <h1>Succsess</h1>
        <p>Thank you we have received Your form with following data</p>
        <div class='form-output'>
            <!-- <div class="one-line">
                <p class='form-output-line'>Name: </p>
                <p class='output-value'>Bob</p>
            </div> -->
            <?php generateFormData() ?>

        </div>
    </div>
</body>

</html>