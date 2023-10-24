<?php
class ModifyMatelasView
{
    public $controller;
    public $template;

    public function __construct(ModifyMatelasController $controller)
    {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "modifyMatelas.php";
    }

    public function render()
    {
        require($this->template);
    }
}
?>