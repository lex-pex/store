<?php

class AdminArticleController {

    public function actionIndex() {

        $title = 'статьи';

        $tableCounter = 1;
        $articles = Article::getArticles();

        require_once ROOT . '/view/admin/article/index.php';
        return true;
    }

    public function actionDelete($id) {
         Admin::checkAdmin();
        $title = 'Удаление статьи # '.$id;
        
        $res = false;
        if (isset($_POST['submit'])) {
            $res = Article::deleteById($id);
            $this->actionIndex();
        } else {
            require_once(ROOT.'/view/admin/article/delete.php');
        }
        return true;
    }

    public function actionCreate() {
        Admin::checkAdmin();
        $title = 'Создание статьи';

        $errors = false;
        $items = array();

        if (isset($_POST['submit'])) {
            $items['title'] = $_POST['title'];
            $items['descr'] = $_POST['descr'];
            $items['text'] = $_POST['text'];
            $items['sort_order'] = $_POST['sort_order'];
            $items['status'] = $_POST['status'];

            if (!isset($items['title']) || empty($items['title'])) {
                $errors[] = 'Заполните поле Название';
            }

            if (!isset($items['descr']) || empty($items['descr'])) {
                $errors[] = 'Заполните поле Код Товара';
            }

            if (!isset($items['text']) || empty($items['text'])) {
                $errors[] = 'Заполните поле Цена';
            }

            if ($errors === false && ($id = Article::createArticle($items))) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    Article::setImage($id);
                    move_uploaded_file($_FILES['image']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT']."/upload/images/articles/{$id}.jpg"
                    );
                }
                header("Location: /admin/article");
            }
        }

        require_once(ROOT.'/view/admin/article/create.php');
        return true;
    }
    
    public function actionUpdate($id) {
        Admin::checkAdmin();
        $title = 'Обновление по id # '.$id;
        $article = Article::getArticle($id);

        $errors = false;
        $items = array();

        if (isset($_POST['submit'])) {
            $items['title'] = $_POST['title'];
            $items['descr'] = $_POST['descr'];
            $items['text'] = $_POST['text'];
            $items['sort_order'] = $_POST['sort_order'];
            $items['status'] = $_POST['status'];

            if (!isset($items['title']) || empty($items['title'])) {
                $errors[] = 'Заполните поле Название';
            }

            if (!isset($items['descr']) || empty($items['descr'])) {
                $errors[] = 'Заполните поле Код Товара';
            }

            if (!isset($items['text']) || empty($items['text'])) {
                $errors[] = 'Заполните поле Цена';
            }

            if ($errors == false) {
                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'],
                            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/articles/{$id}.jpg"
                        );
                        Article::setImage($id);
                    }
                    Article::updateArticle($id, $items);
                }
                header("Location: /admin/article");
            }
        }

        require_once(ROOT.'/view/admin/article/update.php');
        return true;
    }

}
