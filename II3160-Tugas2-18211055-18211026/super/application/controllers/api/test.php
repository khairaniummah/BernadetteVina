<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class test extends REST_Controller
{
	function juses_get()
	{
		$this->load->model('convertercsv');
		$jus = $this->convertercsv->daftarJus();
		
		if($jus)
        	{
            		$this->response($jus, 200); // 200 being the HTTP response code
        	}

        	else
        	{
            		$this->response(array('error' => 'Buku could not be found'), 404);
        	}
    	}

	function jus_get()
	{
		$this->load->model('convertercsv');
	
		if(!$this->get('id'))
		{
			$this->response(NULL, 400);
        	}

        	$jus = $this->convertercsv->daftarJus();

        	$hasil = @$jus[($this->get('id'))-1];
        
        	if($hasil)
        	{
            		$this->response($hasil, 200); // 200 being the HTTP response code
        	}

        	else
        	{
            		$this->response(array('error' => 'Buku could not be found'), 404);
        	}	
    	}

}

?>
