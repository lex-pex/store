<?php


class Db {

    public static function getConnection() {

        $paramsFile = ROOT.'/config/db_params.php';
        $params = include($paramsFile);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['pass']);
        $db->exec("set names utf8");

        return $db;
    }
}










