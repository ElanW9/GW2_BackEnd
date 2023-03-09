<?php

class Product
{

    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getProducts()
    {

        $sql = "SELECT *  FROM product ";
        return $this->db->executeQuery($sql);
    }
}
