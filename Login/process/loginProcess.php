<?php
session_start();
require('data.php');
require('helperFn.php');

echo '<pre>';
// print_r($_POST);
echo '</pre>';
$feedback = '';
$errorsArr = [];
$usernameMatch = $passwordMatch = $userReturnedBack = false;

// came back user functionality 
if (isset($_COOKIE['username'])) {
    // issaugom coockie reiksme 
    $cameBackUserName = $_COOKIE['username'];
    // n
    $userReturnedBack = true;
}

$nameOrCookie = '';
// pseudo kodas
// jei prisijungiama atejus i svetaine ir nebuvo paspausta post 
// $nameOrCookie turetu buti paimtas is cookies masyvo

$nameOrCookie = isset($cameBackUserName) ? $cameBackUserName : '';

// jei mes pildem forma tai $nameOrCookie turetu buti $_POST['name']



// forma isiusta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo 'forma issiusta';

    // suzinoti ar kazkas ivesta 
    if (filter_has_var(INPUT_POST, 'logoutBtn')) {
        // we do logout nes buvo paspaustas logout mygtukas 
        // istrinam sesija
        session_destroy();
        //nukreipiam i login psl
        Header("Location: login.php");
    }

    $name = htmlspecialchars($_POST['userName']);
    $password = htmlspecialchars($_POST['password']);

    // Username check ====================================================
    if (!empty($name)) {
        // jei mes pildem forma tai $nameOrCookie turetu buti $_POST['name']
        $nameOrCookie = $name;
        if (compareValues($name, $username1)) {
            $feedback = 'Username match';
            $usernameMatch = true;
        } else {
            $feedback = 'Usernames do not match';
        }
    } else {
        // empty name
        $errorsArr['userName'] = 'Please fill in Username';
    }
    // Password check ====================================================
    if (!empty($password)) {
        // not empty
        if (compareValues($password, $password1)) {
            $feedback .= 'Passwords match';
            $passwordMatch = true;
        } else {
            $feedback .= 'Wrong password';
        }
    } else {
        $errorsArr['password'] = 'Please fill in password';
    }
    // check if pass and username are correct =============================
    if ($passwordMatch && $usernameMatch) {
        $feedback = 'Loggin in progress';
        // jei varnele uzdeta ant remember me
        if (isset($_POST['rememberMe'])) {
            // remenber me varnele uzdeta
            setcookie('username', $name, time() + (86400 * 15));
        }
        // Prisijungusio userio funkcionalumas 
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $name;

        // nukreikpiam vartotoja i home page
        Header('Location: index.php');
    } else {
        $feedback = 'Wrong password or username';
    }
}
