<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit']; 
if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else 
{
    $prioriteit = false;
}
$melder = $_POST['melder'];
$overige_info = $_POST['overige_info'];
echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, prioriteit, capaciteit, melder, overige_info)
VALUE(:attractie, :type, :prioriteit, :capaciteit, :melder, :overige_info)";

//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overige_info
    
]);

$items = $statement->fetchALL(PDO::FETCH_ASSOC);

header("Location:../meldingen/index.php?msg=Meldingopgeslagen");
