<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 13:36
 */

class Udalosti_model extends CI_Model{

    public function __construct()
    {
    }

    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('miesta.idmiesta, miesta.mesto, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, 
            idudalosti, datum, pocet_osob, cena, moznosti_platby.idmoznosti_platby, moznosti_platby.nazov as moznost_platby, 
            zakaznici.id, CONCAT(zakaznici.meno," ",zakaznici.priezvisko) as fullname')
                ->join('miesta','udalosti.miesta_idmiesta = miesta.idmiesta')
                ->join('rodinne_oslavy','udalosti.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy')
                ->join('moznosti_platby','udalosti.moznosti_platby_idmoznosti_platby = moznosti_platby.idmoznosti_platby')
                ->join('zakaznici','udalosti.zakaznici_id = zakaznici.id');
            $query = $this->db->get_where('udalosti', array('udalosti.idudalosti' => $id));
            return $query->row_array();
        }else{
            $this->db->select('miesta.idmiesta, miesta.mesto, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, 
            idudalosti, datum, pocet_osob, cena, moznosti_platby.idmoznosti_platby, moznosti_platby.nazov as moznost_platby, 
            zakaznici.id, CONCAT(zakaznici.meno," ",zakaznici.priezvisko) as fullname')
                ->join('miesta','udalosti.miesta_idmiesta = miesta.idmiesta')
                ->join('rodinne_oslavy','udalosti.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy')
                ->join('moznosti_platby','udalosti.moznosti_platby_idmoznosti_platby = moznosti_platby.idmoznosti_platby')
                ->join('zakaznici','udalosti.zakaznici_id = zakaznici.id');
            $query = $this->db->get('udalosti');
            return $query->result_array();
        }
    }

    public function insert($data = array()) {
        $insert = $this->db->insert('udalosti', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('udalosti', $data, array('idudalosti'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('udalosti', array('idudalosti' => $id));
        return $delete ? true : false;

    }


    public function get_mesto_dropdown($id = ""){
        $this->db->order_by('idmiesta')
            ->select('idmiesta as id, mesto')
            ->from('miesta');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->mesto;
            }
            $dropdownlist[''] = 'Vyberte názov mesta.';
            return $dropdownlist;
        }
    }

    public function get_rodinne_oslavy_dropdown($id = ""){
        $this->db->order_by('idrodinne_oslavy')
            ->select('idrodinne_oslavy as id, nazov')
            ->from('rodinne_oslavy');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->nazov;
            }
            $dropdownlist[''] = 'Vyberte rodinnú oslavu.';
            return $dropdownlist;
        }
    }

    public function get_moznosti_platby_dropdown($id = ""){
        $this->db->order_by('idmoznosti_platby')
            ->select('idmoznosti_platby as id, nazov')
            ->from('moznosti_platby');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->nazov;
            }
            $dropdownlist[''] = 'Vyberte možnosť platby.';
            return $dropdownlist;
        }
    }

    public function get_zakaznici_dropdown($id = ""){
        $this->db->order_by('id')
            ->select('id, CONCAT(zakaznici.meno," ",zakaznici.priezvisko) as fullname')
            ->from('zakaznici');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Vyberte meno zákaznika.';
            return $dropdownlist;
        }
    }

    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);
        $this->db->select('miesta.idmiesta, miesta.mesto, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, 
            idudalosti, datum, pocet_osob, cena, moznosti_platby.idmoznosti_platby, moznosti_platby.nazov as moznost_platby, 
            zakaznici.id, CONCAT(zakaznici.meno," ",zakaznici.priezvisko) as fullname')
            ->join('miesta','udalosti.miesta_idmiesta = miesta.idmiesta')
            ->join('rodinne_oslavy','udalosti.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy')
            ->join('moznosti_platby','udalosti.moznosti_platby_idmoznosti_platby = moznosti_platby.idmoznosti_platby')
            ->join('zakaznici','udalosti.zakaznici_id = zakaznici.id');
        $query = $this->db->get('udalosti');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function record_count (){
        return $this->db->count_all('udalosti');
    }



















}