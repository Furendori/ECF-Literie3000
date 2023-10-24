<?php
class ModifyMatelasModel
{
    public $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}
?>