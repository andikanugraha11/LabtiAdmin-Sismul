<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$data['content']	= 'admin/dashboard';
		$data['judul']		= 'Dashboard';
		$this->load->view('Admin/core/content',$data);
	}


	public function gambar()
	{
		$data['content']	= 'admin/gambar';
		$data['judul']		= 'Gambar';
		$this->load->view('Admin/core/content',$data);
	}


	public function musik()
	{
		$data['content']	= 'admin/musik';
		$data['judul']		= 'Musik';
		$this->load->view('Admin/core/content',$data);
	}


	public function video()
	{
		$data['content']	= 'admin/video';
		$data['judul']		= 'Video';
		$this->load->view('Admin/core/content',$data);
	}

	// CRUD FILE
	public function uploadGambar()
	{

	// if($this->session->userdata('login')==FALSE)
  //       {
  //           redirect('admin/login');
  //       }
		$user_id 	= 3;
		$nama_file	= $this->input->post('namaFile');
		//buat path
		$myPath  = "./assets/$user_id/img";

		if(!is_dir($myPath))
		{
			mkdir($myPath,0755,TRUE);
		}

		//Upload file
		$config['upload_path']		= './Assets/img/menu/';
		$config['allowed_types']	= 'jpg|png';
		$config['max_size']			= 2048;
		$config['file_name']		= $nama_file;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('gambarUpload'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('v_uploaderror', $error);
			}
		else
			{
				// $data = array('upload_data' => $this->upload->data());
				// $this->load->view('upload_success', $data);

				redirect('admin/gambar');
			}
	}
}
