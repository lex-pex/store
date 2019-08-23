<?php


class Article {

    public static function getArticles() {

        $db = Db::getConnection();
        $query = 'SELECT * FROM articles '
                . 'ORDER BY sort_order DESC ';// 'LIMIT 6';

        $res = $db->prepare($query);

        $res->bindParam(':amount', $amount, PDO::PARAM_INT);

        $res->setFetchMode(PDO::FETCH_ASSOC);

        $res->execute();

        $i = 0;
        $productList = array();
        while ($row = $res->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['descr'] = $row['descr'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['text'] = $row['text'];
            $productList[$i]['sort_order'] = $row['sort_order'];
            $productList[$i]['status'] = $row['status'];
            $i++;
        }
        return $productList;
    }

    public static function getArticle($id) {
        $db = Db::getConnection();
        $query = 'SELECT * FROM articles WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        return $res->fetch();
    }

    public static function setImage($id) {
        $db = Db::getConnection();
        $path = "/upload/images/articles/{$id}.jpg";
        $query = "UPDATE articles SET image = :path WHERE id = :id";
        $res = $db->prepare($query);
        $res->bindParam(':path', $path, PDO::PARAM_STR);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function createArticle($items) {
        $db = Db::getConnection();

        $query = 'INSERT INTO articles (title, descr, text, sort_order, status) '
                . 'VALUES (:title, :descr, :text, :sort_order, :status) ';

        $res = $db->prepare($query);
        $res->bindParam(':title', $items['title'], PDO::PARAM_STR);
        $res->bindParam(':descr', $items['descr'], PDO::PARAM_STR);
        $res->bindParam(':text', $items['text'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $items['sort_order'], PDO::PARAM_INT);
        $res->bindParam(':status', $items['status'], PDO::PARAM_INT);

        if ($res->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateArticle($id, $items) {
        $db = Db::getConnection();
        $query = 'UPDATE articles SET '
                . 'title = :title, '
                . 'descr = :descr, '
                . 'text = :text, '
                . 'sort_order = :sort_order, '
                . 'status = :status '
                . 'WHERE id = :id';
        
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':title', $items['title'], PDO::PARAM_STR);
        $res->bindParam(':descr', $items['descr'], PDO::PARAM_STR);
        $res->bindParam(':text', $items['text'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $items['sort_order'], PDO::PARAM_INT);
        $res->bindParam(':status', $items['status'], PDO::PARAM_INT);
        
        return $res->execute();
    }

    public static function deleteById($id) {

        $db = Db::getConnection();
        $query = 'DELETE FROM articles WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();

    }

}
