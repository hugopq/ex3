<?php
    include "./classes/product.php";
    session_start();
    $products = $_SESSION['products'];
    product::initiClass();

    $id = 0;
    if(array_key_exists('id',$_POST))
    {
        $id = $_POST['id'];
    }
    $name = "";
    if(array_key_exists('name',$_POST))
    {
        $name = $_POST['name'];
    }
    $desc = "";
    if(array_key_exists('desc',$_POST))
    {
        $desc = $_POST['desc'];
    }
    $value = "";
    if(array_key_exists('value',$_POST))
    {
        $value = $_POST['value'];
    }

    if($id != 0)
    {
        foreach($products as $product)
        {
            if($product->id == $id)
            {
                $product->name = $name;
                $product->description = $desc;
                $product->value = $value;            
            }
        }
    }
    else
    {
        $product = new product($name, $desc, $value);
        array_push($products, $product);
    }

    $_SESSION['products'] = $products; 
    header("location: ./");
