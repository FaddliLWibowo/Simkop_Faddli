<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_jabatan_koperasi extends CI_Controller {

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
			$tot_hal = $this->db->get("master_jabatan");
			$config['base_url'] = base_url() . 'master_jabatan/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['jabatan'] = $this->db->get("master_jabatan",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_jabatan/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function edit()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_jabatan'] = $this->uri->segment(3);
			$q = $this->db->get_where("master_jabatan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_jabatan;
				$d['nama_jabatan'] = $dt->nama_jabatan;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_jabatan/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_jabatan'] = $this->uri->segment(3);
			$q = $this->db->get_where("master_jabatan",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_jabatan'] = $dt->id_jabatan;
				$d['nama_jabatan'] = $dt->nama_jabatan;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_jabatan/detail',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['id_param'] = "";
			$d['nama_jabatan'] = "";
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_jabatan/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("cari");
				$this->session->set_userdata($sess_data);
				$kata = $this->session->userdata('kata');
			}
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $page;
			$tot_hal = $this->db->query("select * from master_jabatan where nama_jabatan like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_jabatan/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['jabatan'] = $this->db->query("select * from master_jabatan where nama_jabatan like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_jabatan/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$id['id_jabatan'] = $this->uri->segment(3);
			$this->db->delete("master_jabatan",$id);
			header('location:'.base_url().'master_jabatan_koperasi');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');
			$id['id_jabatan'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("master_jabatan",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_jabatan;
						$d['nama_jabatan'] = $dt->nama_jabatan;
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_jabatan/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['nama_jabatan'] = "";
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_jabatan/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nama_jabatan'] = $this->input->post("nama_jabatan");
					$this->db->update("master_jabatan",$upd,$id);
					header('location:'.base_url().'master_jabatan_koperasi');
				}
				else if($st=="tambah")
				{
					$in['nama_jabatan'] = $this->input->post("nama_jabatan");
					$this->db->insert("master_jabatan",$in);
					header('location:'.base_url().'master_jabatan_koperasi');
				}
			
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}
