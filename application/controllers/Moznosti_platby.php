<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 13:58
 */

class Moznosti_platby extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Moznosti_platby_model');
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
        $config['base_url'] = base_url() . '/Moznosti_platby/index';
        $config['total_rows'] = $this->Moznosti_platby_model->record_count();
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

        $data['Moznosti_platby'] = $this->Moznosti_platby_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['title'] = 'Možné platby';

        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('Moznosti_platby/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['Moznosti_platby'] = $this->Moznosti_platby_model->getRows($id);
            $data['title'] = $data['Moznosti_platby'];

            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('Moznosti_platby/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/Moznosti_platby');
        }
    }

    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('nazov', 'Názov', 'required');
            
            

            //priprava dat pre vlozenie
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Moznosti_platby_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Možnosť platby bola pridaná.');
                    redirect('/Moznosti_platby');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }

        $data['users_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Vytvor oslavu';
        $data['action'] = 'Pridaj';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Moznosti_platby/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Moznosti_platby_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('nazov', 'nazov', 'required');
            
            // priprava dat pre aktualizaciu
            $postData = array(
                'nazov' => $this->input->post('nazov'),
                
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Moznosti_platby_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Možnosť platby bola upravená.');
                    redirect('/Moznosti_platby');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }



        $data['post'] = $postData;
        $data['title'] = 'Uprav oslavu';
        $data['action'] = 'Uprav';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Moznosti_platby/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        //overenie, ci id nie je prazdne
        if($id){
            //odstranenie zaznamu
            $delete = $this->Moznosti_platby_model->delete($id);

            if($delete){
                $this->session->set_userdata('success_msg', 'Možnosť platby bola vymazaná.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znovu.');
            }
        }

        redirect('/Moznosti_platby');
    }



}








