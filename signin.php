<?php
require "db.php";
include "head.html"; 
include "hat.php"; 
include "form-signin.php"; 
$data = $_POST;
if ( isset($data['do_signin']) )
{
    $errors = array();
    $user = R::findOne('users','email = ?', array($data['email']));
    if( $user )
    {
        if( password_verify($data['password'], $user->password) )
        {
            $_SESSION['logged_user'] = $user;
            header('Location: /');
        } else
        {
            $errors[] = "Неверный пароль!";
        }
    } else
    {
        $errors[] = "Пользователя с таким e-mail не существует.";
    }
    if ( !empty($errors) )
        { 
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
        } 
}

?>

    