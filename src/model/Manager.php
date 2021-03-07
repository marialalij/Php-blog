<?php
namespace App\src\model;
use PDO;
use Exception;

//Class Manager database connection 
abstract class Manager
{
    private $connection;   
//Return the current connection to the database, created if necessary

    private function checkConnection()
    {
        if($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    } 
    
/**
*Establishment of the connection to the database, the data of
*configuration are contained in the dev.php fil
*/
    private function getConnection()
    {
       
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        catch(Exception $errorConnection)
        {
            'Erreur de connection :'.$errorConnection->getMessage();
        }
    }

    
/**
* Creation of a query and execution on the database. With or without parameters.
* @param $sql string Textual sql request to perform
* @param null $parameters Query parameters for prepared query.
*/

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }
}