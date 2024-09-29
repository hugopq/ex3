<?php
    include("./classes/product.php");
    session_start();

    $products = array();
    if(array_key_exists('products',$_SESSION))
    {
        $products = $_SESSION['products'];        
    }
    else
    {
        $_SESSION['products'] = $products; 
    }
?>
<!DOCTYPE html>
<head>
    <title>Exercício 2 - PHP</title>
</head>
<body>
    <h1>Exercício 2 - PHP</h1>

    <ul>
        <li>
            <a href="./product.php">Novo Produto</a>
        </li>
        <?php
            foreach($products as $product)
            {
                print $product->toHTML_LI();
            }
            
        ?>
        <li>
            <a href="./clear.php">Limpar Sessão</a>
        </li>
    </ul>

    
</body>
</html>