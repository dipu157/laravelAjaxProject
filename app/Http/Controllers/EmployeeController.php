<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Carbon\Carbon;
use DataTables;


class EmployeeController extends Controller
{
    public function index()
    {
        $sl = 1;
    	$data = Employee::latest()->get();
    	return view('employee.employeeindex',compact('data','sl'));
    }

    public function addEmployee(Request $request)
    {
        Request()->validate([
            'name' =>'required',
            'email' =>'required'
        ],

        [
            'name.required' => "Please enter Name",
            'email.required' => "Please Enter Email",
        ]
    );



        $insert = Employee::insert([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'join_date' => $request->join_date,
            'created_at' => Carbon::now()
            ]);

            if($insert)
            {
                return response()->json("success");
            }else{
                return response()->json("error");
            }

    	
    }

    public function getEmployee()
    {
    	$data = Employee::latest()->get();
    	$sl = 1;
    	return view('employee.getemployeedata',compact('data','sl'));
    }

    public function viewEmployee(Request $req){

    	$id = $req->id;
    	$employee = Employee::find($id);
    	return $employee;
    }

    public function deleteEmployee(Request $req){

    	$id = $req->id;
    	$delete = Employee::where('id',$id)->delete();

    	if($delete){
    		return response()->json("success");
    	}else{
    		return response()->json("Error");
    	}
    }

    public function editEmployee(Request $req)
    {
    	$id = $req->id;
    	$data = Employee::find($id);
    	return $data;
    }

    public function updateEmployee(Request $request)
    {
    	$id = $request->id;

    	$update = Employee::where('id',$id)->update([
    		'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'join_date' => $request->join_date,
    		'updated_at' => Carbon::now()
    	]);

    	if($update)
    	{
    		return response()->json("success");
    	}else{
    		return response()->json("error");
    	}
    }
}
