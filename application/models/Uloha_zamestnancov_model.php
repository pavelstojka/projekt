        <?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 12:35
 */

class Uloha_zamestnancov_model extends CI_Model{


    public function __construct()
    {
    }

    function getRows($id= "") {
        if(!empty($id)){
            $this->db->select('zamestnanci.idzamestnanci, CONCAT(zamestnanci.meno," ",zamestnanci.priezvisko) as fullname, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, uloha_zamestnancov.iduloha_zamestnancov,  uloha')
                ->join('zamestnanci','uloha_zamestnancov.zamestnanci_idzamestnanci = zamestnanci.idzamestnanci')
                ->join('rodinne_oslavy','uloha_zamestnancov.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy')

            ;
            $query = $this->db->get_where('uloha_zamestnancov', array('uloha_zamestnancov.iduloha_zamestnancov' => $id));
            return $query->row_array();
        }else{
            $this->db->select('zamestnanci.idzamestnanci, CONCAT(zamestnanci.meno," ",zamestnanci.priezvisko) as fullname, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, uloha_zamestnancov.iduloha_zamestnancov,  uloha')
                ->join('zamestnanci','uloha_zamestnancov.zamestnanci_idzamestnanci = zamestnanci.idzamestnanci')
                ->join('rodinne_oslavy','uloha_zamestnancov.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy')
            ;
            $query = $this->db->get('uloha_zamestnancov');
            return $query->result_array();
        }
    }

    public function insert($data = array()) {
        $insert = $this->db->insert('uloha_zamestnancov', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('uloha_zamestnancov', $data, array('iduloha_zamestnancov'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('uloha_zamestnancov', array('iduloha_zamestnancov' => $id));
        return $delete ? true : false;

    }

    public function get_zamestnanci_dropdown($id = ""){
        $this->db->order_by('idzamestnanci')
            ->select('idzamestnanci as id, CONCAT(zamestnanci.meno," ",zamestnanci.priezvisko) as fullname')
            ->from('zamestnanci');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->fullname;
            }
            $dropdownlist[''] = 'Vyberte meno zamestnanca.';
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



    public function fetch_data($limit,$start) {
        $this->db->limit($limit,$start);

        $this->db->select('zamestnanci.idzamestnanci, CONCAT(zamestnanci.meno," ",zamestnanci.priezvisko) as fullname, rodinne_oslavy.idrodinne_oslavy, rodinne_oslavy.nazov, uloha_zamestnancov.iduloha_zamestnancov,  uloha')
            ->join('zamestnanci','uloha_zamestnancov.zamestnanci_idzamestnanci = zamestnanci.idzamestnanci')
            ->join('rodinne_oslavy','uloha_zamestnancov.rodinne_oslavy_idrodinne_oslavy = rodinne_oslavy.idrodinne_oslavy');
        $query = $this->db->get('uloha_zamestnancov');

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
        return $this->db->count_all('uloha_zamestnancov');
    }








}