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
        $feedbacksModel->delete($id, 'id');

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
            echo "Medical Staff deactivated successfully!";
            redirect('admin/feedbacks'); //
        } else {
            echo "Failed to deactivate medical staff!";
            // Implement appropriate error handling here
        }
        redirect('admin/feedbacks');
    }

    public function post(string $id): void
    {
        $feedbacksModel = new FeedbacksModel();
        $success = $feedbacksModel->postFeedback($id);

        if ($success) {
            echo "Medical Staff activated successfully!";
            redirect('admin/feedbacks'); //
        } else {
            echo "Failed to activate medical staff!";
            // Implement appropriate error handling here
        }
        redirect('admin/feedbacks');
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
