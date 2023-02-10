<?php

class DB {
    static $db = null;

    static function connect() {
        if (!self::$db) {
            $con = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4', 'root', '');
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db = $con;
        }
        return self::$db;
    }

    static function exec($query) {
        try {
            self::connect()->exec($query);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static function fetch($query) {
        $stmt = self::connect()->query($query);
        return $stmt->fetch();
    }

    static function fetchAll($query) {
        $stmt = self::connect()->query($query);
        return $stmt->fetchAll();
    }

    static function lastInsertId() {
        return DB::connect()->lastInsertId();    }
}
