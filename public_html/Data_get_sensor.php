<?php
    header('Content-Type: application/json');
    $pdo=new PDO("mysql:dbname=pt_ii;host=127.0.0.1","root","");
    switch($GET ['q']){
        //Busca last dato
       case 1:
        $statement =$pdo ->prepare("SELECT Temperatura,Humedad from sensores ORDER BY Id_Medicion LIMIT 0,1");
        $statement->execute();
        $results =$statement->fetchAll(PDO::FETCH_ASSOC);
        $json= json_encode($results);
        echo $json;
        break;
        default: //busca todos los datos en la BD
            $statement=$pdo->prepare("SELECT Temperatura,Humedad from sensores ORDER BY Id_Medicion");
            $statement->execute();
            $results= $statement->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            echo $json;
            break;
    }

    ?>
