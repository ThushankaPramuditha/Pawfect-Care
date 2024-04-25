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

		$this->view('admin/dashboardservices',$data);
	}

}
