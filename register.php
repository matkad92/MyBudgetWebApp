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
            $_SESSION['e_nick'] = "Istnieje już użytkownik o podanym loginie";
        }

        $isEmailInDatabaseQuery = $db->prepare('SELECT id FROM users WHERE email =:mail');
        $isEmailInDatabaseQuery->bindValue(':mail', $email, PDO::PARAM_STR);
        $isEmailInDatabaseQuery->execute();

        $howManyUsersWithTheSameEmail = $isEmailInDatabaseQuery->rowCount();
        if ($howManyUsersWithTheSameEmail > 0)
        {
            $validRegister = false;
            $_SESSION['e_email'] = "Istnieje już użytkownik o podanym adresie e-mail";
        }



        if($validRegister)
        {
            $insertUserQuery = $db->prepare('INSERT INTO users VALUES (NULL, :login, :password, :mail)') ;
            $insertUserQuery->bindValue(':mail', $email, PDO::PARAM_STR);
            $insertUserQuery->bindValue(':login', $userLogin, PDO::PARAM_STR);
            $insertUserQuery->bindValue(':password', $passwordHash, PDO::PARAM_STR);
            $insertUserQuery->execute();

            $registeredUserIdNumberQuery = $db->query('SELECT id FROM users ORDER BY id DESC Limit 1');
            $registeredUserIdarr = $registeredUserIdNumberQuery->fetchAll();
            $registeredUserId = $registeredUserIdarr[0]['id'];
    
            $defaultIncomeQuery = $db->query('SELECT name FROM incomes_category_default');
            $defaultIncomeArr = $defaultIncomeQuery->fetchAll();
            //copying default Incomes to assigned to user incomes;
            foreach($defaultIncomeArr as $income)
            {
                $name = $income['name'];
                $db->query("INSERT INTO incomes_category_assigned_to_users VALUES (NULL, '$registeredUserId', '$name' )");
            }
    
            $defaultExpenseQuery = $db->query('SELECT name FROM expenses_category_default');
            $defaultExpensearr = $defaultExpenseQuery->fetchAll();
            //copying expenses
            foreach($defaultExpensearr as $expense)
            {
                $name = $expense['name'];
                $db->query("INSERT INTO expenses_category_assigned_to_users VALUES (NULL, '$registeredUserId', '$name' )");
            }
    
            $defaultPaymentQuery = $db->query('SELECT name FROM payment_methods_default');
            $defaultPaymentarr = $defaultPaymentQuery->fetchAll();
            //copying expenses
            foreach($defaultPaymentarr as $payment)
            {
                $name = $payment['name'];
                $db->query("INSERT INTO payment_methods_assigned_to_users VALUES (NULL, '$registeredUserId', '$name' )");
            }    

            header('Location: succedRegister.php');
        }


        
        //echo $registeredUserId;
        //echo "</br>";
                        
        //testfield
        //$_SESSION['test'] = "test";

        if(!$validRegister) header('Location: RWD_RegisterPage.php');

    }
