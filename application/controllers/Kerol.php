<?php 
class Kerol extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
	}

	function login(){
		$this->load->view('login');
	}

	function index($p=null, $id=null){
		$status		= $this->session->userdata('status');
		$data['lev']= $this->session->userdata('level');
		if($status == 'login'){
			$this->load->view('template/head', $data);
			if($data['lev'] == 'admin'){
				$data['kelompok'] = $this->Mymodel->Get_Data('tb_kelompok')->result_array();
				$data['fungsi'] = $this->Mymodel->Get_Data('tb_fungsi')->result_array();
				$data['bisnis'] = $this->Mymodel->Get_Data('tb_bisnis')->result_array();
				switch ($p) {
					case 'menu':
						$this->load->view('flatlab/menu', $data);
					break;
					case 'menu_sk':
						$data['data_sk'] = $this->Mymodel->Get_Data('tb_sk')->result_array();
						$this->load->view('flatlab/data_sk', $data);
					break;
					case 'form_sk':
						$this->load->view('flatlab/form_sk', $data);
					break;
					case 'form_stk':
						$this->load->view('flatlab/form_stk', $data);
					break;
					case 'data_kelompok':
						$data['kelompok'] = $this->Mymodel->Get_Data('tb_kelompok')->result_array();
						$this->load->view('flatlab/kelompok', $data);
					break;
					case 'data_fungsi':
						$data['fungsi'] = $this->Mymodel->Get_Data('tb_fungsi')->result_array();
						$this->load->view('flatlab/fungsi', $data);
					break;
					case 'data_bisnis':
						$data['bisnis'] = $this->Mymodel->Get_Data('tb_bisnis')->result_array();
						$this->load->view('flatlab/bisnis', $data);
					break;
					case 'data_user':
						$where = ['level' => 'operator'];
						$data['operator'] = $this->Mymodel->Get_Data('tb_user', $where)->result_array();
						$this->load->view('flatlab/operator', $data);
					break;
					default:
						$data['data_stk'] = $this->Mymodel->Get_Data('tb_stk')->result_array();
						$data['sum'] = $this->Mymodel->Get_Data('tb_stk')->num_rows();
						$this->load->view('flatlab/home',$data);
					break;
				}
			}elseif ($data['lev'] =='operator') {
				switch ($p) {
					case 'home':
					break;
					default:
						$this->load->view('operator/home');
					break;
				}
			}
			$this->load->view('template/foot');
		}else{
			redirect(site_url('Kerol/login'));
		}
	}

	function aksi_Login(){ 
		$where = [
			'email' => $this->input->post('email'),
			'pass'  => md5($this->input->post('password'))
		];

		$cek = $this->Mymodel->Get_Data('tb_user', $where)->num_rows();
		if($cek > 0){
			$data = $this->Mymodel->Get_Data('tb_user', $where)->row_array();
			$sess   = ['id' => $data['id'], 'status' => 'login', 'level' => $data['level']];
			$this->session->set_userdata($sess);
			redirect(site_url());
		}else{
			redirect(site_url('Kerol/login'));
		}

	}

	function Logout(){
		$this->session->sess_destroy();
		redirect(site_url('Kerol/login'));
	}
}

?>