<?php

class AdminOrderController {
    
    public function actionIndex() {
        Admin::checkAdmin();
        $title = 'Заказы';
        
        $orders = Order::getOrderList();
        
        require_once(ROOT.'/view/admin/order/index.php');
        return true;
    }
    
    public function actionView($id) {
        Admin::checkAdmin();
        $title = 'Простмотр заказа # '.$id;
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProductsByIds($productsIds);
        
        require_once(ROOT.'/view/admin/order/view.php');
        return true;
    }
    
    public function actionUpdate($id) {
        Admin::checkAdmin();
        $title = 'Обновление заказа # '.$id;
        $statuses = array(1,2,3,4);
        
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProductsByIds($productsIds);
        
        $errors = false;
        $options = array();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['phone'] = $_POST['phone'];
            $options['comment'] = $_POST['comment'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];
            
//            $options['quantity'] = $_POST['quantity'];
//            $options['delete'] = $_POST['delete'];

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поле Имя';
            }

            if (!isset($options['phone']) || empty($options['phone'])) {
                $errors[] = 'Заполните поле Телефон';
            }

            if (!isset($options['comment']) || empty($options['comment'])) {
                $errors[] = 'Заполните поле Коментарий';
            }

            if (!isset($options['date']) || empty($options['date'])) {
                $errors[] = 'Заполните поле Дата';
            }

            if (!$errors && Order::updateById($id, $options)) {
                header("Location: /admin/order");
            }

        }
        
        require_once(ROOT.'/view/admin/order/update.php');
        return true;
    }
    
    public function actionDelete($id) {
        Admin::checkAdmin();
        $title = 'Удаление заказа # '.$id;
        
        $res = false;
        if (isset($_POST['submit'])) {
            $res = Order::deleteById($id);
            $this->actionIndex();
        } else {
            require_once(ROOT.'/view/admin/order/delete.php');
        }
        return true;
    }
    
}
