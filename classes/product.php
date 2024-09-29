<?php
class product
{
    private static $lastId = 0;

    public $id = 0;
    public $name = "";
    public $description = "";
    public $value = 0.0;
    public $stock = 0;

    function __construct($pname, $pdescription, $pvalue)
    {
        product::$lastId++;
        $_SESSION['lastId'] = product::$lastId;
        $this->id = product::$lastId;

        $this->name = $pname;
        $this->description = $pdescription;
        $this->value = $pvalue;
    }

    public static function initiClass()
    {
        if(array_key_exists('lastId',$_SESSION))
        {
            product::$lastId = $_SESSION['lastId'];
        }
    }

    public function toHTML_LI()
    {
        $str = "";
        $str = "<li>";
        $str.= " Produto ".$this->id.": ".$this->name." - ".substr($this->description,0,15)."... - €".$this->value." STOCK: ".$this->stock;
        $str.= "<a href='./product.php?p=".$this->id."'> editar </a>";
        $str.= "<a href='./sbuy.php?p=".$this->id."'> comprar </a>";
        $str.= "<a href='./sell.php?p=".$this->id."'> vender </a>";
        $str.= "</li>";

        return $str;
    }
}
