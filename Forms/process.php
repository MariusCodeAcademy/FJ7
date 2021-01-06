<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

// nusistatysim formos kintamuosius
$name = $email = $comment = $website = $gender = $newsLetter = $montUpd = '';
$nameErr = $emailErr = $commentErr = $websiteErr = $genderErr = '';

// forma isiusta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // forma buvo issiusta su POST metodu 
    // galima pradeti formos validacija
    // echo "Serverio metodas yra POST";

    // Name validacija =======================================
    if (empty($_POST['name'])) {
        // klaida
        $nameErr = 'Please fill in your Name';
        // return;
    } else {
        // input uzpildytas
        $name = cleanInput($_POST['name']);
        // patikrinti ar iveta reiksme yra tik raides ir tarpai
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Name can only contain letters and spaces";
        }
    }

    // Email validacija =======================================
    if (empty($_POST['email'])) {
        $emailErr = 'Please fill in you email';
    } else {
        $email = cleanInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Please check you email';
        }
    }

    // Website validacija =======================================
    if (empty($_POST['website'])) {
        // $emailErr = 'Please fill in you email';
    } else {
        $website = cleanInput($_POST['website']);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = 'Please check your Website address';
        }
    }

    // Gender validacija =======================================
    if (empty($_POST['gender'])) {
        $genderErr = 'Please select one option';
    } else {
        $gender = cleanInput($_POST['gender']);
    }

    // comment validacija =======================================
    if (empty($_POST['comment'])) {
        // $genderErr = 'Please select one option';
    } else {
        $comment = cleanInput($_POST['comment']);
    }

    // newsLetter validacija =======================================
    if (empty($_POST['newsLetter'])) {
        // $genderErr = 'Please select one option';
    } else {
        $newsLetter = cleanInput($_POST['newsLetter']);
    }

    // montUpd validacija =======================================
    if (empty($_POST['montUpd'])) {
        // $genderErr = 'Please select one option';
    } else {
        $montUpd = cleanInput($_POST['montUpd']);
    }

    // pasitikrinti ar yra klaidu
    // jei nera tada galim nukeripti vartotoja i sekmes psl
    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr)) {
        // klaidu nera
        // echo '<h1>Klaidu nera</h1>';
        Header('Location: success.php');
    }
} // if post end

// helper functions
function cleanInput($inputText)
{
    // pries XSS atack <script>alert('hello')</script>
    $cleanName = htmlspecialchars($inputText);
    // pasalinti tustiems tarpams is abieju pusiu
    $trimmedCleanedText = trim($cleanName);
    return $trimmedCleanedText;
}

function outputErrorClass($errorField)
{
    if ($errorField !== '') {
        return 'error-input';
    }
}

function showInputError($errorField)
{
    if ($errorField !== '') {
        return "<p class='error-alert'>$errorField</p>";
    }
}

function checkRadio($input, $radioFieldValue)
{
    if ($input === $radioFieldValue) {
        return 'checked';
    }
}

function makeCheckBoxChecked($inputVal)
{
    if ($inputVal === 'on') {
        return 'checked';
    }
}
