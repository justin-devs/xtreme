<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        $employees = Employee::latest()
            ->search($s)
            ->paginate(15);
        return view('admin.employees.employees',['employees'=> $employees, 's' => $s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.employees.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employeeid' => 'required|unique:employees',
            'name' => 'required',
            'surname' => 'required',
            'cell' => 'max:10',
            'password' => 'required',
        ]);

        $employee = new Employee;
        $employee->employeeid = $request->employeeid;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->cell = $request->cell;
        $employee->address = $request->address;
        $employee->password = bcrypt($request->password);

        $employee->save();

        $employee->roles()->sync($request->roles, false);
    
        return redirect('/admin/employees')->with('success', 'Employee successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $roles = Role::pluck('rolename', 'id');
        return view('admin.employees.edit', ['employee' => $employee, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employeeid' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'cell' => 'max:10',
        ]);

        $employee = Employee::find($id);
        $employee->employeeid = $request->employeeid;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->cell = $request->cell;
        $employee->address = $request->address;

        $employee->save();
        if (isset($request->roles)) {
            $employee->roles()->sync($request->roles);
        } else{
            $employee->roles()->sync([]);
        }
    
        return redirect('/admin/employees')->with('success', 'Employee successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/admin/employees')->with('error', 'Employee removed!');
    }
}
