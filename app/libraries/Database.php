<?php

    /*
    * PDO database Class
    * nak connect ke database
    * nak create prepared statement
    * nak bind values
    * nak return vows dan results
    */

    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            //nak set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //nak create pdo instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //prepare statement dgn query
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        //bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        //nak execute prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

        //nak dapatkan result set as array of object
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //nak dapatkan single record as object
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //nak dapatkan row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }