<?php

namespace App\controllers\api;

use App\models\Activity;
use App\config\Database;
use Exception;

class ActivityApiController {
    private $activityModel;
    
    public function __construct() {
        $this->activityModel = new Activity(Database::getInstance());
    }
    
    public function createActivity() {
        header('Content-Type: application/json');
        
        $data = json_decode(file_get_contents("php://input"), true);
        error_log("Received data: " . print_r($data, true));
        
        try {
            if (!empty($data['client_id']) && !empty($data['activity_type']) && !empty($data['activity_date']) && !empty($data['status'])) {
                $result = $this->activityModel->create($data['client_id'], $data['activity_type'], $data['activity_date'], $data['notes'], $data['status']);
                http_response_code(201); // Created
                echo json_encode(["message" => "Activity created successfully", "id" => $result]);
            } else {
                http_response_code(400); // Bad Request
                echo json_encode(["message" => "Incomplete data for creating an activity"]);
            }
        } catch (Exception $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["message" => "Failed to create activity: " . $e->getMessage()]);
        }
    }
    
    public function updateActivity() {
        header('Content-Type: application/json');
        
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            if (!empty($data['id']) && !empty($data['client_id']) && !empty($data['activity_type']) && !empty($data['activity_date']) && !empty($data['notes']) && !empty($data['status'])) {
                $result = $this->activityModel->update($data['id'], $data['client_id'], $data['activity_type'], $data['activity_date'], $data['notes'], $data['status']);
                if ($result) {
                    http_response_code(200); // OK
                    echo json_encode(["message" => "Activity updated successfully"]);
                } else {
                    http_response_code(404); // Not Found
                    echo json_encode(["message" => "Activity not found or no changes made"]);
                }
            } else {
                http_response_code(400); // Bad Request
                echo json_encode(["message" => "Incomplete data for updating an activity"]);
            }
        } catch (Exception $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["message" => "Failed to update activity: " . $e->getMessage()]);
        }
    }
    
    public function deleteActivity() {
        header('Content-Type: application/json');
        
        try {
            $data = json_decode(file_get_contents("php://input"), true);
            if (!empty($data['id'])) {
                $result = $this->activityModel->delete($data['id']);
                if ($result > 0) {
                    http_response_code(200); // OK
                    echo json_encode(["message" => "Activity deleted successfully"]);
                } else {
                    http_response_code(404); // Not Found
                    echo json_encode(["message" => "Activity not found or already deleted"]);
                }
            } else {
                http_response_code(400); // Bad Request
                echo json_encode(["message" => "Missing activity ID"]);
            }
        } catch (Exception $e) {
            http_response_code(500); // Internal Server Error
            echo json_encode(["message" => "Failed to delete activity: " . $e->getMessage()]);
        }
    }
}
