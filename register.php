<?php
    session_start();

    if(isset($_POST['userLogin']))
    {
        $validRegister = true;

        $userLogin = $_POST['userLogin'];
        //checking if login length is between 5 and 20 char
        if ((strlen($userLogin) < 5)||(strlen($userLogin) > 20))
        {
            $validRegister = false;
            $_SESSION['e_nick'] = "Nick musi posiadać od 5 do 30 znaków!";
        }
        //chcecking if nick consists of alpfhanumeric characters
        if (ctype_alnum($userLogin)==false)
        {
            $validRegister = false;
            $_SESSION['e_nick'] = "Nick może się składać jedynie z liter i cyfr bez polskich znaków!";
        }
        if ((strlen($userLogin) == 0))
        {
            unset ($_SESSION['e_nick']);
            $validRegister = false;
            $_SESSION['e_nickMissing'] = "Wprowadź login";
        }

        //checking password

        $password = $_POST['userPassword'];
        $passwordConfirmation = $_POST['userPasswordConfirmation'];
        if ((strlen($password) < 8)||(strlen($password) > 20))
        {
            $validRegister = false;
            $_SESSION['e_password'] = "Hasło musi zawierać od 8 do 30 znaków!";
        }
        if ($password != $passwordConfirmation)
        {
            $validRegister = false;
            $_SESSION['e_password'] = "Podane hasła nie są identyczne!";
        }
        if (strlen($passwordConfirmation) == 0)
        {
            unset ($_SESSION['e_password']);

            $validRegister = false;
            $_SESSION['e_passwordMissing'] = "Powtórz hasło!";
        }
        if ((strlen($password) == 0) && (strlen($passwordConfirmation) == 0))
        {
            unset ($_SESSION['e_passwordMissing']);

            $validRegister = false;
            $_SESSION['e_passwordEmpty'] = "Wprowadź hasło";
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //chcecking e-mail
        $email = $_POST['userEmail'];
        $sanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($sanEmail, FILTER_VALIDATE_EMAIL) == false) || ($email != $sanEmail))
        {
            $validRegister = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }

        //remember input
        $_SESSION['input_login'] = $userLogin;
        $_SESSION['input_email'] = $email;
        $_SESSION['input_password'] = $password;
        $_SESSION['input_password_conf'] = $passwordConfirmation;
        //chcecking if login or email already exists in db
        require_once 'database.php';
        $isLoginInDatabaseQuery = $db->prepare('SELECT id FROM users WHERE username =:login');
        $isLoginInDatabaseQuery->bindValue(':login', $userLogin, PDO::PARAM_STR);
        $isLoginInDatabaseQuery->execute();

        $howManyUsersWithTheSameLogin = $isLoginInDatabaseQuery->rowCount();
        if ($howManyUsersWithTheSameLogin > 0)
        {
            $validRegister = false;
            $_SESSION['e_nick'] = "istnieje już użytkownik o podanym loginie";
        }

        //testfield
        $_SESSION['test'] = $isLoginInDatabaseQuery->rowCount();


        header('Location: RWD_RegisterPage.php');

    }
