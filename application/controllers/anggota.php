<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	
	public function index()
	{
		header('location:'.base_url().'');
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamats'] = $this->config->item('alamat_instansi');
			
			$id['kode_pegawai'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['no_ba'] = $this->session->userdata('kode_pegawai');
			
			$q = $this->db->get_where("master_anggota",$kode);
			$set_detail = $q->row();
			//$this->session->set_userdata("nama_lengkap",$set_detail->nama_lengkap);
			
			foreach($q->result() as $data)
			{
				
				$d['no_ba'] = $data->no_ba;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['no_ktp'] = $data->no_ktp;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['no_telp'] = $data->no_telp;
				$d['alamat'] = $data->alamat;
				$d['lingkungan'] = $data->lingkungan;
				$d['pekerjaan'] = $data->pekerjaan;
				$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
				$d['nama_suamiisteri'] = $data->nama_suamiisteri;
				$d['orang_tua'] = $data->orang_tua;
				$d['uang_pangkal'] = $data->uang_pangkal;
				$d['simpanan_wajib'] = $data->simpanan_wajib;
				$d['simpanan_pokok'] = $data->simpanan_pokok;
				$d['iuran_sumbangan'] = $data->iuran_sumbangan;
				$d['simpanan_sukarela'] = $data->simpanan_sukarela;
				$this->load->view('dashboard_admin/master_anggota/detail',$d);
				
			}
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
			$tot_hal = $this->db->query("select * from master_anggota where nama_lengkap like '%".$kata."%'");
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
			$d['data_anggota'] = $this->db->query("select * from master_anggota where nama_lengkap like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_anggota/home',$d);
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
			
			$this->load->view('dashboard_admin/master_anggota/input',$d);
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
			
			$this->load->model('m_anggota');
			$this->m_anggota->hapus($id);	
			header('location:'.base_url().'');
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
			$d['alamats'] = $this->config->item('alamat_instansi');
			
			$id['kode_pegawai'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['no_ba'] = $this->session->userdata('kode_pegawai');
			
			$q = $this->db->get_where("master_anggota",$kode);
			$set_detail = $q->row();
			//$this->session->set_userdata("nama_lengkap",$set_detail->nama_lengkap);
			
			foreach($q->result() as $data)
			{
				
				$d['no_ba'] = $data->no_ba;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['no_ktp'] = $data->no_ktp;
				$d['jenis_kelamin'] = $data->jenis_kelamin;
				$d['tempat_lahir'] = $data->tempat_lahir;
				$d['tanggal_lahir'] = $data->tanggal_lahir;
				$d['no_telp'] = $data->no_telp;
				$d['alamat'] = $data->alamat;
				$d['lingkungan'] = $data->lingkungan;
				$d['pekerjaan'] = $data->pekerjaan;
				$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
				$d['nama_suamiisteri'] = $data->nama_suamiisteri;
				$d['orang_tua'] = $data->orang_tua;
				$d['uang_pangkal'] = $data->uang_pangkal;
				$d['simpanan_wajib'] = $data->simpanan_wajib;
				$d['simpanan_pokok'] = $data->simpanan_pokok;
				$d['iuran_sumbangan'] = $data->iuran_sumbangan;
				$d['simpanan_sukarela'] = $data->simpanan_sukarela;
				$this->load->view('dashboard_admin/master_anggota/bg_pegawai',$d);
				
			}
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
			
			$this->form_validation->set_rules('no_ba', 'No BA', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('no_ktp', 'No. KTP', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('no_telp', 'No. Telp / HP', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('lingkungan', 'Lingkungan (Kring) / Stasi', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('alamat_pekerjaan', 'Alamat Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('nama_suamiisteri', 'Nama Suami / Isteri', 'trim|required');
			$this->form_validation->set_rules('orang_tua', 'Orang Tua', 'trim|required');
			$this->form_validation->set_rules('uang_pangkal', 'Uang Pangkal (Non Saham)', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_wajib', 'Simpanan Wajib (Simpanan Tiap Bulan)', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_pokok', 'Simpanan Pokok', 'trim|numeric|required');
			$this->form_validation->set_rules('iuran_sumbangan', 'Iuran Sumbangan', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_sukarela', 'simpanan_sukarela', 'trim|numeric');
			
			if ($this->form_validation->run() == FALSE)
			{
					$this->load->view('dashboard_admin/master_anggota/input',$d);
			}
			else
			{
					$dt['no_ba'] = $this->input->post('no_ba');
					$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
					$dt['no_ktp'] = $this->input->post('no_ktp');
					$dt['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
					$dt['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$dt['no_telp'] = $this->input->post('no_telp');
					$dt['alamat'] = $this->input->post('alamat');
					$dt['lingkungan'] = $this->input->post('lingkungan');
					$dt['pekerjaan'] = $this->input->post('pekerjaan');
					$dt['alamat_pekerjaan'] = $this->input->post('alamat_pekerjaan');
					$dt['nama_suamiisteri'] = $this->input->post('nama_suamiisteri');
					$dt['orang_tua'] = $this->input->post('orang_tua');
					$dt['uang_pangkal'] = $this->input->post('uang_pangkal');
					$dt['simpanan_wajib'] = $this->input->post('simpanan_wajib');
					$dt['simpanan_pokok'] = $this->input->post('simpanan_pokok');
					$dt['iuran_sumbangan'] = $this->input->post('iuran_sumbangan');
					$dt['simpanan_sukarela'] = $this->input->post('simpanan_sukarela');
					$this->load->model('m_anggota');
					$this->m_anggota->simpan($dt);
					header('location:'.base_url().'');
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_anggota()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			$d['data_anggota'] = $this->db->get_where("master_anggota");
			
			$this->load->view('dashboard_admin/master_laporan/lihat',$d);
		
	}	
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("tahun_cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("tahun_cari");
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
			$tot_hal = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%'");
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
			$d['data_anggota'] = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_laporan/cetak',$d);
		
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_laporan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("tahun_cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("tahun_cari");
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
			$tot_hal = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%'");
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
			$d['data_anggota'] = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_laporan/cetak_anggota',$d);
		
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_anggota_bayar()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			$d['data_anggota'] = $this->db->get_where("master_anggota");
			
			$this->load->view('dashboard_admin/master_laporan/lihat_bayar',$d);
		
	}	
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_bayar()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("tahun_cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("tahun_cari");
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
			$tot_hal = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%'");
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
			$d['data_anggota'] = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_laporan/cetak_bayar',$d);
		
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_laporan_bayar()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("tahun_cari")=="")
			{
				$kata = $this->session->userdata('kata');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("tahun_cari");
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
			$tot_hal = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%'");
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
			$d['data_anggota'] = $this->db->query("select * from master_anggota where tanggal_masuk like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_laporan/cetak_anggota_bayar',$d);
		
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_surat_permohonan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
		$this->load->library('fpdf');
		$d['data_anggota'] = $this->db->get("master_anggota");
		//$d['data_anggota'] = $this->db->query("select a.*, b.nama_jabatan from master_pegawai a left join master_jabatan b on a.id_jabatan=b.id_jabatan");
		$this->load->view('dashboard_admin/master_laporan/cetak_surat_permohonan',$d);
	}	
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cetak_kartu_anggota()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamats'] = $this->config->item('alamat_instansi');
			
			$id['no_ba'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['no_ba'] = $this->session->userdata('no_ba');
			
			$q = $this->db->get_where("master_anggota",$kode);
			$set_detail = $q->row();
			//$this->session->set_userdata("nama_lengkap",$set_detail->nama_lengkap);
			
			foreach($q->result() as $data)
			{
				
				$d['no_ba'] = $data->no_ba;
				$d['nama_lengkap'] = $data->nama_lengkap;
				$d['tanggal_masuk'] = $data->tanggal_masuk;
				
				$d['data_anggota'] = $this->db->query("select * from master_anggota where no_ba ");
				$this->load->view('dashboard_admin/master_laporan/cetak_kartu_anggota',$d);
				
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
			$d['alamats'] = $this->config->item('alamat_instansi');
			
			$this->form_validation->set_rules('no_ba', 'No BA', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('no_ktp', 'No. KTP', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('no_telp', 'No. Telp / HP', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|required');
			$this->form_validation->set_rules('lingkungan', 'Lingkungan (Kring) / Stasi', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('alamat_pekerjaan', 'Alamat Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('nama_suamiisteri', 'Nama Suami / Isteri', 'trim|required');
			$this->form_validation->set_rules('orang_tua', 'Orang Tua', 'trim|required');
			$this->form_validation->set_rules('uang_pangkal', 'Uang Pangkal (Non Saham)', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_wajib', 'Simpanan Wajib (Simpanan Tiap Bulan)', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_pokok', 'Simpanan Pokok', 'trim|numeric|required');
			$this->form_validation->set_rules('iuran_sumbangan', 'Iuran Sumbangan', 'trim|numeric|required');
			$this->form_validation->set_rules('simpanan_sukarela', 'simpanan_sukarela', 'trim|numeric');
			
			if ($this->form_validation->run() == FALSE)
			{
				$kode['no_ba'] = $this->session->userdata('kode_pegawai');
			
				$q = $this->db->get_where("master_anggota",$kode);
				$set_detail = $q->row();
				foreach($q->result() as $data)
				{
				
					$d['no_ba'] = $data->no_ba;
					$d['nama_lengkap'] = $data->nama_lengkap;
					$d['no_ktp'] = $data->no_ktp;
					$d['jenis_kelamin'] = $data->jenis_kelamin;
					$d['tempat_lahir'] = $data->tempat_lahir;
					$d['tanggal_lahir'] = $data->tanggal_lahir;
					$d['no_telp'] = $data->no_telp;
					$d['alamat'] = $data->alamat;
					$d['lingkungan'] = $data->lingkungan;
					$d['pekerjaan'] = $data->pekerjaan;
					$d['alamat_pekerjaan'] = $data->alamat_pekerjaan;
					$d['nama_suamiisteri'] = $data->nama_suamiisteri;
					$d['orang_tua'] = $data->orang_tua;
					$d['uang_pangkal'] = $data->uang_pangkal;
					$d['simpanan_wajib'] = $data->simpanan_wajib;
					$d['simpanan_pokok'] = $data->simpanan_pokok;
					$d['iuran_sumbangan'] = $data->iuran_sumbangan;
					$d['simpanan_sukarela'] = $data->simpanan_sukarela;
					$this->load->view('dashboard_admin/master_anggota/bg_pegawai',$d);
				
				}
			}	
			else
			{
					$dt['no_ba'] = $this->input->post('no_ba');
					$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
					$dt['no_ktp'] = $this->input->post('no_ktp');
					$dt['jenis_kelamin'] = $this->input->post('jenis_kelamin');
					$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
					$dt['tanggal_lahir'] = $this->input->post('tanggal_lahir');
					$dt['no_telp'] = $this->input->post('no_telp');
					$dt['alamat'] = $this->input->post('alamat');
					$dt['lingkungan'] = $this->input->post('lingkungan');
					$dt['pekerjaan'] = $this->input->post('pekerjaan');
					$dt['alamat_pekerjaan'] = $this->input->post('alamat_pekerjaan');
					$dt['nama_suamiisteri'] = $this->input->post('nama_suamiisteri');
					$dt['orang_tua'] = $this->input->post('orang_tua');
					$dt['uang_pangkal'] = $this->input->post('uang_pangkal');
					$dt['simpanan_wajib'] = $this->input->post('simpanan_wajib');
					$dt['simpanan_pokok'] = $this->input->post('simpanan_pokok');
					$dt['iuran_sumbangan'] = $this->input->post('iuran_sumbangan');
					$dt['simpanan_sukarela'] = $this->input->post('simpanan_sukarela');
					$this->load->model('m_anggota');
					$this->m_anggota->update($dt);
					header('location:'.base_url().'');
			}
		}
			else
		{
			header('location:'.base_url().'');
		}
	}
}
