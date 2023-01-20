<?php

class QueryBuilder extends Connection
{

    public function queryFetchAll(string $sql, array $data)
    {

        $query = $this->db->prepare($sql);
        if (count($data) === 0) {
            $query->execute();
        } else {
            $query->execute($data);
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function queryFetch(string $sql, array $data)
    {

        $query = $this->db->prepare($sql);
        if (count($data) === 0) {
            $query->execute();
        } else {
            $query->execute($data);
        }
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectOne($table, $by, $value)
    {
        $sql = "SELECT * FROM $table WHERE $by = :value";
        $query = $this->db->prepare($sql);
        $query->execute(["value" => $value]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function selectBy($table, $by, $value, $className)
    {
        $sql = "SELECT * FROM $table WHERE $by = :value";
        $query = $this->db->prepare($sql);
        $query->execute(["value" => $value]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

}

$Query = new QueryBuilder(config);