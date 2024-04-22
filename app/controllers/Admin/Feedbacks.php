<?php 

class Feedbacks
{
	use Controller;

	public function index()
	{

		$feedbacksModel = new FeedbacksModel();
		$data['feedbacks'] = $feedbacksModel->getAllFeedbacks();
		

		$this->view('admin/feedbacks',$data);
	}

	public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $feedbacksModel = new FeedbacksModel();
        $feedbacksModel->updateFeedback($a, $_POST);

        redirect('admin/feedbacks');
    }

	public function delete(string $id): void
    {
        $feedbacksModel = new FeedbacksModel();
        $success = $feedbacksModel->deleteFeedback($id, 'id');


        if ($success) {
            $_SESSION['flash'] = ['success' => 'Feedback deleted successfully!'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();

        } else {
            $_SESSION['flash'] = ['error' => 'Failed to delete the feedback'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();
        }

        redirect('admin/feedbacks');
    }

    public function viewFeedback(string $a = '', string $b = '', string $c = ''):void {
        $feedbacksModel = new FeedbacksModel();
        $data['feedback'] = $feedbacksModel->getFeedbackById($a);
        $this->view('admin/feedbacks/update', $data);
    }

	public function remove(string $id): void
    {
        $feedbacksModel = new FeedbacksModel();
        $success = $feedbacksModel->removeFeedback($id);

       
        if ($success) {
            $_SESSION['flash'] = ['success' => 'Feedback removed from the website successfully!'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();

        } else {
            $_SESSION['flash'] = ['error' => 'Failed to remove the feedback from the website'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();
        }
    }
    public function post(string $id): void
    {
        $feedbacksModel = new FeedbacksModel();
        $success = $feedbacksModel->postFeedback($id);

        if ($success) {
            $_SESSION['flash'] = ['success' => 'Feedback posted successfully!'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();

        } else {
            $_SESSION['flash'] = ['error' => 'Failed to post the feedback'];
            header('Location: ' . ROOT . '/admin/feedbacks');
            exit();
        }
    }
    public function search(): void
    {
        $feedbacksModel = new FeedbacksModel();
        $searchTerm = $_POST['search'] ?? '';
        $feedbacks = $feedbacksModel->search($searchTerm);
        if(empty($feedbacks)){
            echo "<tr><td colspan='20'>No feedbacks found</td></tr>";
        }
        else{
            foreach ($feedbacks as $feedback) {
                echo "<tr key='{$feedback->id}'>";
                echo "<td>{$feedback->petowner_id}</td>";
                echo "<td>{$feedback->owner_name}</td>";
                echo "<td>{$feedback->feedback}</td>";
                echo "<td>{$feedback->status}</td>";
                echo "<td class='delete-action-buttons'>";
                echo "<button class='delete-icon'></button>";
                echo "</td>";
                echo "<td class='activate-action-buttons'>";
                echo "<button class='activate-button'>Activate</button>";
                echo "</td>";
                echo "<td class='deactivate-action-buttons'>";
                echo "<button class='deactivate-button'>Deactivate</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit; 

    }

}
