<?php

require_once(ROOT . '/helpers/Db.php');

class Category {
    
    public static function getCategoriesList($hide = true) {
        $hidingString = '';
        if ($hide) {
            $hidingString = 'WHERE status = 1';
        }
        $db = Db::getConnection();
        $categories = array();
        $res = $db->query("SELECT * FROM category "
                . $hidingString
                . " ORDER BY sort_order DESC");
        $i = 0;
        while($row = $res->fetch()) {
            $categories[$i]['id'] = $row['id'];
            $categories[$i]['name'] = $row['name'];
            $categories[$i]['sort_order'] = $row['sort_order'];
            $categories[$i]['status'] = $row['status'];
            $i ++;
        }
        return $categories;
    }

    public static function createCategory($category) {

        if (empty($category['sort_order'])) {
            $category['sort_order'] = 0;
        }
        $db = Db::getConnection();
        $query = 'INSERT INTO category (name, sort_order, status) '
                . 'VALUES (:name, :sort_order, :status)';
        $res = $db->prepare($query);
        $res->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_STR);
        $res->bindParam(':status', $category['status'], PDO::PARAM_STR);
        if ($res->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function deleteById($id) {
        $db = Db::getConnection();
        $query = 'DELETE FROM category WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function getCategoryById($id) {
        $db = Db::getConnection();
        $query = 'SELECT * FROM category WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        return $res->fetch();
    }
    
    public static function getCategoryName($id) {
        $db = Db::getConnection();
        $query = 'SELECT name FROM category WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        return $res->fetch();
    }

    public static function updateCategoryById($id, $category) {
        $db = Db::getConnection();
        $query = 'UPDATE category SET '
                . 'name = :name, '
                . 'sort_order = :sort_order, '
                . 'status = :status '
                . 'WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $res->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_STR);
        $res->bindParam(':status', $category['status'], PDO::PARAM_STR);
        return $res->execute();
    }

}
