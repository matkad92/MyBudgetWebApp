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
            $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 30 znaków!";
        }
        //chcecking if nick consists of alpfhanumeric characters
        if (ctype_alnum($userLogin)==false)
        {
            $validRegister = false;
            $_SESSION['e_nick'] = "Nick może się składać jedynie z liter i cyfr bez polskich znaków!";
        }

        

        header('Location: RWD_RegisterPage.php');

    }
