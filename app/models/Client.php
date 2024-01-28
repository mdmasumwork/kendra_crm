<?php

namespace App\Models;

use App\Config\Database;
use Exception;
use App\models\Activity;

class Client {
    private $db;
    private $activityModel;
    
    public function __construct($db) {
        $this->db = $db;
        $this->activityModel = new Activity(Database::getInstance());
    }
    
    public function create($name, $email, $phone, $note) {
        $sql = "INSERT INTO clients (name, email, phone, note) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $phone);
            $stmt->bindParam(4, $note);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
        return $this->db->lastInsertId();
    }
    
    public function update($id, $name, $email, $phone, $note) {
        $sql = "UPDATE clients SET name = ?, email = ?, phone = ?, note = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $phone);
            $stmt->bindParam(4, $note);
            $stmt->bindParam(5, $id, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
        return $stmt->rowCount();
    }
    
    
    public function getById($id) {
        $sql = "SELECT * FROM clients WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo()[2]);
        }
        
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->errorInfo()[2]) {
            throw new Exception($stmt->errorInfo()[2]);
        }
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getAllClients() {
        $sql = "SELECT * FROM clients";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function delete($id) {
        
        $this->activityModel->deleteByClientId($id);
        
        // Then, delete the client
        $sql = "DELETE FROM clients WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    
}
