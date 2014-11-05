<?php

class Jobs extends Controller
{

	// GET index
	public function index()
	{
		$jobs = Job::all();
		return $this->view("jobs/index", array('jobs' => $jobs));
	}

	// GET create
	// Displays form to create Job
	public function create()
	{
		return $this->view('jobs/create');
	}

	// POST store
	// Stores a new Job
	public function store()
	{
		if(!$_SERVER["REQUEST_METHOD"] == "POST"){
			return;
		}
		// TODO: Validation
		$job = Job::FirstOrCreate(array(
			'JobTitle' => $_POST['JobTitle'],
			'MinSalary' => $_POST['MinSalary'],
			'MaxSalary' => $_POST['MaxSalary']));
		$job->save();
		return header("Location: /jobs");
	}

	// GET show
	// Shows the specified Job
	public function show($id)
	{
		if(!is_numeric($id))
			return http_response_code(404);

		$job = Job::find($id);
		$employees = $job->employees()->get();
		return $this->view('jobs/show',array(
			'job' => $job,
			'employees' => $employees));
	}

	// GET edit
	// Shows the edit form for the specified Job
	public function edit($id)
	{
		$job = Job::find($id);
		return $this->view('jobs/edit', array('job' => $job));
	}

	// POST update
	// Updates the specified Job
	public function update($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return;
		}
		$job = Job::find($id);
		$job->JobTitle = $_POST['JobTitle'];
		$job->MinSalary = $_POST['MinSalary'];
		$job->MaxSalary = $_POST['MaxSalary'];
		$job->save();
		return header("Location: /jobs");
	}

	// DELETE
	// Deletes the specified Job
	public function destroy($id)
	{
		if(!$_SERVER["REQUEST_METHOD"] == 'POST' || !is_numeric($id)){
			return http_response_code(404);
		}
		$job = new Job;
		$job->destroy($id);
		return http_response_code(200);
	}

}