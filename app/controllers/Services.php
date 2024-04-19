<?php 

/**
 * home class
 */
class Services
{
	use Controller;

	public function index()
	{
		$servicesModel = new ServicesModel();
		$data['services'] = $servicesModel->getAllServices(); 
		

		$this->view('services',$data);
	}

}
