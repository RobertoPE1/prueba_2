<?php
http_response_code(200);   // ←Mejor siempre al inicio del codigo de la API

require "../config.php"; // Conexión PDO

header("Content-Type: application/json");

// Consulta para obtener TODOS los registros
$sql = "SELECT * FROM fruta";
$stmt = $pdo->query($sql);

// Convertimos los resultados en array asociativo
$fruta = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolvemos el JSON
echo json_encode($fruta);
?>
