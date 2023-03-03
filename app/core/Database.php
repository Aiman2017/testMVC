<?php

trait Database
{

    private function connect()
    {
        try {
            return new PDO("mysql:hostname={DBHOST};dbname=" . DBNAME, USER, PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query, $data = [])
    {
        $connection = $this->connect();
        $statement = $connection->prepare($query);
        $check = $statement->execute($data);
        if ($check) {
            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            if (is_array($result)) {
                return $result;
            }
        }
        return false;
    }

}