<?php

trait Model
{
    use Database;

    protected $limit        = 10;
    protected $offset       = 0;
    protected $order_type   = 'desc';
    protected $order_column = 'id';
    public $errors          = [];

    public function findAll()
    {
        $query = 'SELECT * FROM ' . $this->table;
        return $this->query($query);
    }

    //get all the row on our database
    public function where($keys, $not_key = [])
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ';
        $query .= trim(getKeysFromData($keys, ' = :') . getKeysFromData($not_key, ' = :'), ' && ')
            . ' order by' . $this->order_column . $this->order_type . ' limit ' . $this->limit . ' offset ' . $this->offset;

        $this->query($query, $keys);
        return false;
    }

    //get one  row on our database
    public function first($keys)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ';
        $query .= trim(getKeysFromData($keys, ' = :'), ' && ');

       $result = $this->query($query, $keys);
       if ($result) {
           return $result[0];
       }
       return false;
    }

    public function insert($data)
    {
        // remove unwanted data
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(",", $keys) . ') VALUES (:' . implode(",:", $keys) . ')';

        $this->query($query, $data);
        return false;
    }

    public function update($id, $data, $id_column = 'id')
    {
        // remove unwanted data
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $query = ' UPDATE ' . $this->table . ' SET ';
        $query .= trim(setEqualForIDS($data, ' = :'), ', ') . ' WHERE ' . $id_column . ' = :' . $id_column;
        $data[$id_column] = $id;
        $this->query($query, $data);
    }

    public function delete($id, $id_column = 'id')
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $id_column . ' = :' . $id_column;
        $this->query($query, $id);

        return false;
    }
}