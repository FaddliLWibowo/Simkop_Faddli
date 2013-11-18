<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_pegawai_koperasi extends CI_Controller {

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
			$tot_hal = $this->db->get("master_pegawai");
			$config['base_url'] = base_url() . 'master_pegawai_koperasi/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_pegawai'] = $this->db->query("select a.*, b.nama_jabatan from master_pegawai a left join master_jabatan b on a.id_jabatan=b.id_jabatan limit ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_pegawai/home',$d);
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
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.*, b.nama_jabatan from master_pegawai a left join master_jabatan b on a.id_jabatan=b.id_jabatan where nama_lengkap like '%".$kata."%'");
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
			$d['data_pegawai'] = $this->db->query("select a.*, b.nama_jabatan from master_pegawai a left join master_jabatan b on a.id_jabatan=b.id_jabatan where nama_lengkap like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_pegawai/home',$d);
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

			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			$d['jabatan'] = $this->db->get('master_jabatan');
			$this->load->view('dashboard_admin/master_pegawai/input',$d);
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
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('no_telp', 'No. Telp / HP', 'trim|required');
			$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('alamat_pekerjaan', 'Alamat Pekerjaan', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
					$d['jabatan'] = $this->db->get('master_jabatan');
					$this->load->view('dashboard_admin/master_pegawai/input',$d);
			}
			else
			{
					$dt['nip'] = $this->input->post('nip');
					$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
					$dt['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
					$dt['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$dt['no_telp'] = $this->input->post('no_telp');
					$dt['alamat_lengkap'] = $this->input->post('alamat_lengkap');
					$dt['id_jabatan'] = $this->input->post('id_jabatan');
					$dt['alamat_pekerjaan'] = $this->input->post('alamat_pekerjaan');
					$this->load->model('m_pegawai');
					$this->m_pegawai->simpan($dt);
					redirect ('master_pegawai_koperasi/index');
			}
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
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
				
			$id['nip'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['nip'] = $this->session->userdata('nip');
			
			$q = $this->db->get_where("master_pegawai",$kode);
			$set_detail = $q->row();

			foreach($q->result() as $data)
			{
				
				$d['nip'] = $data->nip;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['no_telp'] = $data->no_telp;
				$d['alamat_lengkap'] = $data->alamat_lengkap;
				$d['id_jabatan'] = $data->id_jabatan;
				$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
				$d['data_jabatan'] = $this->db->get('master_jabatan');
				$this->load->view('dashboard_admin/master_pegawai/edit',$d);
				
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function update()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('no_telp', 'No. Telp / HP', 'trim|required');
			$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('alamat_pekerjaan', 'Alamat Pekerjaan', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				
			$kode['nip'] = $this->session->userdata('nip');
			
			$q = $this->db->get_where("master_pegawai",$kode);
			$set_detail = $q->row();
			//$this->session->set_userdata("nama_lengkap",$set_detail->nama_lengkap);
			
			foreach($q->result() as $data)
			{
				
				$d['nip'] = $data->nip;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['no_telp'] = $data->no_telp;
				$d['alamat_lengkap'] = $data->alamat_lengkap;
				$d['id_jabatan'] = $data->id_jabatan;
				$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
				$d['data_jabatan'] = $this->db->get('master_jabatan');
				$this->load->view('dashboard_admin/master_pegawai/edit',$d);
				
				}
			}
			else
			{
					$dt['nip'] = $this->input->post('nip');
					$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
					$dt['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
					$dt['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$dt['no_telp'] = $this->input->post('no_telp');
					$dt['alamat_lengkap'] = $this->input->post('alamat_lengkap');
					$dt['id_jabatan'] = $this->input->post('id_jabatan');
					$dt['alamat_pekerjaan'] = $this->input->post('alamat_pekerjaan');
					$this->load->model('m_pegawai');
					$this->m_pegawai->update($dt);
					redirect ('master_pegawai_koperasi/index');
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function hapus($id)
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			
			$this->load->model('m_pegawai');
			$this->m_pegawai->hapus($id);	
			redirect ('master_pegawai_koperasi/index');
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
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
				
			$id['nip'] = $this->uri->segment(3);
			$q = $this->db->get_where("master_pegawai",$id);
			foreach($q->result() as $data)
			{
				
				$d['nip'] = $data->nip;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['no_telp'] = $data->no_telp;
				$d['alamat_lengkap'] = $data->alamat_lengkap;
				$d['id_jabatan'] = $data->id_jabatan;
				$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
				$d['data_jabatan']= $this->db->query("select a.*, b.nama_jabatan from master_pegawai a left join master_jabatan b on a.id_jabatan=b.id_jabatan");
				$this->load->view('dashboard_admin/master_pegawai/detail',$d);
				
			}
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

