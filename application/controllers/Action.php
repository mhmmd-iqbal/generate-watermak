<?php 
class Action extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
		$this->load->helper(array('form', 'url'));
	    $this->load->library('watermark');

	}

	function Action_watermark($tabel=null){
		switch ($tabel) {
			case 'tb_sk':
				$produk = $this->input->post('produk');
				$nomer	= $this->input->post('nomer');
				$perihal= $this->input->post('perihal');
				$catatan= $this->input->post('catatan');
			    $tmt 	= date('Y-m-d');
			
				$config['upload_path']          = './assets/upload/';
			    $config['allowed_types']        = 'pdf';
			    $config['file_name']            = time()."_".$_FILES['file']['name'];
			    $config['overwrite']			= true;
			    $this->load->library('upload', $config);

			    if ($this->upload->do_upload('file')) {
			        $file 	= $this->upload->data('file_name');
			    }

			    $this->watermark->duplicate($file);

			    $data 	= array(
			    	'produk'	=> $produk,
			    	'nomer'		=> $nomer,
			    	'perihal'	=> $perihal,
			    	'tmt'		=> $tmt,
			    	'catatan'	=> $catatan,
			    	'file'		=> $file,
			    	'id_kelompok' => $this->input->post('id_kelompok'),

			    );
			    $this->Mymodel->All_cud('insert', 'tb_sk', $data);
			    redirect(site_url('Kerol/index/menu_sk'));
			break;

			case 'tb_stk':
				$jenis 	= $this->input->post('jenis');
				$fungsi	= $this->input->post('fungsi');
				$nomer	= $this->input->post('nomer');
				$perihal= $this->input->post('perihal');
				$revisi	= 0;
				$catatan= $this->input->post('catatan');
			    $tmt 	= date('Y-m-d');
			    $info	= 'Referensi Review Doc';

			    $config['upload_path']          = './assets/upload/';
			    $config['allowed_types']        = 'pdf';
			    $config['file_name']            = time()."_".$_FILES['file']['name'];
			    $config['overwrite']			= true;
			    $this->load->library('upload', $config);

			    if ($this->upload->do_upload('file')) {
			        $file 	= $this->upload->data('file_name');
			    }

			    $this->watermark->duplicate($file);
			    $data 	= array(
			    	'jenis'		=> $jenis,
			    	'fungsi'	=> $fungsi,
			    	'nomer'		=> $nomer,
			    	'perihal'	=> $perihal,
			    	'revisi'	=> $revisi,
			    	'tmt'		=> $tmt,
			    	'catatan'	=> $catatan,
			    	'info'		=> $info,
			    	'file'		=> $file,
			    	'id_kelompok' => $this->input->post('id_kelompok'),
			    	'id_fungsi' => $this->input->post('id_fungsi'),
			    	'id_bisnis' => $this->input->post('id_bisnis'),
			    );
			    $this->Mymodel->All_cud('insert', 'tb_stk', $data);
			    redirect(site_url());
			break;
			default:
				echo "Opps!";
			break;
		}	    
	}

	function pdf_sk($id=null){
		$where 		= ['id_sk' => $id];
		$data 		= $this->Mymodel->Get_Data('tb_sk', $where)->row_array();
		echo json_encode($data);
	}

	function pdf_stk($id=null){
		$where 		= ['id_stk' => $id];
		$data 		= $this->Mymodel->Get_Data('tb_stk', $where)->row_array();
		echo json_encode($data);
	}

	function search_sk(){
		$id_kelompok = $this->input->post('id_kelompok');
		$nomer = $this->input->post('nomer');
		$where = null;
		if($id_kelompok != ''){
			$where['id_kelompok'] = $id_kelompok;
		}
		if ($nomer !='') {
			$where['nomer'] = $nomer;
		} 
		$data 	= $this->Mymodel->Get_Data('tb_sk', $where)->result_array();
		echo json_encode($data);
	}

	function search_stk(){
		$id_kelompok = $this->input->post('id_kelompok');
		$id_fungsi = $this->input->post('id_fungsi');
		$id_bisnis = $this->input->post('id_bisnis');
		$nomer = $this->input->post('nomer');
		$perihal = $this->input->post('perihal');

		$where = null;

		if($id_kelompok != ''){
			$where['id_kelompok'] = $id_kelompok;
		} 
		if($id_fungsi != ''){
			$where['id_fungsi'] = $id_fungsi;
		} 
		if($id_bisnis != ''){
			$where['id_bisnis'] = $id_bisnis;
		}
		if ($nomer !='') {
			$where['nomer'] = $nomer;
		}
		if ($perihal !='') {
			$where['perihal'] = $perihal;
		}


		$data 	= $this->Mymodel->Get_Data('tb_stk', $where)->result_array();
		echo json_encode($data);
	}

	function data_kelompok($aksi=null, $id=null){
		switch ($aksi) {
			case 'add':
				$data = ['nama_kelompok' => $this->input->post('nama_kelompok')];
				$this->Mymodel->All_cud('insert', 'tb_kelompok', $data);
				echo json_encode('sukses');
			break;
			case 'update':
				$data = ['nama_kelompok' => $this->input->post('nama_kelompok')];
				$where= ['id_kelompok' => $id];
				$this->Mymodel->All_cud('update', 'tb_kelompok', $data, $where);
				echo json_encode($data);
			break;
			case 'del':
				$where= ['id_kelompok' => $id];
				$this->Mymodel->All_cud('delete', 'tb_kelompok', $data=null, $where);
				echo json_encode('sukses');
			break;
		}
	}
	function data_fungsi($aksi=null, $id=null){
		switch ($aksi) {
			case 'add':
				$data = ['nama_fungsi' => $this->input->post('nama_fungsi')];
				$this->Mymodel->All_cud('insert', 'tb_fungsi', $data);
				echo json_encode('sukses');
			break;
			case 'update':
				$data = ['nama_fungsi' => $this->input->post('nama_fungsi')];
				$where= ['id_fungsi' => $id];
				$this->Mymodel->All_cud('update', 'tb_fungsi', $data, $where);
				echo json_encode($data);
			break;
			case 'del':
				$where= ['id_fungsi' => $id];
				$this->Mymodel->All_cud('delete', 'tb_fungsi', $data=null, $where);
				echo json_encode('sukses');
			break;
		}
	}

	function data_bisnis($aksi=null, $id=null){
		switch ($aksi) {
			case 'add':
				$data = ['nama_bisnis' => $this->input->post('nama_bisnis')];
				$this->Mymodel->All_cud('insert', 'tb_bisnis', $data);
				echo json_encode('sukses');
			break;
			case 'update':
				$data = ['nama_bisnis' => $this->input->post('nama_bisnis')];
				$where= ['id_bisnis' => $id];
				$this->Mymodel->All_cud('update', 'tb_bisnis', $data, $where);
				echo json_encode($data);
			break;
			case 'del':
				$where= ['id_bisnis' => $id];
				$this->Mymodel->All_cud('delete', 'tb_bisnis', $data=null, $where);
				echo json_encode('sukses');
			break;
		}
	}

	function data_operator($aksi=null, $id=null){
		switch ($aksi) {
			case 'add':
				$data = [
					'nama' 	=> $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'pass'	=> md5('12345'),
					'level'	=> 'operator'
				];
				$this->Mymodel->All_cud('insert', 'tb_user', $data);
				echo json_encode('sukses');
			break;
			case 'update':
				$data = [
					'nama' 	=> $this->input->post('nama'),
					'email' => $this->input->post('email'),
				];

				$where= ['id' => $id];
				$this->Mymodel->All_cud('update', 'tb_user', $data, $where);
				echo json_encode($data);
			break;
			case 'del':
				$where= ['id' => $id];
				$this->Mymodel->All_cud('delete', 'tb_user', $data=null, $where);
				echo json_encode('sukses');
			break;
		}
	}
}
?>