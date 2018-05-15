<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 10:49
 */

class Zamestnanci_model extends CI_Model{


    public function __construct()
    {

    }

    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idzamestnanci, CONCAT(meno," ",priezvisko) as fullname');
            $query = $this->db->get_where('zamestnanci', array('zamestnanci.idzamestnanci' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idzamestnanci, CONCAT(meno," ",priezvisko) as fullname');
            $query = $this->db->get('zamestnanci');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('zamestnanci', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('zamestnanci', $data, array('idzamestnanci'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('zamestnanci',array('idzamestnanci'=>$id));
        return $delete?true:false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('idzamestnanci, CONCAT(meno," ",priezvisko) as fullname');
        $query = $this->db->get('zamestnanci');

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
        return $this->db->count_all('zamestnanci');
    }



}