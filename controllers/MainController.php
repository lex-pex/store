<?php

class MainController {

    public function actionIndex() {
//        $products = Product::getLatestProducts(6); // for showfront page
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
                $errors[] = 'Неправильный E-mail';
            }

            if (empty(trim($text))) {
                $errors[] = 'Пустое сообщение';
            }

            if ($errors == false) {
                $adminEmail = 'javaenginee@gmail.com';
                $message = "Текст: {$text}. От {$mail}";
                $subject = 'Сообщение с сайта';
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

    public function actionBlog() {
        require_once(ROOT . '/view/main/blog.php');
        return true;
    }

    public function __call($name, $args) {
        $this->actionIndex();
        return true;
    }
    
}





