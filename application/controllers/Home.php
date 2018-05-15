<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->vies('template/header');
        $this->load->vies('template/navigation');
        $this->load->vies('home');
        $this->load->vies('template/footer');


    }

}
/**
 * Created by PhpStorm.
 * User: pstoj
 * Date: 4.5.2018
 * Time: 10:18
 */