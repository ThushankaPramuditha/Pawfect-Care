<?php

class Services 
{      
	   use Controller;
	   
    public function index()
    {
		$services = new Servicesmodel;
		// echo $service;
		$result = $services->getAllServices();
		// show($result);
        $this->view('admin/services', ['services' => $result]);
    }


    public function create()
    {
        $this->view('admin/services/create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $service = new Services;
        $service->createService($data);

        redirect('admin/services');
    }

    public function show($id)
    {
        $service = (new Services)->getServiceById($id);

        $this->view('admin/services/show', ['service' => $service]);
    }

    public function edit($id)
    {
        $service = (new Services)->getServiceById($id);

        $this->view('admin/services/edit', ['service' => $service]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $service = new Services;
        $service->updateService($id, $data);

        redirect('admin/services');
    }

    public function destroy($id)
    {
        $service = new Services;
        $service->deleteService($id);

        redirect('admin/services');
    }
}

?>
