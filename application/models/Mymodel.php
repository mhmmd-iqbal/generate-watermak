<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model{
	public function All_cud($action = null, $table = null, $data = null, $where = null){
		if(isset($where)){
			$this->db->where($where);
		}
		switch ($action) {
			case 'insert': $this->db->insert($table,$data); break;			
			case 'update': $this->db->update($table,$data); break;			
			case 'delete': $this->db->delete($table); break;			
		}
	}	
	
	public function Get_Data($table = null, $where = null, $bycolumn = null, $order = null){
		if(isset($where)){
			$this->db->where($where);
		}
		if (isset($bycolumn)) {
			$this->db->order_by($bycolumn, $order);
		}
		return $this->db->get($table);
	}

	public function join($from, &$table, &$join){
		$i = 0;
		foreach ($table as $data ) {
			$tabel = $table[$i];
			$relasi = $join[$i];			
			$this->db->join($tabel, $relasi);
		$i++;
		}
		return $this->db->get($from);
	}
	public function joinwhere($from, $where, &$table, &$join){
		$i = 0;
		foreach ($table as $data ) {
			$tabel = $table[$i];
			$relasi = $join[$i];			
			$this->db->join($tabel, $relasi);
		$i++;
		}
		return $this->db->get_where($from,$where);
	}

	public function joinwhereorder($from, $where, &$table, &$join, $bycolumn, $order){
		$i = 0;
		foreach ($table as $data ) {
			$tabel = $table[$i];
			$relasi = $join[$i];			
			$this->db->join($tabel, $relasi);
		$i++;
		}
		$this->db->order_by($bycolumn, $order);
		return $this->db->get_where($from,$where);
	}
}
?>