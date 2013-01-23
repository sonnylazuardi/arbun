<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Token extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function kategori()
	{
		$model = new Kategori();
		$model->get();
		$arr = array();
		foreach ($model as $data) {
			$arr[] = $data->nama;
		}
		$json_response = json_encode($arr);
		echo $json_response;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */