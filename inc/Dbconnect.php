<?php 
try {
    $connect = new PDO('mysql:host=localhost;dbname=mma_news', 'root','' );
} catch (PDOException $e){
    echo "Echec connection";
}

