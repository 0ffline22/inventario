<?php
$host = "localhost";
$user = "root";
$pass = "roblero14";
$db   = "inventario_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Retorna los usuarios registrados en MySQL en formato JSON
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_users') {
    $result = $conn->query("SELECT u.id, u.username, u.password, r.nombre AS rol FROM usuarios u JOIN roles r ON u.rol_id = r.id");
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
}
?>
