<?php

    require_once('./_user.php');

    use MyUsers\User;

    session_start(); // Necessary to start or resume a session
    if (!isset($_SESSION['UserLogged'])) {
        $_SESSION['UserLogged'] = false;
    }

    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = new User();
    }

    $UserLogged = &$_SESSION['UserLogged'];
    $user = &$_SESSION['user'];

    $file_user = './databases/user.json';
    $file_nav = './databases/nav_menu.json';
    $file_projects = './databases/projects.json';
    $file_studies = './databases/studies.json';
    $file_work_experiences = './databases/work_experiences.json';
    $file_messages = './databases/messages.json';
    
    $user_array = json_decode(file_get_contents($file_user), true);
    $nav_array = json_decode(file_get_contents($file_nav), true);
    $projects_array = json_decode(file_get_contents($file_projects), true);
    $studies_array = json_decode(file_get_contents($file_studies), true);
    $work_experiences_array = json_decode(file_get_contents($file_work_experiences), true);
    $messages_array = json_decode(file_get_contents($file_messages), true);
?>
