<?php

class FeedbacksModel
{
    use Model;

    protected $table = 'feedbacks';
    protected $allowedColumns = ['id', 'feedback', 'date', 'petowner_id', 'status'];

    public function getAllFeedbacks()
    {
        $query = "SELECT f.*, po.name AS owner_name
        FROM feedbacks f
        JOIN petowners po 
        ON f.petowner_id = po.id";

        return $this->query($query);
        return $this->findAll();
    }

    public function getFeedbackById($id)
    {
        $query = "SELECT f.*, po.name AS owner_name
        FROM feedbacks f
        JOIN petowners po 
        ON f.petowner_id = po.id
        WHERE f.id= :id";

        return $this->get_row($query, ['id' => $id]);
    }

    public function addFeedback($data)
    {
        return $this->insert($data);
    }

    public function updateFeedback($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }
    
    public function deleteFeedback($id)
    {
        return $this->delete($id);
    }

    public function removeFeedback($id)
    {
        $feedbackData = $this->getFeedbackById($id);
        if ($feedbackData) {
            $query = "UPDATE $this->table SET status = :status WHERE id = :id";
            return $this->query($query, ['status' => 'not posted', 'id' => $id]);
        }

        return false;
    }
    public function postFeedback($id)
    {
        $feedbackData = $this->getFeedbackById($id);
        if ($feedbackData) {
            $query = "UPDATE $this->table SET status = :status WHERE id = :id";
            return $this->query($query, ['status' => 'posted', 'id' => $id]);
        }

        return false;
    }
   
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['feedback'])) {
            $this->errors['feedback'] = "Feedback is required";
        }


        return empty($this->errors);
    }
}


