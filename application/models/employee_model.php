<?php
class Employee_model extends CI_model
{
	
	public function getemployee()
	{
		$query = $this->db->select("*")->where('status!=',2)->get('employee');
		/*$query = $this->db->select("e.*,d.*")
		->from('employee e')
		->join('details s','e.emp_id = s.emp_id','inner')
		->join('department d','s.dep_id = d.id','inner')
		->where('e.status!=',2)->get();*/
		return $query->result();
	}
	public function avg_salary()
	{
		$query = $this->db->query("SELECT d.name, avg(e.salary) as salary
 			FROM employee e
			INNER JOIN details s ON e.emp_id = s.emp_id
			INNER JOIN department d ON s.dep_id = d.id
			GROUP BY s.dep_id");
		return $query->result();
	}
	public function min_emp_salary()
	{
		$query = $this->db->query("SELECT E.emp_name, E.salary, R.name,R.dept_id
		FROM (select min(e.salary) as salary, d.name as name,d.id as dept_id
			FROM department d
			INNER JOIN details s ON d.id = s.dep_id
			INNER JOIN employee e ON s.emp_id = e.emp_id 
			group by d.id ) R
		INNER JOIN employee E ON R.salary=E.salary");
		return $query->result();
	}
	public function max_emp_salary()
	{
		$query = $this->db->query("SELECT E.emp_name, E.salary, R.name,R.dept_id
		FROM (select max(e.salary) as salary, d.name as name,d.id as dept_id
			FROM department d
			INNER JOIN details s ON d.id = s.dep_id
			INNER JOIN employee e ON s.emp_id = e.emp_id 
			group by d.id ) R
		INNER JOIN employee E ON R.salary=E.salary");
		return $query->result();
	}
	public function getdepartment()
	{
		$query = $this->db->select("*")->get('department');
		return $query->result();
	}
	public function insert_data()
	{

		$this->form_validation->set_rules('emp_name','Employee Name','alpha');
		// $this->form_validation->set_rules('email_address','Email Address','valid_email');
		if (isset($_POST['emp_id']) && $_POST['emp_id']!='') {
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|valid_email');
		}else{
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|valid_email|is_unique[employee.email_address]');
		}
		$this->form_validation->set_rules('phone_no','Phone No','numeric|exact_length[10]');
		$this->form_validation->set_rules('salary','Salary','numeric');
		if ($this->form_validation->run()) {
			$data = array(
				'emp_name' => $_POST['emp_name'],
				'email_address' => $_POST['email_address'],
				'phone_no' => $_POST['phone_no'],
				'salary' => $_POST['salary'],
				// 'department_id' => implode(",", $_POST['department_id']) ,
				'status' => 1,
			);
			if ( isset($_POST['emp_id']) && $_POST['emp_id']!='') {
				$this->db->where('emp_id',$_POST['emp_id']);
				$query_update = $this->db->update('employee',$data);
				$this->db->where('emp_id',$_POST['emp_id']);
				$this->db->delete('details');
			}else{

				$query_add = $this->db->insert('employee',$data);
				$emp_id = $this->db->insert_id();
				$this->db->where('emp_id',$emp_id);
				$this->db->delete('details');
			}
			
			$dep_cnt = count($_POST['department_id']);
			for ($i=0; $i < $dep_cnt; $i++) { 
				$data_dep = array(
					'emp_id' =>  isset($_POST['emp_id']) ? $_POST['emp_id'] : $emp_id,
					'dep_id' => $_POST['department_id'][$i]
				);
				$this->db->insert('details',$data_dep);
			}

			if ($query_add) {
				$this->session->set_flashdata('success','Employee details added.');
				redirect('employee');
			}else if ($query_update) {
				$this->session->set_flashdata('success','Employee details Updated.');
				redirect('employee');
			}else{
				$this->session->set_flashdata('error', 'Somthing went wrong. Try again with valid details !!');
				$this->session->set_flashdata('error', validation_errors());
				// redirect('employee/insert');
			}

			
		}else{
			$this->session->set_flashdata('error', 'Somthing went wrong. Try again with valid details !!');
			$this->session->set_flashdata('error', validation_errors());
			// redirect('employee/insert');
		}
	}
	public function getsingleemployee($emp_id)
	{
		$query = $this->db->select("*")->where('emp_id',$emp_id)->get('employee');
		return $query->row();
	}
}
?>