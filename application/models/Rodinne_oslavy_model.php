<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 11:38
 */

class Rodinne_oslavy_model extends CI_Model{

    public function __construct()
    {

    }
    // vrati zoznam teplot
    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('idrodinne_oslavy, nazov, sezona');
            $query = $this->db->get_where('rodinne_oslavy', array('rodinne_oslavy.idrodinne_oslavy' => $id));
            return $query->row_array();
        }else{
            $this->db->select('idrodinne_oslavy,nazov, sezona');
            $query = $this->db->get('rodinne_oslavy');
            return $query->result_array();
        }
    }

    // vlozenie zaznamu
    public function insert($data = array()) {
        $insert = $this->db->insert('rodinne_oslavy', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    // aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('rodinne_oslavy', $data, array('idrodinne_oslavy'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    // odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('rodinne_oslavy',array('idrodinne_oslavy'=>$id));
        return $delete?true:false;
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('idrodinne_oslavy, nazov, sezona');
        $query = $this->db->get('rodinne_oslavy');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function record_count (){
        return $this->db->count_all('rodinne_oslavy');
    }




}