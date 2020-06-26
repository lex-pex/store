<?php

class MainController {

    /**
     * Websites Main Page
     */
    public function actionIndex() {
        $articles = Article::getArticles();
        require_once ROOT.'/view/main/index.php';
    }

    /**
     * Contact form
     * @return bool
     */
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

    /**
     * Outer Contact Form Handler
     */
    public function actionOuter() {
        if (isset($_POST)) {
            $mail = $_POST['email'];
            $text = $_POST['message'];
            $errors = false;
            if (!User::checkMail($mail)) {
                $errors[] = 'Wrong E-mail';
            }
            if (empty(trim($text))) {
                $errors[] = 'The message is empty';
            }
            if ($errors == false) {
                $adminEmail = 'javaenginee@gmail.com';
                $message = "{$text}. ||| From: {$mail}";
                $subject = 'LEXIS.INF.UA';
                mail($adminEmail, $subject, $message);
            }
        }
        header('Location: http://lexis.inf.ua');
        return;
    }

    /**
     * About page
     * @return bool
     */
    public function actionAbout() {
        require_once(ROOT . '/view/main/about.php');
        return true;
    }

    public function __call($name, $args) {
        $this->actionIndex();
        return true;
    }
}





