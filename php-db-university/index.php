<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Departments.php';

$sql = "SELECT * FROM departments";

$result = $connection -> query($sql);

if( ( $result ) && ( $result->num_rows > 0 ) ){

    $departments = [];

    while( $row = $result->fetch_assoc() ){

        $department = new Departments();

        $department -> id = $row["id"];
        $department -> name = $row["name"];
        $department -> address = $row["address"];
        $department -> phone = $row["phone"];
        $department -> email = $row["email"];
        $department -> website = $row["website"];
        $department -> head_of_department = $row["head_of_department"];

        $departments[] = $department;

    }

} elseif( ( $result ) && ( $result->num_rows === 0 ) ) {

    echo "Non ci sono risultati per questa pagina";

} else {

    echo "Errore di query";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>

        <ul>

            <?php foreach( $departments as $department ){ ?>
                
                <li> <a href="department-details.php?id=<?php echo $department->id ?>"><?php echo $department->name; ?></a> </li>
                
            <?php } ?>

        </ul>

    </div>
    
</body>
</html>
