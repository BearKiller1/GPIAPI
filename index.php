<?php
require_once 'config.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $stmt = $pdo->query('SELECT * FROM users');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    break;
    case 'POST':
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        if(empty($name) || empty($password)){
            echo json_encode(['message' => 'All fields are required']);
            return;
        } 

        $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        $stmt->execute([$name, $password]);
        
        echo json_encode(['message' => 'User added successfully']);
    break;
    case 'PUT':
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare('UPDATE users SET username=?, password=? WHERE id=?');
        $stmt->execute([$name, $password, $id]);

        echo json_encode(['message' => 'User updated successfully']);
    break;
    case 'DELETE':
        $id = $_REQUEST['id'];
        
        $stmt = $pdo->prepare('DELETE FROM users WHERE id=?');
        $stmt->execute([$id]);
        
        echo json_encode(['message' => 'User deleted successfully']);
    break;
}

?>