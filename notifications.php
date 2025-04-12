<?php
require_once 'db.php';

// Function to add a new notification
function addNotification($userId, $title, $message) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("INSERT INTO notifications (user_id, title, message, is_read, created_at) VALUES (?, ?, ?, 0, NOW())");
        $stmt->execute([$userId, $title, $message]);
        
        return ['success' => true, 'message' => 'Notification added successfully'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to add notification: ' . $e->getMessage()];
    }
}

// Function to mark notification as read
function markNotificationAsRead($notificationId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1, read_at = NOW() WHERE id = ?");
        $stmt->execute([$notificationId]);
        
        return ['success' => true, 'message' => 'Notification marked as read'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to mark notification as read: ' . $e->getMessage()];
    }
}

// Function to get user notifications
function getUserNotifications($userId, $limit = 10, $offset = 0) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("
            SELECT * FROM notifications 
            WHERE user_id = ? 
            ORDER BY created_at DESC 
            LIMIT ? OFFSET ?
        ");
        $stmt->execute([$userId, $limit, $offset]);
        
        return ['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to fetch notifications: ' . $e->getMessage()];
    }
}

// Function to get unread notification count
function getUnreadNotificationCount($userId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0");
        $stmt->execute([$userId]);
        
        return ['success' => true, 'count' => $stmt->fetchColumn()];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to get notification count: ' . $e->getMessage()];
    }
}

// Function to delete a notification
function deleteNotification($notificationId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("DELETE FROM notifications WHERE id = ?");
        $stmt->execute([$notificationId]);
        
        return ['success' => true, 'message' => 'Notification deleted successfully'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to delete notification: ' . $e->getMessage()];
    }
}

// Function to mark all notifications as read
function markAllNotificationsAsRead($userId) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1, read_at = NOW() WHERE user_id = ? AND is_read = 0");
        $stmt->execute([$userId]);
        
        return ['success' => true, 'message' => 'All notifications marked as read'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Failed to mark notifications as read: ' . $e->getMessage()];
    }
} 