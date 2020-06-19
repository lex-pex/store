<?php

class ArticleController {
    /**
     * Show-Item page
     * @param $id
     * @return bool
     */
    public function actionView($id) {
        $article = Article::getArticle($id);
        require_once ROOT.'/view/article/view.php';
        return true;
    }
}
