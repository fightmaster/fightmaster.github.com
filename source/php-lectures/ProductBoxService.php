<?php
class ProductBoxService
{
    public function save(ProductBox $productBox)
    {
        try {
            $this->connection->beginTransaction();
            //insert
            throw new \Exception("Error Processing Request", 1);        
            //insert
            throw new \Exception("Error Processing Request", 1);
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollback();
            //logger
        }
    }
}