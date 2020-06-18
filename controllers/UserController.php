<?php

class UserController {
    
    public function actionRegister() {
        
        $name = '';
        $mail = '';
        $pass = '';
        $res = false;
        
        if (isset($_POST['subm'])) {
            $name = $_POST['name'];
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя короче 2-х символов';
            }

            if (!User::checkMail($mail)) {
                $errors[] = 'Адрес почты некоректный';
            }

            if (!User::checkPass($pass)) {
                $errors[] = 'Пароль короче 6-х символов';
            }

            if (User::checkMailExist($mail)) {
                $errors[] = 'Такой адрес почты уже есть';
            }

            if ($errors == false) {
                $res = User::register($name, $mail, $pass);
            }

        }

        require_once (ROOT.'/view/user/register.php');
        return true;
    }
    
    /*****************************
    
    public function actionCabinet() {
        $userId = 0;
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user'];
        }
        $name = 'User id: '.$userId;
        $mail = 'petya@mail.com';
        
        require_once (ROOT.'/view/user/cabinet.php'); - Replaced to cabinet/index.php 
        return true;
        
    }
     *  
     *****************************/
    
    public function actionLogin() {

        $mail = '';
        $pass = '';
        $res = false;

        if (isset($_POST['subm'])) {

            $mail = $_POST['mail'];
            $pass = $_POST['pass'];

            $errors = false;

            if (!User::checkMail($mail)) {
                $errors[] = 'Адрес почты некоректный';
            }

            if (!User::checkPass($pass)) {
                $errors[] = 'Пароль короче 6-х символов';
            }

            if (!User::checkMailExist($mail)) {
                $errors[] = 'Нет пользователя с таким адресом';
            }
            
            $userId = User::checkUserData($mail, $pass);
            
            if ($userId == false) {
                $errors[] = 'Не правильные данные для входа';
            } elseif ($errors == false) {
                User::auth($userId);
                header("Location: /cabinet/");
            }
            
        }
        require_once (ROOT.'/view/user/login.php');
        return true;
    }

    public function actionLogout() {
        unset($_SESSION['user']);
        header("Location: /");
    }

}






