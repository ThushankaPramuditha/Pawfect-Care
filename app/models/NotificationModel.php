<?php

class NotificationModel{
    use Model;

    protected $table = 'notifications';

    protected $allowedColumns = ['id', 'user_id', 'message', 'status', 'created_at', 'type', 'appointment_id', 'receiver_id'];

    public function addNotification($data)
    {
        $query = "INSERT INTO notifications (user_id, receiver_id, message, type, appointment_id ,status) VALUES (:user_id,:receiver_id,:message, :type, :appointment_id, :status)";
    
        if (
            isset($data['user_id']) &&
            isset($data['receiver_id']) &&
            isset($data['message']) &&
            isset($data['type']) &&
            isset($data['appointment_id'])
        ) {
            return $this->query($query, $data);
        } else {
            return false;
        }
    }

    public function getTransportNotificationsByDriverId($driverId)
    {
        $query = "SELECT n.*, ab.pet_id, ab.pickup_lat, ab.pickup_lng, ab.date_time
                  FROM notifications AS n
                  JOIN ambulancebookings AS ab ON n.appointment_id = ab.id
                  WHERE n.receiver_id = :receiver_id AND n.type = 'transport' 
                  ORDER BY n.created_at DESC";
        $result = $this->query($query, ['receiver_id' => $driverId]);
    
        // Check if the query was successful
        if ($result !== false) {
            // Return the query result
            return $result;
        } else {
            // Query failed, return an empty array or handle the error as needed
            return [];
        }
    }
    
    public function getNotificationsByUserId($userId)
    {
        $query = "SELECT * FROM notifications WHERE user_id = :user_id ORDER BY created_at DESC";
        return $this->query($query, ['user_id' => $userId]);
    }

    public function getNotificationById($id)
    {
        $query = "SELECT * FROM notifications WHERE id = :id";
        return $this->get_row($query, ['id' => $id]);
    }

    public function markNotificationAsRead($id)
    {
        $query = "UPDATE notifications SET status = 'read' WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function markAllNotificationsAsRead($userId)
    {
        $query = "UPDATE notifications SET status = 'read' WHERE user_id = :user_id";
        return $this->query($query, ['user_id' => $userId]);
    }

    public function deleteNotification($id)
    {
        $query = "DELETE FROM notifications WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function deleteAllNotifications($userId)
    {
        $query = "DELETE FROM notifications WHERE user_id = :user_id";
        return $this->query($query, ['user_id' => $userId]);
    }

    public function countUnreadNotifications($userId)
    {
        $query = "SELECT COUNT(*) FROM notifications WHERE user_id = :user_id AND status = 'unread'";
        return $this->get_row($query, ['user_id' => $userId]);
    }

    public function countAllNotifications($userId)
    {
        $query = "SELECT COUNT(*) FROM notifications WHERE user_id = :user_id";
        return $this->get_row($query, ['user_id' => $userId]);
    }

    public function getUnreadNotifications($userId)
    {
        $query = "SELECT * FROM notifications WHERE user_id = :user_id AND status = 'unread' ORDER BY created_at DESC";
        return $this->query($query, ['user_id' => $userId]);
    }


}

    