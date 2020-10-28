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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Employee List</h3>
				<a  href="<?php echo site_url('employee/insert') ?>" style="margin-left: 95%;"><button class="btn btn-info" ><i class="fa fa-plus"></i> Add</button></a>
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
				
				<div class="table-responsive" style="margin-top: 20px">
					
					<table id="mytable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Employee Id</th>
								<th>Employee Name</th>
								<th>Email</th>
								<th>Phone </th>
								<th>Salary</th>
								<th>Department</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$cnt = 1;
							foreach ($result as $key => $r) {
								?>
								<tr>
									<td><?php echo htmlentities($cnt); ?></td>
									<td><?php echo htmlentities($r->emp_name); ?></td>
									<td><?php echo htmlentities($r->email_address); ?></td>
									<td><?php echo htmlentities($r->phone_no); ?></td>
									<td><?php echo htmlentities($r->salary); ?></td>
									<td><?php $dep = $this->db->query("SELECT GROUP_CONCAT(name SEPARATOR ', ') as nm from department where id in(SELECT dep_id from details where emp_id = ".$r->emp_id."  GROUP BY emp_id) "); 
									    $d = $dep->row();
									    echo $d->nm;
									?></td>
									
									<td><a href="<?=base_url("employee/edit/".$r->emp_id)?>"><i class="fa fa-pencil btn btn-primary"></i></a></td>
									<td><a href="<?=base_url("employee/delete/".$r->emp_id)?>"><i class="fa fa-times btn btn-danger"></i></a></td>
								</tr>
								<?php
								$cnt++;
							}
							 ?>
							
						</tbody>
					</table>

					<h3>Average Salary Per Dept</h3>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Department Name</th>
								<th>Average salary</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($avg_salary as $key => $s) {
								?>
								<tr>
									<td><?= $s->name?></td>
									<td><?= $s->salary ?></td>
									
								</tr>
								<?php
							}

							?>
							
						</tbody>
					</table>
					<h3>Minimum Employee Salary Per Dept</h3>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Department Name</th>
								<th>Minimum salary</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($min_emp_salary as $key => $s) {
								?>
								<tr>
									<td><?= $s->emp_name?></td>
									<td><?= $s->name?></td>
									<td><?= $s->salary ?></td>
									
								</tr>
								<?php
							}

							?>
							
						</tbody>
					</table>
					<h3>Maximum Employee Salary Per Dept</h3>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Department Name</th>
								<th>Maximum salary</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($max_emp_salary as $key => $s) {
								?>
								<tr>
									<td><?= $s->emp_name?></td>
									<td><?= $s->name?></td>
									<td><?= $s->salary ?></td>
									
								</tr>
								<?php
							}

							?>
							
						</tbody>
					</table>
				</div>
				





			</div>
		</div>
		
		
	</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#mytable').DataTable();
	})
</script>