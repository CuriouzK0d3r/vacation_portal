<?php

/**
 * Generic database class for handling DB operations.
 * Uses MySqli and PreparedStatements.
 */
class Database
{
    private static $instance = null;
    private const USERNAME = 'root';
    private const PASSWORD = 'mysql';
    private const DATABASE_NAME = 'vacation_db';

    private $conn;

    /**
     * PHP implicitly takes care of cleanup for default connection types.
     * So no need to worry about closing the connection.
     * The db connection is established in the private constructor.
     */
    private function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=' . self::DATABASE_NAME, self::USERNAME,self::PASSWORD);
    }

    /**
     * Implements the singleton design pattern. Guarantees that there is only one active instance of the Database at runtime.
     * @return Database|null
     */
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    
    /**
     * To get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function select($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);

        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (! empty($resultset)) {
            return $resultset;
        }
    }

    /**
     * To insert
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function insert($query, $paramType, $paramArray)
    {
        print $query;
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);
        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    /**
     * To execute query
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);

        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType="", $paramArray=array());
        }
        $stmt->execute();
    }

    /**
     * 1. Prepares parameter binding
     * 2. Bind prameters to the sql statement
     * @param string $stmt
     * @param string $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, $paramType, $paramArray=array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }

    /**
     * To get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function numRows($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);

        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }

        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;
        return $recordCount;
    }
}
