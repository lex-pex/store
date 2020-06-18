<?php

//require_once(ROOT.'/model/Product.php');

class ProductController {

    public function actionView($id) {

        $product = Product::getProductById($id);

        require_once(ROOT.'/view/product/view.php');

        return true;

    }

}


