<?php
class User_m extends CI_Model {

	var $table = "user";

	public function login($data)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $data['username']);
		$this->db->where('password', sha1($data['password']));
		$query = $this->db->get(); 
		return $query;
	}

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('user_id', $id);
		} 
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params['username'] = $data['username'];
		$params['password'] = sha1($data['password']);
		$params['name'] = $data['name'];
		$params['address'] = empty($data['address']) ? null : $data['address'];
		$params['level'] = $data['level'];

		$this->db->insert($this->table, $params);
	}

	public function edit()
	{
		$data = $this->input->post(null, TRUE);
		$params['username'] = str_replace(' ', '', $data['username']);
		if(!empty($data['password'])) {
			$params['password'] = sha1($data['password']);
		}
		$params['name'] = $data['name'];
		$params['address'] = empty($data['address']) ? null : $data['address'];
		$params['level'] = $data['level'];
		$params['updated'] = date('Y-m-d H:i:s');

		$this->db->where('user_id', $data['user_id']);
		$this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('user_id', $id);
        $this->db->delete($this->table);
	}

}