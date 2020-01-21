<?php 
      $this->db->select('*');
     $this->db->from('Carregis');
     $this->db->join('Brand', 'Carregis.Brand = Brand.idBrand');
     $this->db->join('Generation', 'Carregis.id_Gen = Generation.id_Gen');
     $this->db->join('Member', 'Carregis.id_Member = Member.id_Member');
     $this->db->where('idCarregis',$idc);
     $query = $this->db->get();
     $qq = $query->result_array();
    ?>
    <div class="col-md-13 text-center"><br>
    <?php foreach($qq as $data){ ?>
	<h4 style="color:#000000"><?php echo $data['Name_Brand'];?>&nbsp;<?php echo $data['Name_Gen'];?>&nbsp;<?php echo $data['Yearcar'];?></h4>
    <?php } ?>
</div>
<form class="form-signin" id="edit" name="edit" method="post" action="">
	<div class="row justify-content-center">
      
		<div class="col-sm-5 shadow p-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
            <H4 style="text-align:center;">รูปภาพเกี่ยวกับรถ</H4>
            <br>
            <?php 
      $this->db->select('*');
      $this->db->from('Images');
      $this->db->where('idCarregis',$idc);
      $query = $this->db->get();
      $q2 = $query->result_array();
    ?>
            <?php foreach($q2 as $data){ ?>
			<img src="<?php echo base_url('./img/'.$data['Name_image']);?>" style="height:80px; weight:80px;">
            <?php } ?>


            <?php 
            $this->db->select('*');
            $this->db->from('Carregis');
            $this->db->where('idCarregis', $idc);
            $query = $this->db->get();
            $q1 = $query->result_array();
             ?>
		</div>
		<div class="col-sm-3 shadow p-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
            <div class="row">
                <div class="col-sm">
                <p style="text-align:Left;">วันเริ่มเช่า</p>
                </div>
                <div class="col-sm text-right">
                <input type="text" name="date" value="" style="width:135;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                <p style="text-align:Left;">วันส่งคืน</p>
                </div>
                <div class="col-sm text-right">
                <input type="text" name="date" value="" style="width:135;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                <p style="text-align:Left;">ค่าเช่ารถ/วัน</p>
                </div>
                <div class="col-sm">
                <?php foreach($q1 as $data){ ?>
            <p style="text-align:right;"><?php echo number_format($data['RentalPrice'],2);?>&nbsp;บาท</p>
            <?Php } ?>
                </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                    <p style="text-align:Left;">ประกันภัย</p>
                    </div>
                    <div class="col-sm">
                    <?php foreach($q1 as $data){
                        $ga = $data['RentalPrice'];
                        $gam = 25;
                        $game = 100;
                        $total = $ga * $gam / $game;
                        ?>
                    <p style="text-align:right;"><?php  echo number_format($total,2);?>&nbsp;บาท</p>
                    <?php } ?>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                    <br>
                    <p style="text-align:Left; color:red;">รวมทั้งหมด</p>
                    </div>
                    <div class="col-sm">
                    <?php foreach($q1 as $data){
                        $ga = $data['RentalPrice'];
                        $gam = 25;
                        $game = 100;
                        $total = $ga * $gam / $game;
                        $total2 = $ga + $total;
                        ?>
                    <p style="text-align:right; color:red; font-size:35px;"><?php  echo number_format($total2,2);?>&nbsp;บาท</p>
                    <?php } ?>
                    </div>
            </div>
            <div class="row justify-content-center">
            <button type="button" class="btn btn-danger" style="background-color: #F60200; color: white; width:370px;">จอง</button>
            </div>
	</div>
    </div>
    <div class="row justify-content-center">
    <div class="col-sm-5 shadow p-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
            <?php 
            $this->db->select('*');
            $this->db->from('Carregis');
            $this->db->join('Brand', 'Carregis.Brand = Brand.idBrand');
            $this->db->join('Generation', 'Carregis.id_Gen = Generation.id_Gen');
            $this->db->where('idCarregis',$idc);
            $query = $this->db->get();
            $qq = $query->result_array();
             ?>
            <div class="row">
                <div class="col-sm">
                <H4 style="text-align:center;">ข้อมูลเกี่ยวกับรถ</H4>
                </div>
                </div>
                <?php foreach($qq as $data){?>
                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                        <div class="col-sm">
                        <p>ยี่ห้อ</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Name_Brand'];?>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                        <p>รุ่น</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Name_Gen'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                        <div class="row">
                        <div class="col-sm">
                        <p>ปี</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Yearcar'];?>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                        <p>เลขไมล์ (กิโลเมตร)</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Mileage'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                        <div class="row">
                        <div class="col-sm">
                        <p>ระบบเกียร์</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Gear'];?>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                        <p>สี</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Color'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm">
                        <div class="row">
                        <div class="col-sm">
                        <p>จำนวนที่นั่ง</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Seat'];?>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                        <p>ชนิดเชื้อเพลิง</p>
                        </div>
                        <div class="col-sm">
                        <?php echo $data['Fuel'];?>
                        </div>
                    </div>
                    </div>
            </div>
                <?php } ?>
	</div>
    <div class="col-sm-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
    </div>
</form>