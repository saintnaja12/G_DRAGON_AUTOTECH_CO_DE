
<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -27px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}</style>
<div class="photo mt-5 mb-3" style="text-align: center; ">
	<img src="<?php echo base_url('./pic/logo55.png'); ?>"
		style="background-color: #5DBCD2; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;" />
</div>
<div class="row justify-content-center">
	<div class="col-sm-3 shadow p-3 mb-5 bg-white rounded"
		style="background-color: #FFFFFF; border-radius: 10px ; margin-left: 1em ; margin-right: 1em ;">
		<form class="form-login" id="login" name="login" method="post" action="<?php echo base_url(); ?>Login/Loginn">
			<H4>Login</H4>
			<div class="form-group">
			
				<div class="form-group bmd-form-group">
					<label class="bmd-label-floating">Username</label>
					<i class="ni ni-single-02" style="color: black;"></i>
					<input type="text" id="username" class="form-control" placeholder="Username" required name="username">
				</div>

				<div class="form-group bmd-form-group">
					<label class="bmd-label-floating">Password</label>
					<i class="ni ni-lock-circle-open" style="color: black;"></i>
					<input id="password-field" type="password" class="form-control" name="password"  placeholder="Password" required>
              		<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>
				<button class="btn btn-success" type="submit">Login</botton>
			</div>
			 <a class="btn btn-info" href="<?php echo base_url("Register");?>">Register</a>
			 
	</div>
	</form>