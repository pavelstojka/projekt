<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 14:00
 */

class Moznosti_platby_model extends CI_Model{

    public function __construct()
    {

    }
    // vrati zoznam teplot
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idmoznosti_platby, nazov');
            $query = $this->db->get_where('moznosti_platby', array('moznosti_platby.idmoznosti_platby' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idmoznosti_platby,nazov');
            $query = $this->db->get('moznosti_platby');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('moznosti_platby', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('moznosti_platby', $data, array('idmoznosti_platby'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('moznosti_platby',array('idmoznosti_platby'=>$id));
        return $delete?true:false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('idmoznosti_platby, nazov');
        $query = $this->db->get('moznosti_platby');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // pocitami kolko studentov sa nachadza v databaze
    public function record_count (){
        return $this->db->count_all('moznosti_platby');
    }




}