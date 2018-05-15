<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 10.5.2018
 * Time: 21:09
 */

class Zakaznici extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Zakaznici_model');
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
        $config['base_url'] = base_url() . '/Zakaznici/index';
        $config['total_rows'] = $this->Zakaznici_model->record_count();
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

        $data['Zakaznici'] = $this->Zakaznici_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['title'] = 'Naši zákazníci';

        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('Zakaznici/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['Zakaznici'] = $this->Zakaznici_model->getRows($id);
            $data['title'] = $data['Zakaznici'];

            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('Zakaznici/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/Zakaznici');
        }
    }

    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('meno', 'Meno', 'required');
            $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('ulica', 'Ulica', 'required');
            $this->form_validation->set_rules('psc', 'PSČ', 'required');
            $this->form_validation->set_rules('mobil', 'Mobil', 'required');


            //priprava dat pre vlozenie
            $postData = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'mesto' => $this->input->post('mesto'),
                'ulica' => $this->input->post('ulica'),
                'psc' => $this->input->post('psc'),
                'mobil' => $this->input->post('mobil'),
                'email' => $this->input->post('email'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Zakaznici_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Zákazník bol pridaný.');
                    redirect('/Zakaznici');
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
        $this->load->view('Zakaznici/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Zakaznici_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('meno', 'Meno', 'required');
            $this->form_validation->set_rules('priezvisko', 'Priezvisko', 'required');
            $this->form_validation->set_rules('mesto', 'Mesto', 'required');
            $this->form_validation->set_rules('ulica', 'Ulica', 'required');
            $this->form_validation->set_rules('psc', 'PSČ', 'required');
            $this->form_validation->set_rules('mobil', 'Mobil', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'meno' => $this->input->post('meno'),
                'priezvisko' => $this->input->post('priezvisko'),
                'mesto' => $this->input->post('mesto'),
                'ulica' => $this->input->post('ulica'),
                'psc' => $this->input->post('psc'),
                'mobil' => $this->input->post('mobil'),
                'email' => $this->input->post('email'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Zakaznici_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Zákazník bol upravený.');
                    redirect('/Zakaznici');
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
        $this->load->view('Zakaznici/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        //overenie, ci id nie je prazdne
        if($id){
            //odstranenie zaznamu
            $delete = $this->Zakaznici_model->delete($id);

            if($delete){
                $this->session->set_userdata('success_msg', 'Zákazník bol vymazaný.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znovu.');
            }
        }

        redirect('/Zakaznici');
    }



}