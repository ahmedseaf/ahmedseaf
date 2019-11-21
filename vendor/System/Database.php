<?php


namespace System;

use PDO;
use PDOException;


class Database
{

    private static $connection;
    private $app;
    private $table;

    private $data = [];

    private $bindings = [];


    private $wheres = [];

    private $selects = [];

    private $joins = [];

    private $limit;

    private $offset;

    private $rows = 0;

    private $orderBy = [];

    private $lastId;


    public function __construct(Application $app)
    {
        $this->app = $app;

        if (! $this->isConnected()) {
            $this->connect();
        }
    }

    private function isConnected()
    {
        return static::$connection instanceof PDO;
    }

    private function connect()
    {

        $connectionDatat = $this->app->file->getTheFile('config.php');

        try {
            static::$connection = new PDO('mysql:host='
                . $connectionDatat['server'] . ';dbname='
                . $connectionDatat['dbname'], $connectionDatat['dbuser'],
                $connectionDatat['dbpass']);


            static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            static::$connection->exec('SET NAMES utf8');

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        //echo $this->isConnected();
    }

    public function connection()
    {
        return static::$connection;
    }

    public function select(...$select)
    {
        $selects = func_get_args();

        $this->selects = array_merge($this->selects, $selects);
        return $this;
    }

    public function insert($table = null)
    {
        if ($table) {
            $this->table($table);
        }

        $sql = 'INSERT INTO ' . $this->table . ' SET ';

        $sql .= $this->setFields();


        $this->query($sql, $this->bindings);

        $this->lastId = $this->connection()->lastInsertId();

        $this->reset();

        return $this;

    }

    public function update($table = null)
    {
        if ($table) {
            $this->table($table);
        }

        $sql = 'UPDATE ' . $this->table . ' SET ';

        $sql .= $this->setFields();

        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }


        $this->query($sql, $this->bindings);

        $this->reset();

        return $this;

    }

    public function delete($table = null)
    {
        if ($table) {
            $this->table($table);
        }

        $sql = 'DELETE FROM ' . $this->table . ' ';


        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }


        $this->query($sql, $this->bindings);

        $this->reset();

        return $this;

    }

    public function from($table)
    {

        return $this->table($table);
    }

    public function where()
    {
        $bindings = func_get_args();

        $sql = array_shift($bindings);

        $this->addToBindings($bindings);

        $this->wheres[] = $sql;

        return $this;
    }

    public function table($table)
    {
        $this->table = $table;

        return $this;
    }

    public function fetch($table = null)
    {
        if ($table) {
            $this->table($table);
        }

        $sql = $this->fetchStatement();

        $result = $this->query($sql, $this->bindings)->fetch();

        $this->reset();

        return $result;
    }

    public function fetchAll($table = null)
    {
        if ($table) {
            $this->table($table);
        }

        $sql = $this->fetchStatement();

        $query = $this->query($sql, $this->bindings);

        $results = $query->fetchAll();

        $this->rows = $query->rowCount();

        $this->reset();

        return $results;
    }

    private function fetchStatement()
    {
        $sql = 'SELECT ';

        if ($this->selects) {
            $sql .= implode(',', $this->selects);
        } else {
            $sql .= '*';
        }

        $sql .= ' FROM ' . $this->table . ' ';

        if ($this->joins) {
            $sql .= implode(' ', $this->joins);
        }

        if ($this->wheres) {
            $sql .= ' WHERE ' . implode(' ', $this->wheres);
        }
        if ($this->limit) {
            $sql .= ' LIMIT ' . $this->limit;
        }

        if ($this->offset) {
            $sql .= ' OFFSET ' . $this->offset;
        }

        if ($this->orderBy) {
            $sql .= ' ORDER BY ' . implode(' ', $this->orderBy);
        }

        return $sql;

    }

    public function data($key, $value = null)
    {
        if (is_array($key)) {
            $this->data = array_merge($this->data, $key);

            $this->addToBindings($key);
        } else {
            $this->data[$key] = $value;

            $this->addToBindings($value);

        }

        return $this;
    }

    private function addToBindings($value)
    {
        if (is_array($value)) {
            $this->bindings = array_merge($this->bindings, array_values($value));
        } else {
            $this->bindings[] = $value;

        }
    }

    private function reset()
    {
        $this->limit = null;
        $this->offset = null;
        $this->table = null;
        $this->data = [];
        $this->joins = [];
        $this->wheres = [];
        $this->orderBy = [];
        $this->selects = [];
        $this->bindings = [];

    }

    private function setFields()
    {
        $sql = '';

        foreach (array_keys($this->data) as $key) {
            $sql .= $key . '= ? , ';
        }

        $sql = rtrim($sql, ', ');

        return $sql;

    }

    public function query()
    {
        $bindings = func_get_args();

        $sql = array_shift($bindings);

        if (count($bindings) == 1 AND is_array($bindings[0])) {
            $bindings = $bindings[0];
        }

        try {
            $query = $this->connection()->prepare($sql);

            foreach ($bindings as $key => $value) {
                $query->bindValue($key + 1, _e($value));
            }

            $query->execute();


            return $query;
        } catch (PDOException $e) {
            echo $sql;

            pre($this->bindings);

            die($e->getMessage());
        }


    }

    public function lastId()
    {
        return $this->lastId;
    }

    public function orderBy($orderBy, $sorted = 'ASC')
    {
        $this->orderBy = [$orderBy, $sorted] ;

        return $this;
    }

    public function join($join)
    {
        $this->joins[] = $join;
        return $this;
    }

    public function limit($limit, $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;

        return $this;
    }

    public function rows()
    {
        return $this->rows;
    }




}