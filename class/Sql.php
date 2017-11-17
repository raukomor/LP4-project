<?php
    
    
    class Sql extends PDO{
        private $conn;

        private function retriveDataConfig(){
            // read the .ini file and create an associative array
            
            return $db = parse_ini_file("config.ini");;
        }
        
        public function __construct(){
             /* reading .ini */
            $db = $this->retriveDataConfig();
            
            $user = $db['user'];
            $pass = $db['pass'];
            $name = $db['name'];
            $host = $db['host'];
            $type = $db['type'];
            
            
             /* Connect to a MySQL database using driver invocation */
            try {
                $this->conn = new PDO($type.":dbname=".$name.";host=".$host,$user,$pass);
                
            } catch (PDOException $e) {
                echo 'Connection failed: ' .$e->getMessage() ;
                
            }
        }

        private function setParams($statement, $parameters = array()){
            foreach ($parameters as $key => $value){
                $this->setParam($statement, $key, $value);
            }
        }

        private function setParam($statement, $key, $value){
            $statement->bindParam($key, $value);
        }

        public function query($rawQuery, $params = array()){
            $stmt = $this->conn->prepare($rawQuery);
            $this->setParams($stmt, $params);
            $stmt->execute();
            return $stmt;
        }

        public function select($rawQuery, $params = array()){//:array{
            $stmt = $this->query($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>