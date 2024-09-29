<?php
    include("./classes/product.php");   
    session_start();

    $products = $_SESSION['products'];

    $id = 0;
    if(array_key_exists('p',$_GET))
    {
        $id = $_GET['p'];
    }

    $product = NULL;
    if($id != 0)
    {
        foreach($products as $pd)
        {
            if($pd->id == $id)
            {
                $product = $pd;            
            }
        }
    }
?>
<!DOCTYPE html>
<head>
    <title>Exercício 3 - PHP</title>
</head>
<body>
    <h1>Exercício 3 - PHP</h1>
    <h2><?php print ($id == 0)?"Novo Produto":"Editar Produto"; ?> 
        <a href="./">voltar</a>
    </h2>
    <form action="saveproduct.php" method="POST">
        <input type="hidden" name="id" value="<?php print $id; ?>">
        nome:<input type="text" name="name" <?php print (isset($product))?"value='".$product->name."'":""; ?>/><br>
        descrição:<input type="text" name="desc" <?php print (isset($product))?"value='".$product->description."'":""; ?>/><br>
        valor:<input type="number" name="value" <?php print (isset($product))?"value='".$product->value."'":""; ?>/><br>     
        <input type="submit" value="Criar">   
    </form>
</body>