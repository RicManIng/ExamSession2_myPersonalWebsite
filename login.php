<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/login.min.css">
</head>
<body>
    <?php
        require_once('_user.php');
        require_once('common.php');
        require_once('header.php');

        $error_message = null;
        $user_saved = false;
        $user_loaded = false;

        if(!empty($_POST)){
            if($_GET['state'] == 'signup'){

                $valid_conditions = true;

                if(!(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']))){
                    $valid_conditions = false;
                    $error_message = 'Error: check there is no empty field';
                } elseif ($_POST['password'] != $_POST['confirm_password']){
                    $valid_conditions = false;
                    $error_message = 'Error: password and confirm password are different';
                } elseif ($user->username_exists($_POST['username'], $file_user)){
                    $valid_conditions = false;
                    $error_message = 'Error: username already exists';
                } elseif (!$user->set_username($_POST['username'])){
                    $valid_conditions = false;
                    $error_message = 'Error: invalid username format';
                } elseif (!$user->set_password($_POST['password'])){
                    $valid_conditions = false;
                    $error_message = 'Error: invalid password format';
                } elseif(!$user->set_birthDate($_POST['day'], $_POST['month'], $_POST['year'])){
                    $error_message = 'Error: invalid birth date format';
                } elseif($user->email_exists($_POST['email'], $file_user)){
                    $valid_conditions = false;
                    $error_message = 'Error: email already exists';
                } elseif(!$user->set_email($_POST['email'])){
                    $valid_conditions = false;
                    $error_message = 'Error: invalid email format';
                } elseif(!$user->set_name($_POST['name'])){
                    $valid_conditions = false;
                    $error_message = 'Error: invalid name format';
                } elseif(!$user->set_surname($_POST['surname'])){
                    $valid_conditions = false;
                    $error_message = 'Error: invalid surname format';
                } else {
                    $user->user_save($file_user);
                    $user_saved = true;
                }
            }

            elseif($_GET['state'] == 'login'){
                $valid_conditions = true;
                if(!(isset($_POST['username']) && isset($_POST['password']))){
                    $valid_conditions = false;
                    $error_message = 'Error: check there is no empty field';
                } elseif (!$user->username_exists($_POST['username'], $file_user)){
                    $valid_conditions = false;
                    $error_message = 'Error: username not found';
                } elseif (!$user->check_login($_POST['username'], $_POST['password'], $file_user)) {
                    $valid_conditions = false;
                    $error_message = 'Error: incorrect password';
                }

                if ($valid_conditions){
                    $UserLogged = true;
                    $user_loaded = true;
                }
            }
        }
            
    ?>
    <main>
        <?php if($_GET['state'] == 'logout') : ?>
            <div class='container'>
                <h1>Log Out avvenuto con successo!</h1>
                <p>Torna alla home oppure accedi con un altro utente</p>
                <?php
                    /* session_start(); */
                    $_SESSION = array();
                    session_destroy();
                ?>
                <a href="what_about?state=1.php">Torna alla home</a>
                <a href="login.php?state=login" class='access'>Accedi</a>
            </div>
        <?php elseif($UserLogged && !$user_loaded && !$user_saved ) : ?>
            <div class='container'>
                <h1>User already logged!</h1>
                <p>Go to the top right button to Logout and Login with another account</p>
            </div>
        <?php elseif($user_saved) : ?>
            <div class='container'>
                <h1>Registrazione avvenuta con successo!</h1>
                <p>Effettua il Log In per accedere al tuo account</p>
                <a href="login.php?state=login">Accedi</a>
            </div>
        <?php elseif($user_loaded) : ?>
            <div class='container'>
                <h1>Log In avvenuto con successo!</h1>
                <p>Benvenuto <?php echo $user->get_name(); ?></p>
                <a href="what_about.php?selected=1">Torna alla home</a>
            </div>
        <?php else: ?>
            <?php if($_GET['state'] == 'signup') : ?>
                <form action="" method="POST" class='container' novalidate>
                    <h1>Registration</h1>
                    <label for="name">Name * :</label>
                    <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ??  ''; ?>" required placeholder="insert your name">
                    <label for="surname">Surname * :</label>
                    <input type="text" name="surname" id="surname" value="<?php echo $_POST['surname'] ??  ''; ?>" required placeholder="insert your surname">
                    <label for="username">Username * : </label>
                    <input type="text" name="username" id="username" value="<?php echo $_POST['username'] ??  ''; ?>" required placeholder="insert your username">
                    <label for="email">Email * :</label>
                    <input type="email" name="email" id="email" value="<?php echo $_POST['email'] ??  ''; ?>" required placeholder="insert your email">
                    <label for="password">Password * :</label>
                    <input type="password" name="password" id="password" required placeholder="insert your password">
                    <label for="confirm_password">Confirm Password * :</label>
                    <input type="password" name="confirm_password" id="confirm_password" required placeholder="confirm your password">
                    <label for="date">Birth date : </label>
                    <div>
                        <select name="day" id="date_day">
                            <option value="0">Day</option>
                            <?php for($i = 1; $i <= 31; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="month" id="date_month">
                            <option value="0">Month</option>
                            <?php for($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="year" id="date_year">
                            <option value="0">Year</option>
                            <?php for($i = date('Y'); $i >= 1900; $i--) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <input type="submit" value="Sign Up">
                    <?php
                        if($error_message){
                            echo "<p class='errors'>$error_message</p>";
                        }
                    ?>
                    <p>Already have an account?</p>
                    <a href="login.php?state=login" title="Go to Login page">Login</a>
                </form>
            <?php elseif($_GET['state'] == 'login') : ?>
                <form action="" method='POST' class='container' novalidate>
                    <h1>Login</h1>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="<?php echo $_POST['username'] ??  ''; ?>" required placeholder="insert your username">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required placeholder="insert your password">
                    <input type="submit" value="Login">
                    <?php
                        if($error_message){
                            echo "<p class='errors'>$error_message</p>";
                        }
                    ?>
                    <p>Don't have an account?</p>
                    <a href="login.php?state=signup" title="Go to registration page">Sign Up</a>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>