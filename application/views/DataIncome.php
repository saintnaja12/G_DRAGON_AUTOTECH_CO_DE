<form action="<?php echo base_url('Dataregis/show'); ?>">
    <div class="col-md-12 text-center"><br>
        <h4 class="" style="color:#000000">ข้อมูลรายได้จากการเช่า</h4>
        <div class="row justify-content-center">
            <div class="col-sm-10 shadow p-4 mb-4 bg-white rounded">
                <?php 
                        
                       //$this->db->query('SELECT * FROM Rental INNER JOIN RentalDetail on RentalDetail.idRent = Rental.idRental INNER JOIN Carregis on Carregis.idCarregis = RentalDetail.idCarregis 
                       //INNER JOIN Status_car on Status_car.id_Status = Rental.id_status WHERE Carregis.id_Member = '61' and Rental.id_status = "11"  ORDER BY Rental.idRental DESC');
                        $this->db->select('*');
                        $this->db->from('Rental');
                        $this->db->join('Carregis', 'Carregis.idCarregis = Rental.idCarregis');
                        $this->db->join('Generation', 'Generation.id_Gen = Carregis.id_Gen');
                        $this->db->join('Brand', 'Brand.idBrand = Carregis.idBrand');
                        $this->db->join('Status_car', 'Status_car.id_Status = Rental.id_status');
                        $this->db->where('Carregis.id_Member', $this->session->userdata('ID'));
                        // $this->db->where('Rental.id_status', 11);
                        $this->db->where('Rental.id_status', 12);
                        $this->db->order_by('idRental', 'desc');
                        $query =  $this->db->get();
                        $qq = $query->result_array();
                        
						?>
                        
                      
                         
                <div class="col-md-12 mb-5 text-center">
                    <br>
                    <table id="employee_data" class="table table-striped table-bordered text-center"
                        style="width: 1200px;">
                        <thead>
                            <tr>
                                <th data-column-id="Name_image" style="width: 150px;">รหัสการเช่า</th>
                                <th data-column-id="Name_image" style="width: 150px;">ยี่ห้อ</th>
                                <th data-column-id="Name_image" style="width: 200px;">รุ่น</th>
                                <th data-column-id="Name_image" style="width: 200px;">ทะเบียน</th>
                                <th data-column-id="Name_image" style="width: 250px;">วันเริ่มเช่า</th>
                                <th data-column-id="Name_image" style="width: 250px;">วันส่งคืน</th>
                                <th data-column-id="Name_image" style="width: 250px;">วันส่งคืนจริง</th>
                                <th data-column-id="Name_image" style="width: 250px;">ราคาเช่ารถยนต์</th>
                                 <th data-column-id="Name_image" style="width: 100px;">รายได้ 70 %</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($qq as $data){
								
                                ?>
                            <tr>
                                <td><?php echo $data['idRental'];?></td>
                                <td><?php echo $data['Name_Brand'];?></td>
                                <td><?php echo $data['Name_Gen'];?></td>
                                <td><?php echo $data['License'];?></td>
                                <td><?php echo $data['startDate'];?></td>
                                <td><?php echo $data['endDate'];?></td>
                                <td><?php echo $data['ReturnDate'];?></td>
                                <td><b><?php echo number_format($data['PriceCar'],0)?></b>&nbsp;บาท</td>
                                <td><b><?php echo number_format($data['Carownerincome'],0)?></b>&nbsp;บาท</td>
                                <!-- <td><span class="badge badge-warning"><?php //echo $data['Status'];?></span></td> -->

                                <!-- <?php if($data['Name_Status'] == 'รออนุมัติ')
                                {
                                    echo'<td><span class="badge badge-primary" style="font-size:13px;">';
                                    echo $data['Name_Status']; 
                                    echo '</span></td>';
                                }
                                else if ($data['Name_Status'] == 'อนุมัติ') 
                                {   $idc = $data['idCarregis']; ?>
                                    <td><span class="badge badge-success" style="font-size:13px;">อนุมัติ</span><a type="button" class="btn btn-success btn-sm" style="font-size:13px; color:white;"
                                    href="<?php echo base_url('Datecar/gam/'.$idc);?>">กำหนดวันส่งรถ</a></td>
                                    <?php
                               } 
                                else if ($data['Name_Status'] == 'ไม่อนุมัติ') 
                                {
                                    echo'<td><span class="badge badge-danger" style="font-size:13px;">';
                                    echo $data['Name_Status']; 
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status'] == 'กำลังดำเนินการ')
                                {
                                    echo'<td><span class="badge badge-warning" style="font-size:13px;">';
                                    echo $data['Name_Status']; 
                                    echo '</span></td>';
                                }
                                else if ($data['Name_Status'] == 'พร้อม') 
                                {
                                    echo'<td><span class="badge badge-info" style="font-size:13px;">';
                                    echo $data['Name_Status']; 
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status'] == 'ยกเลิก')
                                {
                                    echo'<td><span class="badge badge-secondary" style="font-size:13px;">';
                                    echo $data['Name_Status']; 
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status']== 'ไม่มีการส่งรถ')
                                {
                                    echo'<td><span class="badge badge-secondary" style="font-size:13px;">';
                                    echo $data['Name_Status'];  
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status']== 'ไม่ว่าง')
                                {
                                    echo'<td><span class="badge badge-secondary" style="font-size:13px;">';
                                    echo $data['Name_Status'];  
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status']== 'รอการชำระเงินมัดจำ')
                                { ?>
                                    <td><span class="badge badge-primary" style="font-size:13px;">รอการชำระเงินมัดจำ</span>&nbsp;&nbsp;&nbsp;<a type="button" class="btn btn-primary btn-sm" style="font-size:13px; color:white;"
                                   href="<?php echo base_url('Deposit/de/'.$idr);?>">ชำระเงินมัดจำ</a>&nbsp;&nbsp;
                                   <button type="submit" class="btn btn-danger">ยกเลิกการจอง</button>
                                   </td>
                                   <?php
                                }
                                else if($data['Name_Status']== 'จองรถ')
                                {
                                    echo'<td><span class="badge badge-success" style="font-size:13px;">';
                                    echo $data['Name_Status'];  
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status']== 'กำลังใช้รถ')
                                {
                                    echo'<td><span class="badge badge-success" style="font-size:13px;">';
                                    echo $data['Name_Status'];  
                                    echo '</span></td>';
                                }
                                else if($data['Name_Status']== 'คืนเรียบร้อย')
                                {
                                    echo'<td><span class="badge badge-success" style="font-size:13px;">';
                                    echo $data['Name_Status'];  
                                    echo '</span></td>';
                                }    
                                 ?> -->

                              
                            </tr>
                            <?php 
							} ?>
                        </tbody>
                    </table>
                    <?php 
                        $id = $this->session->userdata('ID');
                        $query = $this->db->query("SELECT SUM(Carownerincome) AS raka FROM Rental
                        INNER JOIN Carregis on Carregis.idCarregis = Rental.idCarregis WHERE Carregis.id_Member = '$id' and Rental.id_status = '12'");
                            $nn = $query->result_array();
                         ?>
                    
                            <h5>รายได้รวมทั้งหมด <?php echo number_format($nn[0]['raka'],0) ?> บาท</h5>
                   
                    
                </div>
            </div>
        </div>
</form>