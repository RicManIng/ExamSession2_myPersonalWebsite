<!DOCTYPE html>
<html lang="en">
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

        $err_msg_name = null;
        $err_msg_surname = null;
        $err_msg_username = null;
        $err_msg_email = null;
        $err_msg_password = null;
        $err_msg_confirm_password = null;
        $err_msg_date = null;
        $err_msg_complete = null;

        $error_message = null;

        $name = '';
        $surname = '';
        $username = '';
        $email = '';
        $password = '';
        $confirm_password = '';
        $day = '';
        $month = '';
        $year = '';


        if(!empty($_POST)){
            if($_GET['state'] == 'signup'){

                $valid_conditions = false;

                $name = $_POST['name'] ?? '';
                $surname = $_POST['surname'] ?? '';
                $username = $_POST['username'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                $confirm_password = $_POST['confirm_password'] ?? '';
                $day = $_POST['day'] ?? '';
                $month = $_POST['month'] ?? '';
                $year = $_POST['year'] ?? '';

                foreach($_POST as $key => $value){
                    if(empty($value)){
                        $valid_conditions = false;
                        $err_msg_complete = 'Error: check there is no empty field';
                        break;
                    }
                }

                if($password != $confirm_password){
                    $valid_conditions = false;
                    $err_msg_confirm_password = 'Error: password and confirm password are different';
                    $password = '';
                    $confirm_password = '';
                }

                if($user->username_exists($username, $file_user)){
                    $valid_conditions = false;
                    $err_msg_username = 'Error: username already exists';
                    $username = '';
                }

                if(!$user->set_username($username)){
                    $valid_conditions = false;
                    $err_msg_username = 'Error: invalid username format, max length = 20';
                    $username = '';
                }

                if(!$user->set_password($password)){
                    $valid_conditions = false;
                    $err_msg_password = 'Error: invalid password format, min length = 8, max length = 20';
                    $password = '';
                    $confirm_password = '';
                }

                if(!$user->set_birthDate($day, $month, $year)){
                    $valid_conditions = false;
                    $err_msg_date = 'Error: invalid birth date, this is due to a wrong date format or you are not 18+';
                    $day = '';
                    $month = '';
                    $year = '';
                }

                if($user->email_exists($email, $file_user)){
                    $valid_conditions = false;
                    $err_msg_email = 'Error: email already exists';
                    $email = '';
                }

                if(!$user->set_email($email)){
                    $valid_conditions = false;
                    $err_msg_email = 'Error: invalid email format';
                    $email = '';
                }

                if(!$user->set_name($name)){
                    $valid_conditions = false;
                    $err_msg_name = 'Error: invalid name format, max length = 20';
                    $name = '';
                }

                if(!$user->set_surname($surname)){
                    $valid_conditions = false;
                    $err_msg_surname = 'Error: invalid surname format, max length = 20';
                    $surname = '';
                }

                if($valid_conditions){
                    $user->user_save($file_user);
                    $user_saved = true;
                }
            }

            elseif($_GET['state'] == 'login'){
                $valid_conditions = true;
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                if(!($username && $password)){
                    $valid_conditions = false;
                    $error_message = 'Error: check there is no empty field';
                } elseif (!$user->username_exists($username, $file_user)){
                    $valid_conditions = false;
                    $error_message = 'Error: username not found';
                } elseif (!$user->check_login($username, $password, $file_user)) {
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
                <form action="login.php?state=signup" method="POST" class='container' novalidate>
                    <h1>Registration</h1>
                    <label for="name">Name * :</label>
                    <input type="text" name="name" id="name" value="<?= $name; ?>" required placeholder="insert your name" <?= ($err_msg_name) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_name){
                            echo "<p class='errors'>$err_msg_name</p>";
                        }
                    ?>
                    <label for="surname">Surname * :</label>
                    <input type="text" name="surname" id="surname" value="<?= $surname; ?>" required placeholder="insert your surname" <?= ($err_msg_surname) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_surname){
                            echo "<p class='errors'>$err_msg_surname</p>";
                        }
                    ?>
                    <label for="username">Username * : </label>
                    <input type="text" name="username" id="username" value="<?= $username; ?>" required placeholder="insert your username" <?= ($err_msg_username) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_username){
                            echo "<p class='errors'>$err_msg_username</p>";
                        }
                    ?>
                    <label for="email">Email * :</label>
                    <input type="email" name="email" id="email" value="<?= $email; ?>" required placeholder="insert your email" <?= ($err_msg_email && ($email != '')) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_email && ($email != '')){
                            echo "<p class='errors'>$err_msg_email</p>";
                        }
                    ?>
                    <!-- the password must be retyped each time one error occur -->
                    <label for="password">Password * :</label>
                    <input type="password" name="password" id="password" required placeholder="insert your password" <?= ($err_msg_password && ($password != '')) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_password && ($password != '')){
                            echo "<p class='errors'>$err_msg_password</p>";
                        }
                    ?>
                    <label for="confirm_password">Confirm Password * :</label>
                    <input type="password" name="confirm_password" id="confirm_password" required placeholder="confirm your password" <?= ($err_msg_confirm_password) ? "class='input-error'" : ""?>>
                    <?php
                        if($err_msg_confirm_password){
                            echo "<p class='errors'>$err_msg_confirm_password</p>";
                        }
                    ?>
                    <label>Birth date : </label>
                    <div>
                        <select name="day" id="date_day">
                            <option value="0">Day</option>
                            <?php for($i = 1; $i <= 31; $i++) : ?>
                                <?php if($i == $day): ?>
                                    <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="month" id="date_month">
                            <option value="0">Month</option>
                            <?php for($i = 1; $i <= 12; $i++) : ?>
                                <?php if($i == $month): ?>
                                    <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                        <select name="year" id="date_year">
                            <option value="0">Year</option>
                            <?php for($i = date('Y'); $i >= 1900; $i--) : ?>
                                <?php if($i == $year): ?>
                                    <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <?php
                        if($err_msg_date && ($day != '' && $month != '' && $year != '')){
                            echo "<p class='errors'>$err_msg_date</p>";
                        }
                    ?>
                    <input type="submit" value="Sign Up">
                    <?php
                        if($err_msg_complete && (!empty($_POST))){
                            echo "<p class='errors'>$err_msg_complete</p>";
                        }
                    ?>
                    <p>Already have an account?</p>
                    <a href="login.php?state=login" title="Go to Login page">Login</a>
                </form>
            <?php elseif($_GET['state'] == 'login') : ?>
                <form action="login.php?state=login" method='POST' class='container' novalidate>
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