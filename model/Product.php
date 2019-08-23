<?php

class Product {

    const DISPLAYED = 6;

    public static function getLatestProducts($amount = self::DISPLAYED, $page = 1) {
        $limit = self::DISPLAYED;
        $offset = ($page - 1) * $amount;

        $db = Db::getConnection();
        $query = 'SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status="1" ORDER BY id DESC LIMIT :amount '
                . 'OFFSET :offset';

        $res = $db->prepare($query);

        $res->bindParam(':amount', $amount, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        $res->setFetchMode(PDO::FETCH_ASSOC);

        $res->execute();

        $i = 0;
        $productList = array();
        while ($row = $res->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }

    public static function getProductById($id) {
        $db = Db::getConnection();
        $query = 'SELECT * FROM product WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        return $res->fetch();
    }

    public static function getProductsByCategory($id, $page = 1) {

        $limit = self::DISPLAYED;
        $offset = ($page - 1) * self::DISPLAYED;
        $db = Db::getConnection();

        $query = 'SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status = 1 AND category_id = :id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        $res->execute();

        $i = 0;
        $productList = array();
        while ($row = $res->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i ++;
        }
        return $productList;
    }
    
    public static function getQuantityInCategory($id) {
        
        $db = Db::getConnection();
        
        $res = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND category_id="'.$id.'"');
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $row = $res->fetch();
        
        return $row['count'];
        
    }
    
    public static function getQuantityProducts() {
        
        $db = Db::getConnection();
        
        $res = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1"');
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $row = $res->fetch();
        
        return $row['count'];
        
    }

    public static function getProductsByIds($prodIds) {
        $products = array();
        $db = Db::getConnection();
        $idsString = implode(',', $prodIds);
        
        $query = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";
        
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $res->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i ++;
        }
        
        return $products;
    }
    
    public static function getRecommendedProds() {
        $products = array();
        $db = Db::getConnection();
        
        $query = "SELECT * FROM product WHERE is_recommended='1'";
        
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $res->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i ++;
        }
        
        return $products;
    }
    
    public static function getAllProducts() {
        $products = array();
        $db = Db::getConnection();
        
        $query = "SELECT * FROM product";
        
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $res->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['status'] = $row['status'];
            $products[$i]['image'] = $row['image'];
            $i ++;
        }
        
        return $products;
    }

    public static function deleteById($id) {
        $db = Db::getConnection();
        $query = 'DELETE FROM product WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function createProduct($prod) {
        $db = Db::getConnection();
        $query = 'INSERT INTO product (name, code, price, category_id, brand, '
                . 'availability, description, is_new, is_recommended, status) '
                . 'VALUES (:name, :code, :price, :category_id, :brand, '
                . ':availability, :description, :is_new, :is_recommended, :status)';
        $res = $db->prepare($query);
        $res->bindParam(':name', $prod['name'], PDO::PARAM_STR);
        $res->bindParam(':code', $prod['code'], PDO::PARAM_STR);
        $res->bindParam(':price', $prod['price'], PDO::PARAM_STR);
        $res->bindParam(':category_id', $prod['category_id'], PDO::PARAM_INT);
        $res->bindParam(':brand', $prod['brand'], PDO::PARAM_STR);
        $res->bindParam(':availability', $prod['availability'], PDO::PARAM_INT);
        $res->bindParam(':description', $prod['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $prod['is_new'], PDO::PARAM_INT);
        $res->bindParam(':is_recommended', $prod['is_recommended'], PDO::PARAM_INT);
        $res->bindParam(':status', $prod['status'], PDO::PARAM_INT);
        if ($res->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
/*
    public static function getImage($id) {
        $noImg = 'no_image.jpg';
        $path = '/upload/images/products/';
        $pathToImg = $path.$id.'.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToImg)) {
            return $pathToImg;
        }
        return $path . $noImg;
    }
*/
    public static function updateProductById($id, $prod) {
        $db = Db::getConnection();
        $query = 'UPDATE product SET '
                . 'name = :name, '
                . 'code = :code, '
                . 'price = :price, '
                . 'category_id = :category_id, '
                . 'brand = :brand, '
                . 'availability = :availability, '
                . 'description = :description, '
                . 'is_new = :is_new, '
                . 'is_recommended = :is_recommended, '
                . 'status = :status '
                . 'WHERE id = :id';
        $res = $db->prepare($query);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $prod['name'], PDO::PARAM_STR);
        $res->bindParam(':code', $prod['code'], PDO::PARAM_STR);
        $res->bindParam(':price', $prod['price'], PDO::PARAM_STR);
        $res->bindParam(':category_id', $prod['category_id'], PDO::PARAM_INT);
        $res->bindParam(':brand', $prod['brand'], PDO::PARAM_STR);
        $res->bindParam(':availability', $prod['availability'], PDO::PARAM_INT);
        $res->bindParam(':description', $prod['description'], PDO::PARAM_STR);
        $res->bindParam(':is_new', $prod['is_new'], PDO::PARAM_INT);
        $res->bindParam(':is_recommended', $prod['is_recommended'], PDO::PARAM_INT);
        $res->bindParam(':status', $prod['status'], PDO::PARAM_INT);
        return $res->execute();
    }

    public static function setImage($id) {
        $db = Db::getConnection();
        $path = "/upload/images/products/{$id}.jpg";
        $query = "UPDATE product SET image = :path WHERE id = :id";
        $res = $db->prepare($query);
        $res->bindParam(':path', $path, PDO::PARAM_STR);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }
}





