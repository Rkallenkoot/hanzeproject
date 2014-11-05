<?php

class Employees extends Controller
{

	// GET index
	public function index()
	{
		$employees = Employee::select('employees.*', 'jobs.JobTitle', 'departments.DepartmentName')
		->join('jobs', 'employees.JobID', '=', 'jobs.JobID')
		->join('departments', 'employees.departmentID', '=', 'departments.departmentID')
		->with("manager")
		->get();
		return $this->view("employees/index", array('employees' => $employees));
	}

	// GET create
	// Displays form to create Employee
	public function create()
	{
		$employees = Employee::all();
		$jobs = Job::all();
		$departments = Department::all();
		return $this->view('employees/create', array(
			'emp' => $employees,
			'jobs' => $jobs,
			'deps' => $departments
			));
	}

	// POST store
	// Stores a new Employee
	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		
		$emp = new Employee;
		$emp->FirstName = $_POST["FirstName"];
		$emp->LastName = $_POST["LastName"];
		$emp->Email = $_POST["Email"];
		$emp->PhoneNumber = $_POST["PhoneNumber"];
		$emp->JobID = $_POST["JobID"];
		$emp->Salary = $_POST["Salary"];
		$emp->CommissionPCT = $_POST["CommissionPCT"];
		$emp->ManagerID = $_POST["ManagerID"];
		$emp->DepartmentID = $_POST["DepartmentID"];
		$emp->HireDate = $_POST["HireDate"];
		$emp->save();

		return header("Location: /employees");
	}

	// GET show
	// Shows the specified Employee
	public function show($id)
	{
		$employees = Employee::all();
		$jobs = Job::all();
		$departments = Department::all();
		$emp = Employee::find($id);
		return $this->view('employees/show', 
			array('emp' => $emp, 
				'emps' => $employees,
				'jobs' => $jobs,
				'deps' => $departments));
	}

	// GET edit
	// Shows the edit form for the specified Employee
	public function edit($id)
	{
		$employees = Employee::all();
		$jobs = Job::all();
		$departments = Department::all();
		$emp = Employee::find($id);
		return $this->view('employees/edit', 
			array('emp' => $emp, 
				'emps' => $employees, 
				'jobs' => $jobs, 
				'deps' => $departments));
	}

	// POST update
	// Updates the specified Employee
	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$emp = Employee::find($id);
		$emp->FirstName = $_POST["FirstName"];
		$emp->LastName = $_POST["LastName"];
		$emp->Email = $_POST["Email"];
		$emp->PhoneNumber = $_POST["PhoneNumber"];
		$emp->JobID = $_POST["JobID"];
		$emp->Salary = $_POST["Salary"];
		$emp->CommissionPCT = $_POST["CommissionPCT"];
		$emp->ManagerID = $_POST["ManagerID"];
		$emp->DepartmentID = $_POST["DepartmentID"];
		$emp->HireDate = $_POST["HireDate"];
		$emp->save();
		return header("Location: /employees");
	}

	// DELETE
	// Deletes the specified Employee
	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$emp = Employee::find($id);
		$emp->delete();
	}

}