<?php
require('./process/loginProcess.php');
require('./inc/head.php');
require('./inc/nav.php');

echo feedbackElement();
?>

<div class="container">
    <h1>Login</h1>
    <?php printReturnUser() ?>
    <form action="" method="post" autocomplete="off">
        <div class="input-group">
            <label for="userName">Name</label>
            <input class="" type="text" name="userName" id="userName" value="<?php echo $nameOrCookie ?>">
            <small class='error-alert'><?php echo isset($errorsArr['userName']) ? $errorsArr['userName'] : '' ?></small>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input class="" type="text" name="password" id="password" value="<?php echo isset($name) ? $password : '' ?>">
            <small class='error-alert'><?php echo isset($errorsArr['password']) ? $errorsArr['password'] : '' ?></small>
        </div>
        <div class="input-group">
            <label for="rememberMe">Remember Me</label>
            <input class="" type="checkbox" name="rememberMe" id="rememberMe">
        </div>
        <button type='submit'>Login</button>
    </form>
</div>

<?php
require('./inc/footer.php');
?>