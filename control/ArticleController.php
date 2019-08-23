<?php


class ArticleController {
    
    public function actionIndex() {
//        $products = Product::getLatestProducts(6); // for showfront page
        $article = Article::getArticle($id);
        require_once ROOT.'/view/main/index.php';
        return true;
    }
    
    public function actionView($id) {
        $article = Article::getArticle($id);
        
        require_once ROOT.'/view/article/view.php';
        return true;
    }
}
