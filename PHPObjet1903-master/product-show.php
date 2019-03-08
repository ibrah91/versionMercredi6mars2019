<?php
use Classes\Database\Connection;
require 'autoloader.php';
////Logique


//Instanciation (new)de "Connection"
$connexion = new Connection();

//Appel de la méthode "preparedQuery"
$product = $connexion->preparedQuery();

////HTML


//header
require 'header.php';


//Affichage des proprétés du produit 
?>

    <main class="container">
        <p><?= $product[0]['name'] ?></p>
        

        <p><?= $product[0]['description'] ?></p>
        

        <p><?= $product[0]['price'] ?></p>
        
    </main>
<?php
var_dump($product);
//footer
require 'footer.html';
?>