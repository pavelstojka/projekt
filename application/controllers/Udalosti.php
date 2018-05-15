<?php
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 11.5.2018
 * Time: 13:50
 */

class Udalosti extends CI_Controller{


    function __construct()
    {
    parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Udalosti_model');
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
        $config['base_url'] = base_url() . '/Udalosti/index';
        $config['total_rows'] = $this->Udalosti_model->record_count();
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
        $data['Udalosti'] = $this->Udalosti_model->fetch_data($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;',$str_links );
        $data['title'] = 'Události';
        //nahratie zoznamu teplot
        $this->load->view('templates/header', $data);
        $this->load->view('Udalosti/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['Udalosti'] = $this->Udalosti_model->getRows($id);
            $data['title'] = $data['Udalosti'];

            //nahratie detailu zaznamu
            $this->load->view('templates/header', $data);
            $this->load->view('Udalosti/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/Udalosti');
        }
    }

    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('miesta_idmiesta', 'ID miesta', 'required');
            $this->form_validation->set_rules('rodinne_oslavy_idrodinne_oslavy', 'ID oslavy', 'required');
            $this->form_validation->set_rules('datum', 'Dátum', 'required');
            $this->form_validation->set_rules('pocet_osob', 'Počet osôb', 'required');
            $this->form_validation->set_rules('cena', 'Cena', 'required');
            $this->form_validation->set_rules('moznosti_platby_idmoznosti_platby', 'ID platby', 'required');
            $this->form_validation->set_rules('zakaznici_id', 'ID zákazníka', 'required');

            //priprava dat pre vlozenie
            $postData = array(
                'miesta_idmiesta' => $this->input->post('miesta_idmiesta'),
                'rodinne_oslavy_idrodinne_oslavy' => $this->input->post('rodinne_oslavy_idrodinne_oslavy'),
                'datum' => $this->input->post('datum'),
                'pocet_osob' => $this->input->post('pocet_osob'),
                'cena' => $this->input->post('cena'),
                'moznosti_platby_idmoznosti_platby' => $this->input->post('moznosti_platby_idmoznosti_platby'),
                'zakaznici_id' => $this->input->post('zakaznici_id'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Udalosti_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Událosť bola pridaná.');
                    redirect('/Udalosti');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }

        $data['mesto'] = $this->Udalosti_model->get_mesto_dropdown();
        $data['mesto_selected'] = '';
        $data['rodinne_oslavy'] = $this->Udalosti_model->get_rodinne_oslavy_dropdown();
        $data['rodinne_oslavy_selected'] = '';
        $data['moznosti_platby'] = $this->Udalosti_model->get_moznosti_platby_dropdown();
        $data['moznosti_platby_selected'] = '';
        $data['zakaznik'] = $this->Udalosti_model->get_zakaznici_dropdown();
        $data['zakaznik_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Vytvor oslavu';
        $data['action'] = 'Pridaj';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Udalosti/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Udalosti_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('miesta_idmiesta', 'ID miesta', 'required');
            $this->form_validation->set_rules('rodinne_oslavy_idrodinne_oslavy', 'ID oslavy', 'required');
            $this->form_validation->set_rules('datum', 'Dátum', 'required');
            $this->form_validation->set_rules('pocet_osob', 'Počet osôb', 'required');
            $this->form_validation->set_rules('cena', 'Cena', 'required');
            $this->form_validation->set_rules('moznosti_platby_idmoznosti_platby', 'ID platby', 'required');
            $this->form_validation->set_rules('zakaznici_id', 'ID zákazníka', 'required');
            // priprava dat pre aktualizaciu
            $postData = array(
                'miesta_idmiesta' => $this->input->post('miesta_idmiesta'),
                'rodinne_oslavy_idrodinne_oslavy' => $this->input->post('rodinne_oslavy_idrodinne_oslavy'),
                'datum' => $this->input->post('datum'),
                'pocet_osob' => $this->input->post('pocet_osob'),
                'cena' => $this->input->post('cena'),
                'moznosti_platby_idmoznosti_platby' => $this->input->post('moznosti_platby_idmoznosti_platby'),
                'zakaznici_id' => $this->input->post('zakaznici_id'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Udalosti_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Událosť bola upravená.');
                    redirect('/Udalosti');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znovu.';
                }
            }
        }


        $data['mesto'] = $this->Udalosti_model->get_mesto_dropdown();
        $data['mesto_selected'] = $postData['idmiesta'];
        $data['rodinne_oslavy'] = $this->Udalosti_model->get_rodinne_oslavy_dropdown();
        $data['rodinne_oslavy_selected'] = $postData['idrodinne_oslavy'];
        $data['moznosti_platby'] = $this->Udalosti_model->get_moznosti_platby_dropdown();
        $data['moznosti_platby_selected'] = $postData['idmoznosti_platby'];
        $data['zakaznik'] = $this->Udalosti_model->get_zakaznici_dropdown();
        $data['zakaznik_selected'] = $postData['id'];


        $data['post'] = $postData;
        $data['title'] = 'Uprav oslavu';
        $data['action'] = 'Uprav';

        //zobrazenie formulara pre vlozenie a editaciu dat
        $this->load->view('templates/header', $data);
        $this->load->view('Udalosti/uprava-pridanie', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        //overenie, ci id nie je prazdne
        if($id){
            //odstranenie zaznamu
            $delete = $this->Udalosti_model->delete($id);

            if($delete){
                $this->session->set_userdata('success_msg', 'Událosť bola vymazaná.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znovu.');
            }
        }

        redirect('/Udalosti');
    }




}
