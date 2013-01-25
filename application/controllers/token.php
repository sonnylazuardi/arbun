<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Token extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
	}
	public function jurusan()
	{
		$fakultas_id = $this->input->post('fakultas_id');
    $model = new Jurusan();
    $model->where('fakultas_id', $fakultas_id);
    $model->get();
    $result = array();
    $result[0]= 'Pilih Jurusan';
    foreach ($model as $row)
    {
        $result[$row->id]= $row->nama;
    }
    echo form_dropdown("Akun[jurusan_id]",$result,'');
	}
	public function search_arsip()
	{
		$judul = $this->input->get('q');	
		$model = new Buku();
		$model->include_related('akun', array('nama'));
		$model->order_by('view', 'desc');
		$model->ilike('judul', $judul);
		$model->get();
		if($model->exists()){
			$arr = array();
			foreach ($model as $buku) {
				$arr[] = array($buku->judul, $buku->id, $buku->akun_nama, $buku->get_cover());
			}
			echo json_encode($arr);
		}
	}
	public function search_penulis()
	{
		$nama = $this->input->get('q');
		$model = new Akun();
		$model->ilike('nama', $nama);
		$model->get();
		if ($model->exists()) {
			$arr = array();
			foreach ($model as $saya) {
				$arr[] = array($saya->nama, $saya->get_profpic(), $saya->id);
			}
			echo json_encode($arr);
		}
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
	public function bidang()
	{
		$model = new Bidang();
		$model->get();
		$arr = array();
		foreach ($model as $data) {
			$arr[] = $data->nama;
		}
		$json_response = json_encode($arr);
		echo $json_response;
	}
	public function matkul()
	{
		$model = new Matkul();
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