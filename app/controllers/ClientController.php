<?php

namespace App\controllers;

use App\models\Client;
use App\models\Activity;
use App\config\Database;

class ClientController {
    private $clientModel;
    private $activityModel;
    private $renderer;
    
    public function __construct() {
        $this->clientModel = new Client(Database::getInstance());
        $this->activityModel = new Activity(Database::getInstance());
        $this->renderer = new \Devanych\View\Renderer(__DIR__ . '/../views');
    }
    
    public function clientView() {
        echo $this->renderer->render('layouts/header');
        $id = $_GET['id'] ?? 0;
        
        if ($id == null) {
            $clients = $this->clientModel->getAllClients();
            echo $this->renderer->render('clients/client-list', ['clients' => $clients]);
        } else {
            $client = $this->clientModel->getById($id);
            $activities = $this->activityModel->getByClientId($id);
            echo $this->renderer->render('clients/view', ['client' => $client, 'activities' => $activities]);
        }
        echo $this->renderer->render('layouts/footer');
    }
    
    public function addClientView() {
        echo $this->renderer->render('layouts/header');
        echo $this->renderer->render('clients/add');
        echo $this->renderer->render('layouts/footer');
    }
    
    public function updateClientView() {
        echo $this->renderer->render('layouts/header');
        $id = $_GET['id'] ?? 0;
        
        $client = $this->clientModel->getById($id);
        echo $this->renderer->render('clients/update', ['client' => $client]);
        echo $this->renderer->render('layouts/footer');
    }
}
