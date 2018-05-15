<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 12:57
 */

class Uloha_zamestnancov extends CI_Controller{


    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Uloha_zamestnancov_model');
        $this->load->library('pagination');
    }

    public function index(){
        $data = array();
        //ziskanie sprav zo session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $config['base_url'] = base_url() . '/Uloha_zamestnancov/index';
        $config['total_rows'] = $this->Uloha_zamestnancov_model->record_count();
        $config['per_page'] = 5; // kolko zaznamov chces mat v tabulke na 1 pagination
        $config['uri_segment'] = 3;
        $config['cur_tag_open'] = '&nbsp;<a class="page-link">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3));
        }
        else{
            $page = 0;
        }

        $data['Uloha_zamestnancov'] = $this->Uloha_zamestnancov_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['title'] = 'Služby';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('Uloha_zamestnancov/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['Uloha_zamestnancov'] = $this->Uloha_zamestnancov_model->getRows($id);
            $data['title'] = $data['Uloha_zamestnancov'];

            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('Uloha_zamestnancov/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/Uloha_zamestnancov');
        }
    }

    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('zamestnanci_idzamestnanci', 'ID zamestnanca', 'required');
            $this->form_validation->set_rules('rodinne_oslavy_idrodinne_oslavy', 'ID oslavy', 'required');
            $this->form_validation->set_rules('Uloha', 'Úloha', 'required');

            //priprava dat pre vlozenie
            $postData = array(
                'zamestnanci_idzamestnanci' => $this->input->post('zamestnanci_idzamestnanci'),
                'rodinne_oslavy_idrodinne_oslavy' => $this->input->post('rodinne_oslavy_idrodinne_oslavy'),
                'Uloha' => $this->input->post('Uloha'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Uloha_zamestnancov_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Úloha bola pridaná.');
                    redirect('/Uloha_zamestnancov');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }
        $data['zamestnanec'] = $this->Uloha_zamestnancov_model->get_zamestnanci_dropdown();
        $data['zamestnanec_selected'] = '';
        $data['rodinne_oslavy'] = $this->Uloha_zamestnancov_model->get_rodinne_oslavy_dropdown();
        $data['rodinne_oslavy_selected'] = '';

        $data['users_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Vytvor oslavu';
        $data['action'] = 'Pridaj';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Uloha_zamestnancov/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Uloha_zamestnancov_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('zamestnanci_idzamestnanci', 'zamestnanci_idzamestnanci', 'required');
            $this->form_validation->set_rules('rodinne_oslavy_idrodinne_oslavy', 'rodinne_oslavy_idrodinne_oslavy', 'required');
            $this->form_validation->set_rules('Uloha', 'PSČ', 'required');
            // priprava dat pre aktualizaciu
            $postData = array(
                'zamestnanci_idzamestnanci' => $this->input->post('zamestnanci_idzamestnanci'),
                'rodinne_oslavy_idrodinne_oslavy' => $this->input->post('rodinne_oslavy_idrodinne_oslavy'),
                'Uloha' => $this->input->post('Uloha'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Uloha_zamestnancov_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Úloha bola upravená.');
                    redirect('/Uloha_zamestnancov');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }


        $data['zamestnanec'] = $this->Uloha_zamestnancov_model->get_zamestnanci_dropdown();
        $data['zamestnanec_selected'] = $postData['idzamestnanci'];
        $data['rodinne_oslavy'] = $this->Uloha_zamestnancov_model->get_rodinne_oslavy_dropdown();
        $data['rodinne_oslavy_selected'] = $postData['idrodinne_oslavy'];
        $data['post'] = $postData;
        $data['title'] = 'Uprav oslavu';
        $data['action'] = 'Uprav';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Uloha_zamestnancov/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        //overenie, ci id nie je prazdne
        if($id){
            //odstranenie zaznamu
            $delete = $this->Uloha_zamestnancov_model->delete($id);

            if($delete){
                $this->session->set_userdata('success_msg', 'Úloha bola vymazaná.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znovu.');
            }
        }

        redirect('/Uloha_zamestnancov');
    }




}
