<?php


class AdminProductController {

    public function actionIndex() {
        Admin::checkAdmin();
        $title = 'Таблица товаров';

        $products = array();
        $products = Product::getAllProducts();
        $tableCounter = 1;
        require_once(ROOT.'/view/admin/product/index.php');
        return true;
    }

    public function actionCreate() {
        Admin::checkAdmin();
        $title = 'Создание товара';
        $categories = Category::getCategoriesList(false);

        $errors = false;
        $prod = array();

        if (isset($_POST['submit'])) {
            $prod['name'] = $_POST['name'];
            $prod['code'] = $_POST['code'];
            $prod['price'] = $_POST['price'];
            $prod['category_id'] = $_POST['category_id'];
            $prod['brand'] = $_POST['brand'];
            $prod['availability'] = $_POST['availability'];
            $prod['description'] = $_POST['description'];
            $prod['is_new'] = $_POST['is_new'];
            $prod['is_recommended'] = $_POST['is_recommended'];
            $prod['status'] = $_POST['status'];

            if (!isset($prod['name']) || empty($prod['name'])) {
                $errors[] = 'Заполните поле Название';
            }

            if (!isset($prod['code']) || empty($prod['code'])) {
                $errors[] = 'Заполните поле Код Товара';
            }

            if (!isset($prod['price']) || empty($prod['price'])) {
                $errors[] = 'Заполните поле Цена';
            }

            if (!isset($prod['brand']) || empty($prod['brand'])) {
                $errors[] = 'Заполните поле Марка';
            }

            if ($errors == false && ($id = Product::createProduct($prod))) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    Product::setImage($id);
                    move_uploaded_file($_FILES['image']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT']."/upload/images/products/{$id}.jpg"
                    );
                }
                header("Location: /admin/product");
            }
        }

        require_once(ROOT.'/view/admin/product/create.php');
        return true;
    }

    public function actionUpdate($id) {
        Admin::checkAdmin();
        $title = 'Обновление по id # '.$id;
        $categories = Category::getCategoriesList(false);
        $product = Product::getProductById($id);

        $errors = false;
        $prod = array();

        if (isset($_POST['submit'])) {
            $prod['name'] = $_POST['name'];
            $prod['code'] = $_POST['code'];
            $prod['price'] = $_POST['price'];
            $prod['category_id'] = $_POST['category_id'];
            $prod['brand'] = $_POST['brand'];
            $prod['availability'] = $_POST['availability'];
            $prod['description'] = $_POST['description'];
            $prod['is_new'] = $_POST['is_new'];
            $prod['is_recommended'] = $_POST['is_recommended'];
            $prod['status'] = $_POST['status'];

            if (!isset($prod['name']) || empty($prod['name'])) {
                $errors[] = 'Заполните поле Название';
            }

            if (!isset($prod['code']) || empty($prod['code'])) {
                $errors[] = 'Заполните поле Код Товара';
            }

            if (!isset($prod['price']) || empty($prod['price'])) {
                $errors[] = 'Заполните поле Цена';
            }

            if (!isset($prod['brand']) || empty($prod['brand'])) {
                $errors[] = 'Заполните поле Марка';
            }

            if ($errors == false) {
                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'],
                            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg"
                        );
                        Product::setImage($id);
                    }
                    Product::updateProductById($id, $prod);
                }
                header("Location: /admin/product");
            }
        }

        require_once(ROOT.'/view/admin/product/update.php');
        return true;
    }
    
    public function actionDelete($id) {
        Admin::checkAdmin();
        $title = 'Удаление товара # '.$id;
        
        $res = false;
        if (isset($_POST['submit'])) {
            $res = Product::deleteById($id);
            $this->actionIndex();
        } else {
            require_once(ROOT.'/view/admin/product/delete.php');
        }
        return true;
    }
    
}
