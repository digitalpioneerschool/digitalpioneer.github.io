<?php
require_once 'db.php';

// Function to register a new user
function registerUser($fullname, $email, $password) {
    global $pdo;
    
    // Validate input
    if (empty($fullname) || empty($email) || empty($password)) {
        return ['success' => false, 'message' => 'All fields are required'];
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'Invalid email format'];
    }
    
    // Check if email already exists
    try {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'Email already registered'];
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (fullname, email, password, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$fullname, $email, $hashedPassword]);
        
        return ['success' => true, 'message' => 'Registration successful'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
    }
}

// Function to login user
function loginUser($email, $password) {
    global $pdo;
    
    // Validate input
    if (empty($email) || empty($password)) {
        return ['success' => false, 'message' => 'Email and password are required'];
    }
    
    try {
        // Get user by email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            return ['success' => false, 'message' => 'Invalid email or password'];
        }
        
        // Verify password
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'Invalid email or password'];
        }
        
        // Set session
        $_SESSION['user_id'] = $user['id'];
        
        return ['success' => true, 'message' => 'Login successful'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Login failed: ' . $e->getMessage()];
    }
}

// Function to logout user
function logoutUser() {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    return ['success' => true, 'message' => 'Logged out successfully'];
}

// Function to update user profile
function updateUserProfile($userId, $fullname, $email, $currentPassword = null, $newPassword = null) {
    global $pdo;
    
    try {
        // Get current user data
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            return ['success' => false, 'message' => 'User not found'];
        }
        
        // Check if email is being changed
        if ($email !== $user['email']) {
            // Verify if new email is already taken
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->execute([$email, $userId]);
            if ($stmt->fetch()) {
                return ['success' => false, 'message' => 'Email already taken'];
            }
        }
        
        // If password is being changed
        if ($newPassword) {
            if (!$currentPassword) {
                return ['success' => false, 'message' => 'Current password is required to change password'];
            }
            
            // Verify current password
            if (!password_verify($currentPassword, $user['password'])) {
                return ['success' => false, 'message' => 'Current password is incorrect'];
            }
            
            // Hash new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Update with new password
            $stmt = $pdo->prepare("UPDATE users SET fullname = ?, email = ?, password = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$fullname, $email, $hashedPassword, $userId]);
        } else {
            // Update without changing password
            $stmt = $pdo->prepare("UPDATE users SET fullname = ?, email = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$fullname, $email, $userId]);
        }
        
        return ['success' => true, 'message' => 'Profile updated successfully'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Profile update failed: ' . $e->getMessage()];
    }
} 