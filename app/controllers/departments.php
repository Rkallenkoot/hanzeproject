<?php

class Departments extends Controller
{

	// GET index
	public function index()
	{
		// $departments = Department::all();
		$departments = Department::with('manager.job','location')->get();
		return $this->view("departments/index", array(
			'departments' => $departments));
	}

	// GET create
	// Displays form to create Department
	public function create()
	{
		$employees = Employee::all();
		$locations = Location::all();

		return $this->view('departments/create',
			array('employees' => $employees,
						'locations' => $locations));
	}

	// POST store
	// Stores a new Department
	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		if(empty($_POST['DepartmentName']) || empty($_POST['ManagerID'])
			|| empty($_POST['LocationID']))
		{
			return header("Location: /departments/create");
		}
		$department = new Department(array(
			'DepartmentName' => $_POST['DepartmentName'],
			'ManagerID'      => $_POST['ManagerID'],
			'LocationID'     => $_POST['LocationID']));
		$department->save();
		return header("Location: /departments");
	}

	// GET show
	// Shows the specified Department
	public function show($id)
	{
		if(!is_numeric($id))
			return http_response_code(404);

		$department = Department::find($id);
		$department = $department->employees()->get();
		return $this->view('departments/show', array(
			'department' => $department,
			'employees'  => $employees));
	}

	// GET edit
	// Shows the edit form for the specified Department
	public function edit($id)
	{
		$department = Department::find($id);
		$employees = Employee::all();
		$locations = Location::all();
		return $this->view('departments/edit', array(
			'dep'       => $department,
			'employees' => $employees,
			'locations' => $locations));
	}

	// POST update
	// Updates the specified Department
	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$dep = Department::find($id);
		$dep->DepartmentName = $_POST['DepartmentName'];
		$dep->ManagerID = $_POST['ManagerID'];
		$dep->LocationID = $_POST['LocationID'];
		$dep->save();
		return header("Location: /departments");
	}

	// DELETE
	// Deletes the specified Department
	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$department = new Department;
		$department->destroy($id);
		return http_response_code(200);
	}

}