<?php


class database {

        private $mysqli;
        private $result;
        
        public function __construct($host = "localhost", $user = "root", $password = "", $databaseName = "users") {
            $this->mysqli = mysqli_connect($host, $user, $password, $databaseName);
            if (!$this->mysqli) {
                die('ConnectError('. mysqli_error($this->mysqli).')');
            } else {
                // echo "Connected to DB server";
            }
        }
        
        public function destroy() {
            $this->mysqli->close();
        }
        
        public function doQuery($query) {
            // $result = $mysqli->query($query);
            $this->result = mysqli_query($this->mysqli, $query);
            if (!$this->result) {
                echo "Could not run Query ($query)" . mysqli_error($this->mysqli) . "\n";
            }  
            return mysqli_insert_id($this->mysqli); 
        }
        
        public function getData() {
            
            while ($val = mysqli_fetch_assoc($this->result)) {
                $returnSet[] = $val;
            }
            return $returnSet;
        }
        
        
        
/*
        public function getNumberOfRecords() {
            return mysqli_num_rows($this->result);
        }
 */
 
}

?>
