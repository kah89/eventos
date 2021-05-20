<?php

include("dbcontest.php");      

$pdo = Acesso::conexao();
$stmt = $pdo->prepare('SELECT * FROM t8s6k_users');
$stmt->execute();

print("Fetch all of the remaining rows in the result set:\n");
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
print_r($result);