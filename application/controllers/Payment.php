<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function sh($idr)
    {   
        $data['idr'] = $idr;
        $this->load->view('header');
        $this->load->view('Payment',$data);
        $this->load->view('footer');
        
    }
    public function inimg($idr)
    {
        $config['upload_path'] = './img3/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            echo $this->upload->display_errors();
        }
        else{
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(
                                'Name_img'=>$filename,
                                'idrent'=>$idr
                            );
           
            $this->db->insert('Images3', $arr);
           
            redirect('Payment/sh/'.$idr);
        }
        $qa=array(
            'rentstatus'=>"1"
            
        );
        $this->db->where('idRental', $idr);
        $this->db->update('Rental', $qa);
        redirect('Datarent');
    }
    public function del($di,$idr)
    {   
        $this->db->delete('Images3', array('idimg3'=>$di));
        // $this->show($id);
        redirect('Payment/sh/'.$idr);
    }
    
}

/* End of file Controllername.php */
 ?>