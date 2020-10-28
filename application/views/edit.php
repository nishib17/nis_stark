<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://getbootstrap.com/dist/js/bootstrap.min.js'); ?>"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
	
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>Employee Update</h3>
			<hr>
			<?php
			if ($this->session->flashdata('success')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('success'); ?></p>
			<?php }
			?>
			<?php
			if ($this->session->flashdata('error')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('error'); ?></p>
			<?php }
			?>
			<?php echo form_open_multipart('employee/save',['name'=>'insertdata','autocomplete'=>'off']);?>
			<!-- <form method="POST" action="<?=base_url()?>employee/save" enctype="multipart/form-data"> -->
				<div class="row">
					<div class="col-md-4"><b>Employee Name</b>
						<input type="hidden" name="emp_id" value="<?php if(isset($result)) echo $result->emp_id ?>">
						<?php echo form_input(['name'=>'emp_name','class'=>'form-control','value'=>set_value('emp_name',$result->emp_name)]); ?>
						<?php echo form_error('emp_name',"<div style='color:red'>","</div>"); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4"><b>Email</b>
						<?php echo form_input(['name'=>'email_address','class'=>'form-control','value'=>set_value('email_address',$result->email_address)]); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Phone</b>
						<?php echo form_input(['name'=>'phone_no','class'=>'form-control','value'=>set_value('phone_no',$result->phone_no)]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Salary</b>
						<?php echo form_input(['name'=>'salary','class'=>'form-control','value'=>set_value('salary',$result->salary)]); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Department</b><br>
						<!-- <?php echo form_input(['name'=>'department','class'=>'form-control','value'=>set_value('department')]); ?> -->
				        <?	
				        $depa = $this->db->query("SELECT GROUP_CONCAT(dep_id SEPARATOR ', ') as dep_id from details where emp_id = ".$result->emp_id);
				        $d = $depa->row();
/*				        $d = '';
				        foreach ($depa->result() as $key => $value) {
				        	$d .= $value->dep_id.',';
				        }*/
				        if (count($department) > 0) {
					        foreach ($department as $dep) :
					            $che = '';
					        	if(in_array($dep->id,explode(',', $d->dep_id)))
					        	{
					        		$che = "checked";
					        	}
					        	?>

					        <input type="checkbox" name="department_id[]" value="<?=$dep->id?>" <?= $che ?>> <?=$dep->name?>
					        <br>
					        <!-- <?=form_checkbox('department_id[]', $dep->id) ?>
					        <?=$dep->name?>
					         -->
								<? endforeach ;
							} ?>  


					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4" style="margin-top: 3%">
						<?php echo form_submit(['name'=>'insert','value'=>'Submit','class'=>'btn btn-primary']); ?>

						 <a href="<?php echo base_url(); ?>" name="Cancel" class="btn  btn-warning "><i class="fa fa-angle-left"></i> Cancel</a>
					</div>
				</div>

				
			<?php echo form_close();?> 
						





		</div>
		</div>
		
		
	</div>

</body>

</html>