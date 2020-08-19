<?php

/**
 * Further TODO: try to use PDO instead of mysqli library.
 * Further TODO: MySQL migrations for creating standard SQL dbs and tables.
 */
class Connection {
    function __construct($query, $data=NULL, $database=NULL){

        /**
         * Setting up MySQL connection properties.
         */
        if($this->HOST)	   { $this->host = $this->HOST; 		}
		else 		   	   { $this->host = HOST; 				}
		if($this->DATABASE){ $this->database = $this->DATABASE; }
		else 			   { $this->database = DATABASE; 		}
		if($this->USER)	   { $this->user = $this->USER; 		}
		else 		   	   { $this->user = USERNAME;    		}
		if($this->PASS)	   { $this->pass = $this->PASS; 		}
		else 		   	   { $this->pass = PASSWORD; 			}

        /**
         * Initializing MySQL connection.
         */
        $this->data = array();
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->database
        ) or die(mysqli_error($this->connection));

        /**
         * Setting up initial data, cleaning
         * it from special characters for proper
         * using in SQL queries.
         */
        if($data !== NULL){
            if($this->isAssociative($data)){
                foreach($data as $key => $value){
                    $data[$key] = mysqli_real_escape_string($this->connection, $value);
                }
            } else {
                foreach($data as $value){
                    $value = mysqli_real_escape_string($this->connection, $value);
                }
            }
        }

        $this->data = $query($this->connection, $data);
        
    }

    private function isAssociative($array){
        if(array() === $array) return false;
        return array_keys($array) !== range(0, count($array) - 1);
    }

    function __destruct(){
        mysqli_close($this->connection);
    }
}

?>
