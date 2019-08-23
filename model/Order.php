<?php


class Order {

    public static function orderRecord($name, $phone, $comment, $products, $userId) {

        $db = Db::getConnection();

        $query = 'INSERT INTO order_record (name, phone, comment, user_id, products) '
                . 'VALUES (:name, :phone, :comment, :user_id, :products)';

        $products = json_encode($products);

        $res = $db->prepare($query);

        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':phone', $phone, PDO::PARAM_STR);
        $res->bindParam(':comment', $comment, PDO::PARAM_STR);
        $res->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $res->bindParam(':products', $products, PDO::PARAM_STR);

        return $res->execute();

    }

    public static function getOrderList() {
        $products = array();
        $db = Db::getConnection();
        
        $query = "SELECT * FROM order_record "
                . "ORDER BY date DESC";
        
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $res->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['phone'] = $row['phone'];
            $products[$i]['comment'] = $row['comment'];
            $products[$i]['user_id'] = $row['user_id'];
            $products[$i]['date'] = $row['date'];
            $products[$i]['products'] = $row['products'];
            $products[$i]['status'] = $row['status'];
            $i ++;
        }
        return $products;
    }

    public static function deleteById($id) {
        $db = Db::getConnection();
        $query = 'DELETE FROM order_record WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function getOrderById($id) {
        $db = Db::getConnection();
        $query = 'SELECT * FROM order_record WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        return $res->fetch();
    }

    public static function getStatusName($num) {
        switch ($num) {
            case '1': return 'Новый';
            break;
            case '2': return 'В работе';
            break;
            case '3': return 'Доставка';
            break;
            case '4': return 'Закрыт';
        }
    }

    public static function updateById($id, $options) {
        
//        echo '<pre>';
//        print_r($options);
//        echo '</pre>';
        
        $db = Db::getConnection();
        $query = 'UPDATE order_record SET '
                . 'name = :name, '
                . 'phone = :phone, '
                . 'comment = :comment, '
                . 'date = :date, '
                . 'status = :status '
                . 'WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $res->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $res->bindParam(':comment', $options['comment'], PDO::PARAM_STR);
        $res->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $res->execute();
    }

}