<?php

class CabinetController {
    
    public function actionIndex() {

        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        $_SESSION['u'] = $user;
        $name = $user['name'];
        $mail = $user['mail'];
        
        $isAdmin = $user['role'] == 'admin';
        
        require_once (ROOT.'/view/cabinet/index.php');
        return true;
        
    }
    
    public function actionEdit() {
        
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        $id = $user['id'];
        $name = $user['name'];
        $mail = $user['mail'];
        $pass = $user['pass'];
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

            if ($errors == false) {
                $res = User::edit($id, $name, $mail, $pass);
            }

        }

        require_once (ROOT.'/view/cabinet/edit.php');
        return true;

    }
    
}
