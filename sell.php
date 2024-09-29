<?php
    include "./classes/product.php";
    session_start();
    $products = $_SESSION['products'];
    product::initiClass();

    $id = 0;
    if(array_key_exists('p',$_GET))
    {
        $id = $_GET['p'];
    }

    if($id != 0)
    {
        foreach($products as $product)
        {
            if($product->id == $id)
            {
                if( $product->stock > 0)
                    $product->stock--;          
            }
        }
    }
    
    $_SESSION['products'] = $products; 
    header("location: ./");