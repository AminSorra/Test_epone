<?php

    class Database {
        private static $dbName = 'epone_test';
        private static $dbHost = 'localhost';
        private static $port = '3306';
        private static $dbUsername = 'root';
        private static $dbUserPassword = '';
        private static $cont = null;

        public static function connect() {
            if (self::$cont == null){
                try{
                    self::$cont = new PDO (
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";port=" . self::$port,
                    self::$dbUsername, self::$dbUserPassword

                    );
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
            
            return self::$cont;
        }

        public static function disconnect(){
            self::$cont = null;
        }
    }
?>