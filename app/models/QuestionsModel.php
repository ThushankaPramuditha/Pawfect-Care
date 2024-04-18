<?php

class QuestionsModel
{
    use Model;

    protected $table = 'questions';
    protected $allowedColumns = ['date', 'question', 'reply'];

    public function getAllQuestions()
    {
        return $this->findAll();
    }

    public function getQuestionById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function addQuestion($data)
    {
        return $this->insert($data);
    }

    public function updateQuestion($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }
    
    public function deleteQuestion($id)
    {
        return $this->delete($id);
    }

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['question'])) {
            $this->errors['question'] = "Question name is required";
        }

        if (empty($data['reply'])) {
            $this->errors['reply'] = "Reply is required";
        }

        return empty($this->errors);
    }
}


