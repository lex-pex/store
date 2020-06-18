<?php

class CartController {

    public function actionAdd($id) {
        Cart::addProduct($id);
//        redirect back to user has came from
//        $referer = $_SERVER['HTTP_REFERER'];
//        header("Location: $referer");
        header("Location: /");
    }

    public function actionAddAjax($id) {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex() {

        $prodsInCart = false;
        $prodsInCart = Cart::getProducts();
        $products = array();
        $totalPrice = 0;

        if ($prodsInCart) {
            $prodIds = array_keys($prodsInCart);
            $products = Product::getProductsByIds($prodIds);
            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once (ROOT . '/view/cart/index.php');
        return true;
    }

    public function actionOrder($totalPrice = 0) {

        $prodsInCart = false;
        $prodsInCart = Cart::getProducts();
        $amountItems = Cart::countItems();
        $products = array();
        $totalPrice = 0;

        if ($prodsInCart) {
            $prodIds = array_keys($prodsInCart);
            $products = Product::getProductsByIds($prodIds);
            $totalPrice = Cart::getTotalPrice($products);
        }

        $name = isset($_SESSION['u']) ? $_SESSION['u']['name'] : '';
        $phone = '';
        $comment = '';
        $result = false;

        if (isset($_POST['submit'])) {

            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $comment = trim($_POST['comment']);

            $errors = false;

            if (strlen($name) < 2) {
                $errors[] = 'Имя короче 2-х символов';
            }

            if (strlen($phone) < 7) {
                $errors[] = 'Телефон короче 7-ми символов';
            }

            if (!Cart::countItems()) {
                $errors[] = 'Корзина пуста';
            }

            if ($errors == false) {
                /*            // sending data to admin 
                echo '<pre>';
                echo "Name: $name, Phone: $phone, Comment: $comment<br/>";
                print_r($_SESSION['products']);
                echo '</pre>';

                $adminEmail = 'php.start@mail.ru';
                $message = '<a href="http://site.com/admin/orders">Список заказов</a>';
                $subject = 'Новый заказ!';
                mail($adminEmail, $subject, $message);
                */
                $userId = (isset($_SESSION['user'])) ? $_SESSION['user'] : 0;

                Order::orderRecord($name, $phone, $comment, $prodsInCart, $userId);
                $result = Cart::clearCart();
            }
        }

        require_once (ROOT . '/view/cart/order.php');
        return true;
    }
    
    public function actionDelete($id) {
        
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products'][$id]);
        }
        
        header("Location: /cart/");
    }

}
