<?php

namespace App\controllers\api;

use App\models\Client;
use App\config\Database;

class ClientApiController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client(Database::getInstance());
    }

    public function createClient() {
        header('Content-Type: application/json');
        $_POST = json_decode(file_get_contents("php://input"), true) ?: $_POST;
        
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $note = $_POST['note'];
            
            $result = $this->clientModel->create($name, $email, $phone, $note);
            
            if ($result) {
                http_response_code(200);
                echo json_encode(["message" => "Client created successfully", "id" => $result]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Client creation failed"]);
            }
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Incomplete data"]);
        }
    }
    
    public function updateClient() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        
        try {
            if (!empty($data['id']) && !empty($data['name']) && !empty($data['email']) && !empty($data['phone'])) {
                $result = $this->clientModel->update($data['id'], $data['name'], $data['email'], $data['phone'], $data['note']);
                http_response_code(200);
                echo json_encode(["message" => "Client updated successfully"]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Incomplete data"]);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["message" => "Update failed: " . $e->getMessage()]);
        }
    }
    
    public function deleteClient() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        
        try {
            if (!empty($data['id'])) {
                $result = $this->clientModel->delete($data['id']);
                if ($result) {
                    http_response_code(200); // OK
                    echo json_encode(["message" => "Client deleted successfully"]);
                } else {
                    http_response_code(404); // Not Found
                    echo json_encode(["message" => "Client not found or already deleted"]);
                }
            } else {
                http_response_code(400); // Bad Request
                echo json_encode(["message" => "Missing client ID"]);
            }
        } catch (Exception $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["message" => "Deletion failed: " . $e->getMessage()]);
        }
    }
    
    
}
