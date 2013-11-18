<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller {

	
	public function index()
		{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("master_anggota");
			$config['base_url'] = base_url() . 'dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['data_anggota'] = $this->db->get("master_anggota",$limit,$offset);
			$this->load->view('dashboard_admin/master_anggota/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}
