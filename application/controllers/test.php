<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('index');
        
        
    }

}

/* End of file test.php */


?>