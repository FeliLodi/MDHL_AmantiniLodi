<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscripcion";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

// Verificar si los datos están presentes antes de intentar acceder a ellos
$data = json_decode(file_get_contents('php://input'), true);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $streetaddress = $data['streetaddress'];
    $city = $data['city'];
    $zipcode = $data['zipcode'];
    $birthdate = $data['birthdate'];
    $id = $data['id'];

    if ($method === 'POST') {
    
        $insertQuery = "INSERT INTO formmdhl(firstname, lastname, streetaddress, city, zipcode, birthdate, id) VALUES ('$firstname', '$lastname', '$streetaddress', '$zipcode', '$city', '$birthdate', '$id')";
        
        if (mysqli_query($connection, $insertQuery)) {
            $response = array('status' => 'success', 'message' => 'Datos insertados correctamente');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error al insertar datos: ' . mysqli_error($connection));
            echo json_encode($response);
        }
    }
    mysqli_close($connection);
?>