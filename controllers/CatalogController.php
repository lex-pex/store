<?php

class CatalogController {

    const DISPLAY_FOR_CATALOG = 6;

    public function actionIndex($page = 1) {
        $products = Product::getLatestProducts(self::DISPLAY_FOR_CATALOG, $page);
        $total = Product::getQuantityProducts();
        $pager = new Pager('_', $page, $total, self::DISPLAY_FOR_CATALOG);
        require_once (ROOT.'/view/catalog/index.php');
        return true;
    }

    public function actionCategory($id = 0, $page = 1) {
        $products = Product::getProductsByCategory($id, $page);
        $total = Product::getQuantityInCategory($id);
        $pager = new Pager('_', $page, $total, Product::DISPLAYED);
        $categoryName = Category::getCategoryName($id)['name'];
        $categoryId = $id;
        require_once (ROOT.'/view/catalog/category.php');
        return true;
    }
}
