<?php
class AddMatelasController 
{
    private $model;

    public function __construct(AddMatelasModel $model)
    {
        $this->model = $model;
    }
}