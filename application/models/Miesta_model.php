<?php


/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 10.5.2018
 * Time: 19:40
 */

class Miesta_model extends CI_Model{


    public function __construct()
    {

    }

    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idmiesta, mesto, ulica, psc');
            $query = $this->db->get_where('miesta', array('miesta.idmiesta' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idmiesta, mesto, ulica, psc');
            $query = $this->db->get('miesta');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('miesta', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('miesta', $data, array('idmiesta'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('miesta',array('idmiesta'=>$id));
        return $delete?true:false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('idmiesta, mesto, ulica, psc');
        $query = $this->db->get('miesta');

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
        return $this->db->count_all('miesta');
    }


}