<?php

class User {
    
    public static function register($name, $mail, $pass) {
        
        $db = Db::getConnection();
        
        $query = 'INSERT INTO user (name, mail, pass) '
                . 'VALUES (:name, :mail, :pass)';
        
        $res = $db->prepare($query);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':mail', $mail, PDO::PARAM_STR);
        $res->bindParam(':pass', $pass, PDO::PARAM_STR);
        
        return $res->execute();
        
    }
    
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
    public static function checkPass($pass) {
        if (strlen($pass) >= 6) {
            return true;
        }
        return false;
    }
    
    public static function checkMail($mail) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    public static function checkMailExist($mail) {
        $db = Db::getConnection();
        $query = 'SELECT COUNT(*) FROM user WHERE mail= :mail';
        
        $res = $db->prepare($query);
        $res->bindParam(':mail', $mail, PDO::PARAM_STR);
        $res->execute();
        
        if ($res->fetchColumn()) {
            return true;
        }
        return false;
    }

    public static function checkUserData($mail, $pass) {
        $db = Db::getConnection();
        $query = 'SELECT * FROM user WHERE mail= :mail '
                . 'AND pass= :pass';
        $res = $db->prepare($query);
        $res->bindParam(':mail', $mail, PDO::PARAM_STR);
        $res->bindParam(':pass', $pass, PDO::PARAM_STR);
        $res->execute();
        
        $user = $res->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /login/");
    }

    public static function isGuest() {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id) {
        if ($id) {
            $db = Db::getConnection();
            $query = 'SELECT * FROM user WHERE id= :id';
            $res = $db->prepare($query);
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $res->execute();
            return $res->fetch();
        }
    }

    public static function edit($id, $name, $mail, $pass) {

        $db = Db::getConnection();

        $query = 'UPDATE user SET name = :name, mail = :mail, pass = :pass '
                . 'WHERE id = :id';

        $res = $db->prepare($query);

        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':mail', $mail, PDO::PARAM_STR);
        $res->bindParam(':pass', $pass, PDO::PARAM_STR);

        return $res->execute();
    }

}





