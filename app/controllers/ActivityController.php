<?php

namespace App\controllers;

use App\models\Activity;
use App\config\Database;
use App\models\Client;

class ActivityController {
    private $activityModel;
    private $clientModel;
    private $renderer;
    
    public function __construct() {
        $this->activityModel = new Activity(Database::getInstance());
        $this->clientModel = new Client(Database::getInstance());
        $this->renderer = new \Devanych\View\Renderer(__DIR__ . '/../views');
    }
    
    public function addActivityView() {
        echo $this->renderer->render('layouts/header');
        
        $clientId = $_GET['client_id'] ?? 0;
        $clientList = $this->clientModel->getAllClients();
        
        $activityId = $_GET['activity_id'] ?? 0;
        $activity = $this->activityModel->getById($activityId);
        
        $dataToPass = [
            'clientList' => $clientList
        ];
        
        if ($clientId) {
            $dataToPass['clientId'] = $clientId;
        }
        
        if ($activity) {
            $dataToPass['activity'] = $activity;
        }
        
        echo $this->renderer->render('activity/activity-form', $dataToPass);
        echo $this->renderer->render('layouts/footer');
    }
}
