<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
<div class="col-md-13 text-center"><br>
	<h1 class="h1" style="color:#000000">เช่ารถยนต์</h1>
</div>
<!-- <div class="row justify-content-center">
	<div class="col-sm-6 shadow p-3 mb-5 bg-white rounded"
		style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;"> -->
<form class="form-signin" id="edit" name="edit" method="post" action="">
	<?php 		
			
				
			
				$query = $this->db->query("select Carregis.*, Images.Name_image, Brand.Name_Brand, Generation.Name_Gen, Seat.Number_Seat 
				from Carregis INNER JOIN Images on Images.idCarregis = Carregis.idCarregis INNER JOIN Brand on Brand.idBrand = 
				Carregis.idBrand INNER JOIN Generation on Generation.id_Gen = Carregis.id_Gen INNER JOIN Seat on Seat.id_Seat = 
				Carregis.id_Seat WHERE Images.id_image = (SELECT Images.id_image FROM Images WHERE Images.idCarregis = Carregis.idCarregis LIMIT 1) 
			    AND Carregis.id_Member <> '61' AND Carregis.id_Status = '5'");
				$qq = $query->result_array();
			?>


	<div class="row justify-content-center">
		<!-- <div class="col-sm-2 shadow p-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;"> -->
			<!-- <div class="row justify-content-center">
				<span>ค้นหารถจากยี่ห้อหรือรุ่น</span>
				<input type="text" class="form-control" id="exampleFormControlInput1" style="width:200px;"
					placeholder="ค้นหายี่ห้อหรือรุ่นรถ">
			</div> -->
			<br>
			<!-- <div class="row justify-content-center">
				<a class="badge badge-danger" href="<?php echo base_url('Rentdesc'); ?>"
					style="font-size: 17px;">เรียงราคาจากสูงไปต่ำ</a>
			</div>
			<br>
			<div class="row justify-content-center">
				<a class="badge badge-danger" href="<?php echo base_url('Rentasc'); ?>"
					style="font-size: 17px;">เรียงราคาจากต่ำไปสูง</a>
			</div> -->
		<!-- </div> -->
		<div class="col-sm-6 shadow p-3 mb-5 bg-white rounded"
			style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
			<!-- <div class="row justify-content-center">
			<span>ค้นหายี่ห้อหรือรุ่น</span></div>
			<div class="row justify-content-center">
				<input type="text" class="form-control" id="search_text" style="width:200px;"
					placeholder="ค้นหายี่ห้อหรือรุ่นรถ"></div> -->
					
			<div class="row">
				<div class="col-sm text-center">
					<H5>เลือกวันที่ต้องการเช่ารถ</H5>
				</div>
			</div>
			<div class="row">
				<div class="col-sm text-right">
					<input type="text" id="startdateee" name="startdateee" style="width:120px; text-align:center;"
						value="">
				</div>
				<div class="col-sm text-left">
					<input type="text" id="enddateee" name="enddateee" style="width:120px; text-align:center;" value="">
				</div>
			</div>
			<div class="row">
				<div class="col-sm text-center">
					<H6 style="color:red;">ระยะเวลาการเช่าได้ไม่เกิน 5 วัน</H6>
				</div>
			</div>
			<br>
			<div id="bookok">
			</div>
			 <?php foreach($qq as $data){ ?>
					
			<div class="row" id="booking">
				<div class="col-sm shadow p-3 mb-2 bg-white rounded"
					style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
					<div class="row">
						<div class="col-sm-8">
							<?php echo $data['Name_Brand'] ?> <?php echo $data['Name_Gen'] ?> <?php echo $data['Yearcar'] ?>
							
						</div>
						<div class="col-sm-6">
							<img src="./pic/car-gear.png"
								style="width:10px; height:10px;">&nbsp;<?php echo $data['Gear'] ?>
							<img src="./pic/seat-belt.png"
								style="width:10px; height:10px;">&nbsp;<?php echo $data['Number_Seat'] ?>
							<br><span style="color: #F60200;"><?php echo number_format($data['RentalPrice'],0) ?></span>&nbsp;บาท/วัน
							<a class="badge badge-secondary" type="button" href="#" data-toggle="modal"
								data-target="#modal-default"><u>เอกสารเช่ารถ</u></a>
							<div class="modal fade" id="modal-default" tabindex="-1" role="dialog"
								aria-labelledby="modal-default" aria-hidden="true">
								<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
									<div class="modal-content">

										<div class="modal-header">
											<h6 class="modal-title" id="modal-title-default">เอกสารสำหรับการเช่ารถยนต์
											</h6>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>

										<div class="modal-body">
											<p>1.บัตรประชาชน หรือ หนังสือเดินทาง</p>
											<p>2.ใบขับขี่ หรือ ใบขับขี่ระหว่างประเทศ</p>
											<p>3.ใบเสร็จการโอนเงินค่ามัดจำ</p>
											<img src="./pic/logo55.png" style="width:450px; height:100;"
												alt="เช่ารถกับ G Dragon">
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-link  ml-auto"
												data-dismiss="modal">ปิด</button>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 text-right">

							<img src="<?php echo base_url('./img/'.$data['Name_image']);?>"
								style="height: 80px; width:80px;">
							<?php $idc = $data['idCarregis']; 
								  $mem = $data['id_Member'];
								  $me = $this->session->userdata('ID');
								   $startdat = date('Y-m-d');
								   $end = date('Y-m-d');
								// $startdat = '';
								// $dateendd = '';
								  $dateendd = date('Y-m-d', strtotime($end. ' + 1 days'));
							
								  ?>
							<?php if($mem == $me){ ?>
								<button class="btn btn-outline" 
								style="background-color: gray; color: white; height:45px;" id="re" disabled>จองรถ</button>
							<?php }else
							      { ?>
								<a class="btn btn-outline" style="background-color: #F60200; color: white; height:45px;"
								href="<?php echo site_url('Rentnext/one/'.$idc.'/'.$startdat.'/'.$dateendd);?>">จองรถ</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<!-- .'}/'.$startdat.'/'.$dateendd -->
	
<?php  } ?>
	</div>
</div>
</form>
<!-- <div id="result"></div>
  </div> -->
<script>
	var start = 0;
	var end = 0;
	$(document).ready(function () {
		$('#startdateee').change(function () {
			start = $("#startdateee").val()
			if (start != '') {
				$('#enddateee').val(null)

			} else {

			}
		});

	});
</script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>ajaxsearch/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<!-- <script>
  $(function(){

  $('img').EZView();
});
</script> -->


