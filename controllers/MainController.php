<?php

class MainController {

    public function actionIndex() {
        $articles = Article::getArticles();
        require_once ROOT.'/view/main/index.php';
    }

    public function actionContact() {
        $mail = '';
        $subject = 'Тема письма';
        $text = '';
        $message = '';
        $res = false;

        if (isset($_POST['submit'])) {

            $mail = $_POST['mail'];
            $text = $_POST['text'];

            $errors = false;

            if (!User::checkMail($mail)) {
                $errors[] = 'Wrong E-mail';
            }

            if (empty(trim($text))) {
                $errors[] = 'The message is empty';
            }

            if ($errors == false) {
                $adminEmail = 'javaenginee@gmail.com';
                $message = "Текст: {$text}. От {$mail}";
                $subject = 'Message from LexPexStore';
                $res = mail($adminEmail, $subject, $message);
            }
        }
        require_once (ROOT . '/view/main/contact.php');
        return true;
    }

    public function actionAbout() {
        require_once(ROOT . '/view/main/about.php');
        return true;
    }

    public function __call($name, $args) {
        $this->actionIndex();
        return true;
    }
    
}





