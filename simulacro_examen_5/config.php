<?php
// Datos de conexión
$host = "localhost";
$dbname = "fruta_temporada";
$user = "root";
$pass = "";

// Intentamos conectar con la base de datos usando PDO
try {
    // Creamos el objeto PDO con host, nombre BD y charset
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Activamos los errores para ver fallos claros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si falla la conexión, detenemos la ejecución
    die("Error de conexión: " . $e->getMessage());
}
?>
