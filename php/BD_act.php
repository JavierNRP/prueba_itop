<?php
$user = 'root';
$password = '';
$database = 'bd_prueba_itop';
$port = 3306;
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_errno . " - " . $conn->connect_error);
}
echo var_dump($_GET);
switch ($_GET['request']) {
    case 'create':
        $sql = "INSERT INTO entity (borrado) VALUES (false)";
        $result = $conn->query($sql);
        $new_id = $conn->insert_id;
        $sql = "INSERT INTO actividades (id, nombre, fecha) VALUES (" . $new_id . ", " . $_GET['nombre'] . ", " . $_GET['fecha'] . ")";
        echo var_dump($sql);
        $result = $conn->query($sql);
        echo var_dump($result);
        $_GET['id'] = $new_id;
        echo var_dump($_GET['id']);
    case 'select':
        break;
    case 'update':
        if (isset($_GET['id'])) {
            $update = "";
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $sql = "DELETE FROM actividades where id=" . $_GET['id'] . ";";
            $result = $conn->query($sql);
            $_GET['id'] = NULL;
        }
        break;
    default:
}

$act_ids = array();
$sql = "SELECT id FROM actividades";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
    array_push($act_ids, $row['id']);

$id = isset($_GET['id']) ? $_GET['id'] : $act_ids[0];

$sql = "SELECT * FROM actividades where id=" . $id . ";";
$result = $conn->query($sql);
$select = $result->fetch_assoc();
$select['fecha'] = date_format(date_create_from_format('Y-m-d H:i:s', $select['fecha']),'Y-m-d');
include '../view/act.php';

$conn->close();
