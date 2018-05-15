<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 10.5.2018
 * Time: 21:09
 */

class Zakaznici_model extends CI_Model{


    public function __construct()
    {

    }

    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('id, CONCAT(meno," ",priezvisko) as fullname, mesto, ulica, psc, mobil, email');
            $query = $this->db->get_where('zakaznici', array('zakaznici.id' => $id));
            return $query->row_array();
        }else{
            $this->db->select('id, CONCAT(meno," ",priezvisko) as fullname, mesto, ulica, psc, mobil, email');
            $query = $this->db->get('zakaznici');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('zakaznici', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('zakaznici', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('zakaznici',array('id'=>$id));
        return $delete?true:false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('id, CONCAT(meno," ",priezvisko) as fullname, mesto, ulica, psc, mobil, email');
        $query = $this->db->get('zakaznici');

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
        return $this->db->count_all('zakaznici');
    }


}