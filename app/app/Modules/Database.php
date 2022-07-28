<?php


namespace App\Modules;

// move to .env
const DB_HOST = 'mysql';
const DB_USER = 'root';
const DB_PASS = 'password';
const DB_NAME = 'db';


class Database
{
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASS;
    private string $dbname = DB_NAME;

    /**
     * @var \PDO
     */
    private \PDO $dbh;

    /**
     * @var mixed
     */
    private mixed $stmt;

    /**
     * @var string
     */
    private string $error;


    public function __construct()
    {
        // set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );

        // create PDO instance
        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * @param $sql
     * @return void
     */
    public function query($sql): void
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * @param $param
     * @param $value
     * @param $type
     * @return void
     */
    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * @return mixed
     */
    public function execute(): mixed
    {
        return $this->stmt->execute();
    }

    /**
     * @return mixed
     */
    public function resultSet(): mixed
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function single(): mixed
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function rowCount(): mixed
    {
        return $this->stmt->rowCount();
    }
}