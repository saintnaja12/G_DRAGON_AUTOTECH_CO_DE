<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('Rent');
        $this->load->view('footer');
        
    }
    public function selectcar()
    {

      
        //SELECT Carregis.idCarregis FROM Carregis WHERE Carregis.idCarregis NOT IN 
        //(SELECT Rental.idCarregis FROM Rental where Carregis.idCarregis = Rental.idCarregis)
        //SELECT Rental.endDate FROM Rental WHERE Rental.endDate NOT IN ('2020-02-14')
        // $query = $this->db->query("SELECT Rental.*, Images.Name_image, Brand.Name_Brand, Carregis.*, Generation.Name_Gen, Seat.Number_Seat 
        // FROM Carregis INNER JOIN Rental on Rental.idCarregis = Carregis.idCarregis 
        // INNER JOIN Images on Images.idCarregis = Carregis.idCarregis 
        // INNER JOIN Brand on Brand.idBrand = Carregis.idBrand 
        // INNER JOIN Generation on Generation.id_Gen = Carregis.id_Gen 
        // INNER JOIN Seat on Seat.id_Seat = Carregis.id_Seat 
        // WHERE Rental.startDate >= Rental.startDate and Rental.endDate <= Rental.endDate 
        // and Images.id_image = (SELECT Images.id_image FROM Images WHERE Images.idCarregis = Carregis.idCarregis LIMIT 1) 
        // and Rental.id_status='12' 
        // and Carregis.id_Status='5'");
        $query = $this->db->query("SELECT Carregis.*, Images.Name_image, Brand.Name_Brand, Carregis.*, Generation.Name_Gen, Seat.Number_Seat
        FROM Carregis 
        INNER JOIN Images on Images.idCarregis = Carregis.idCarregis 
        INNER JOIN Brand on Brand.idBrand = Carregis.idBrand 
        INNER JOIN Generation on Generation.id_Gen = Carregis.id_Gen 
        INNER JOIN Seat on Seat.id_Seat = Carregis.id_Seat 
        WHERE Carregis.idCarregis NOT IN
        (SELECT Rental.idCarregis FROM Rental where Carregis.idCarregis = Rental.idCarregis)
        and Images.id_image = (SELECT Images.id_image FROM Images WHERE Images.idCarregis = Carregis.idCarregis LIMIT 1) 
        and Carregis.id_Status='5'");
        $qq = $query->result_array();
        //echo $this->db->last_query();
        
        
        header('Content-Type: application/json');
        echo json_encode($qq);
        
        
        
        
        
    }

}

/* End of file Controllername.php */
 ?>