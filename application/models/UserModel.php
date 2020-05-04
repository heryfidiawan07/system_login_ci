<?php

class UserModel extends CI_Model {

	var $table = 'users';
    var $public_column = ['id', 'name', 'username', 'email'];

	public function all(){
		// return $this->db->get($this->table)->result();
        $this->db->select($this->public_column);
        $query = $this->db->get($this->table);
        return $query->result();
	}

	public function find($id){
		// return $this->db->get_where($this->table, ['id' => $id])->row();
        $this->db->select($this->public_column);
        $query = $this->db->get($this->table);
        return $query->row();
	}

	public function where($data) {
		// return $this->db->get_where($this->table, $data);
        $this->db->select($this->public_column);
        $query = $this->db->get_where($this->table, $data);
        return $query;
	}

	public function create($data) {
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data) {
		return $this->db->update($this->table, $data, ['id' => $id]);
	}

	public function destroy($where) {
		return $this->db->delete($this->table, $where);
	}

    public function unique_validation($field, $data, $id) {
        $this->db->where($field, $data);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('users')->num_rows();
    }

	// DataTable =====

    var $column_select = ['id', 'name', 'username', 'email'];
    var $column_order  = [null, 'name', 'username', 'email', null, null];
    var $column_search = ['name', 'username', 'email'];
    var $with_order    = ['id' => 'desc'];

    public function make_query($data = NULL) {
        $this->db->select($this->column_select);
        $this->db->from($this->table);

        if ($data) {
            $this->db->where($data);
        }
        
        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
                }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->with_order)) {
            $with_order = $this->with_order;
            $this->db->order_by(key($with_order), $with_order[key($with_order)]);
        }
    }

    public function make_datatables($data = NULL) {
        $this->make_query($data);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_filtered_data($data = NULL) {
        $this->make_query($data);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all_data($status = NULL) {
        $this->db->select($this->column_select);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // End DataTable =====
	
}