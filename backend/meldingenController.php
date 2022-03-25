<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];
if(isset($_POST['prioriteit']));
{
    $prioriteit = true
}
else 
{
    $prioriteit = false
}
$melder = $_POST['melder'];
$melder = $_POST['overig'];
echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder)
VALUE(:attractie, :capaciteit, :melder)";

//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit
    ":medler" => $melder
]);

$items = $statement->fetchALL(PDO::FETCH_ASSOC);

header("Location:../meldingen/index.php?msg=Meldingopgeslagen");
