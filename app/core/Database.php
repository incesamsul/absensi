<?php

class Database
{
    protected $dbName = DB_NAME;
    protected $dbUser = DB_USER;
    protected $dbHost = DB_HOST;
    protected $dbPass = DB_PASS;

    protected $dbh;
    protected $stmt;

    public function __construct()
    {
        $dsn = "sqlsrv:server=" . $this->dbHost . ";Database=" . $this->dbName;
        $option = [
            // PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->dbUser, $this->dbPass, $option);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server: " . $e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function bind($param, $value, $tipe = null)
    {
        if (is_null($tipe)) {
            switch (true) {
                case is_int($value):
                    $tipe = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $tipe = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $tipe = PDO::PARAM_NULL;
                    break;
                default:
                    $tipe = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $tipe);
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
