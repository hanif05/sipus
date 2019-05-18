<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_web extends CI_Model {

	function getAll($tabel) {
		$q = $this->db->query("SELECT * FROM $tabel");
		return $q->result();
	}
	
	function getSpesific($tabel, $where) {
		$q = $this->db->query("SELECT * FROM $tabel $where");
		return $q->result();	
	}
	
	function getDataByID($tabel, $kunci, $data) {
		$q = $this->db->query("SELECT * FROM $tabel WHERE $kunci='$data'");
		return $q->row();	
	}
	
	function delData($tabel, $field_mana, $id) {
		$q = $this->db->query("DELETE FROM $tabel WHERE $field_mana = '$id'");
		return $q;
	}
	
	function getValueOneField($field, $tabel, $kunci, $data) {
		$q = $this->db->query("SELECT $field FROM $tabel WHERE $kunci='$data'");
		return $q->row();	
	}
	
	function edit($q, $id, $tabel, $data) {
		$this->db->where($q, $id);
		$q = $this->db->update($tabel, $data);
		return $q;
	}
	function tambah($tabel, $data) {
		$q = $this->db->insert($tabel, $data);
		return $q;
	}
	
}