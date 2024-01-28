<?php

namespace App\Models;

use Exception;
use PDOException;

class Activity {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function create($clientId, $activityType, $activityDate, $notes, $status) {
        $sql = "INSERT INTO activities (client_id, activity_type, activity_date, notes, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $clientId, \PDO::PARAM_INT);
            $stmt->bindParam(2, $activityType);
            $stmt->bindParam(3, $activityDate);
            $stmt->bindParam(4, $notes);
            $stmt->bindParam(5, $status);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
        return $this->db->lastInsertId();
    }
    
    
    public function getByClientId($clientId) {
        $sql = "SELECT * FROM activities WHERE client_id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo()[2]);
        }
        
        $stmt->bindParam(1, $clientId, \PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->errorInfo()[2]) {
            throw new Exception($stmt->errorInfo()[2]);
        }
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getById($activityId) {
        $sql = "SELECT * FROM activities WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo()[2]);
        }
        
        $stmt->bindParam(1, $activityId, \PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->errorInfo()[2]) {
            throw new Exception($stmt->errorInfo()[2]);
        }
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    
    public function update($activityId, $clientId, $activityType, $activityDate, $notes, $status) {
        $sql = "UPDATE activities SET client_id = ?, activity_type = ?, activity_date = ?, notes = ?, status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $clientId, \PDO::PARAM_INT);
            $stmt->bindParam(2, $activityType);
            $stmt->bindParam(3, $activityDate);
            $stmt->bindParam(4, $notes);
            $stmt->bindParam(5, $status);
            $stmt->bindParam(6, $activityId, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
        return $stmt->rowCount();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM activities WHERE id = ?";
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
    
    public function deleteByClientId($clientId) {
        $sql = "DELETE FROM activities WHERE client_id = ?";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception($this->db->errorInfo());
        }
        
        try {
            $stmt->bindParam(1, $clientId, \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
}
