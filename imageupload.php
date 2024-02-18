<?php
header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['imagePath'])) {
    $imagePath = $_POST['imagePath'];

    // Assuming you have a MySQL database connection
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'user_personal';

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Database connection error.';
    } else {
        // Save image path to the database
        $sql = "INSERT INTO user_table(Image) VALUES ('$imagePath')";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Image path inserted into the database.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating database.';
        }

        $conn->close();
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request.';
}

echo json_encode($response);
?>