<?php 

/**
 * Dashboard Services Class
 */
class DashboardServices
{
	use Controller;

	public function index()
	{

		AuthorizationMiddleware::authorize(['Admin']);
		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/dashboardservices',$data);
	}

}
