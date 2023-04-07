<?php
    session_start();

    require_once 'database.php';

    if(!isset($_SESSION['loggedInID']))
    {
        if(isset($_POST['userLogin']))
        {

            $login = filter_input(INPUT_POST,'userLogin');
            $password = filter_input(INPUT_POST,'userPassword');


            $userQuery = $db->prepare('SELECT id, password FROM users WHERE username = :login');
            $userQuery->bindValue(':login', $login, PDO::PARAM_STR);
            $userQuery->execute();

            $user = $userQuery->fetch();
            if($user && password_verify($password,$user['password']))
            {
                $_SESSION['loggedInID'] = $user['id'];
                $_SESSION['loggedIn'] = true;
                unset($_SESSION['badAttempt']);
                header('Location: RWD_BalancePage.php');
                exit();
            }   
            else
            {
                $_SESSION['badAttempt'] = true;
                header('Location: RWD_LoginPage.php');
                exit();
            }
        }
        else
        {
            header('Location: RWD_LoginPage.php');
            exit();
        }
    }
    else
    {
        header('Location: RWD_LoginPage.php');
        exit();
    }