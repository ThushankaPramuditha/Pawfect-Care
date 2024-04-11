
<?php

class Questions
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $questionsModel = new QuestionsModel();
        // show($questionsModel->findAll());
        $data['questions'] = $questionsModel->findAll();

        // You can include any additional logic or data fetching here

        $this->view('admin/questions', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $questionsModel = new QuestionsModel();
        $questionsModel->updateQuestion($a, $_POST);

        redirect('admin/questions');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $questionsModel = new QuestionsModel();
        $questionsModel->addQuestion($_POST);

        redirect('admin/questions');
    }

    public function delete(string $id): void
    {
        $questionsModel = new QuestionsModel();
        $questionsModel->delete($id, 'id');

        redirect('admin/questions');
    }

    public function viewQuestions(string $a = '', string $b = '', string $c = ''):void {
        $questionsModel = new QuestionsModel();
        $data['service'] = $questionsModel->getQuestionById($a);
        $this->view('admin/questions/update', $data);
    }

}

