<?php

class Cart {

    public static function addProduct($id) {
        $id = intval($id);
        $products = array();

        if (isset($_SESSION['products'])) {
            $products = $_SESSION['products'];
        }

        if (array_key_exists($id, $products)) {
            $products[$id] ++;
        } else {
            $products[$id] = 1;
        }

        $_SESSION['products'] = $products;

        return self::countItems();
    }
    
    public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products) {
        $prodsInCart = self::getProducts();
        $total = 0;
        if ($prodsInCart) {
            foreach ($products as $prod) {
                $total += $prod['price'] * $prodsInCart[$prod['id']];
            }
        }
        return $total;
    }

    public static function clearCart() {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
            return true;
        }
        return false;
    }

}
