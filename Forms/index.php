<?php
session_start();
require('./process.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Validation</title>
</head>

<body>
    <?php require('./inc/nav.php'); ?>
    <div class="container">
        <h1>Form validation</h1>

        <form action="" method='post' autocomplete="off">
            <div class="input-group">
                <label for="name">Name*</label>
                <input class="<?php echo outputErrorClass($nameErr) ?>" type="text" name="name" id="name" value="<?php echo $name ?>">
                <?php echo showInputError($nameErr) ?>
            </div>
            <div class="input-group">
                <label for="email">Email*</label>
                <input class="<?php echo outputErrorClass($emailErr) ?>" type="text" name="email" id="email" value="<?php echo $email ?>">
                <?php echo showInputError($emailErr) ?>
            </div>
            <div class="input-group">
                <label for="website">Website</label>
                <input class="<?php echo outputErrorClass($websiteErr) ?>" type="text" name="website" id="website" value="<?php echo $website ?>">
                <?php echo showInputError($websiteErr) ?>
            </div>
            <div class="input-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10"><?php echo $comment ?></textarea>
            </div>
            <h4>Gender</h4>
            <div class="input-group radio-input ">
                <label for="female">Female</label>
                <input type="radio" name="gender" <?php echo checkRadio($gender, 'female') ?> id="female" value='female'>
                <label for="male">Male</label>
                <input type="radio" name="gender" <?php echo checkRadio($gender, 'male') ?> id="male" value='male'>
                <label for="other">Other</label>
                <input type="radio" name="gender" <?php echo checkRadio($gender, 'other') ?> id="other" value='other'>
                <?php echo showInputError($genderErr) ?>
            </div>
            <h4>Subscibe</h4>
            <div class="input-group check-input">
                <label for="newsLetter">News Leter</label>
                <input type="checkbox" <?php echo makeCheckBoxChecked($newsLetter) ?> name="newsLetter" id="newsLetter">
                <label for="montUpd">Monthy updates</label>
                <input type="checkbox" <?php echo makeCheckBoxChecked($montUpd) ?> name="montUpd" id="montUpd">
            </div>


            <button type='submit' name='submitted'>Submit</button>

        </form>
    </div>
</body>

</html>