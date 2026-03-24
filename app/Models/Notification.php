<?php
class Notification {
    private $conn;
    private $table = 'notifications';
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Buat notifikasi baru
    public function create($user_id, $type, $title, $message, $data = null) {
        $query = "INSERT INTO " . $this->table . " 
                  (user_id, type, title, message, data) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $data_json = $data ? json_encode($data) : null;
        
        $stmt->bind_param("issss", $user_id, $type, $title, $message, $data_json);
        
        if($stmt->execute()) {
            return $this->conn->insert_id;
        }
        return false;
    }
    
    // Get notifikasi untuk user tertentu
    public function getUserNotifications($user_id, $limit = 20) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE user_id = ? 
                  ORDER BY created_at DESC 
                  LIMIT ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Get unread notifications count
    public function getUnreadCount($user_id) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " 
                  WHERE user_id = ? AND is_read = FALSE";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        return $row['count'];
    }
    
    // Mark notifikasi as read
    public function markAsRead($notification_id, $user_id) {
        $query = "UPDATE " . $this->table . " 
                  SET is_read = TRUE 
                  WHERE id = ? AND user_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $notification_id, $user_id);
        return $stmt->execute();
    }
    
    // Mark all as read
    public function markAllAsRead($user_id) {
        $query = "UPDATE " . $this->table . " 
                  SET is_read = TRUE 
                  WHERE user_id = ? AND is_read = FALSE";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        return $stmt->execute();
    }
}
?>