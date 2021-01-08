<?php
// helper functions 
function feedbackElement()
{
    global $feedback;
    if ($feedback !== '') {
        return "<p class=\"feedback\"> $feedback </p>";
    }
}

function compareValues($val1, $val2)
{
    if ($val1 === $val2) {
        return true;
    }
}

function printReturnUser()
{
    // jei foma issiusta mes nerodom welcome back 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return;
    }

    global $cameBackUserName;
    global $userReturnedBack;
    if ($userReturnedBack) {
        echo "<p class=\"welcome\">Welcome back $cameBackUserName</p>";
    }
}


function emailFilter()
{
    global $feedback;
    // if username has to be email we could
    if (filter_input(INPUT_POST, 'userName', FILTER_VALIDATE_EMAIL)) {
        $feedback .= 'Email valid ';
    } else {
        $feedback .= 'Email invalid ';
    }
}

function printLoginOrLogout()
{
    if (!isset($_SESSION['loggedIn'])) : ?>
        <a href="login.php" class="nav-link">Login</a>
    <?php else : ?>
        <form class='logout-form' action="login.php" method="post">
            <button class='nav-link' type='submit' name="logoutBtn">Logout</button>
        </form>
<?php endif;
}

function ifUserIsLoggedIn()
{
    if (isset($_SESSION['loggedIn'])) {
        return true;
    }
}
