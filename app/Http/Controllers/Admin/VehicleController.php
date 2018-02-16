<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Customer;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();
        $s = $request->input('s');
        $vehicles = Vehicle::latest()
            ->search($s)
            ->paginate(15);
        return view('admin.vehicles.vehicles',['vehicles' => $vehicles, 'customers' => $customers, 's' => $s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::pluck('name','id');
        return view('admin.vehicles.create')->with('customers', $customers);
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
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'registration' => 'required|unique:vehicles|size:8'
        ]);

        $vehicle = new Vehicle;
        $vehicle->year = $request->input('year');
        $vehicle->make = $request->input('make');
        $vehicle->model = $request->input('model');
        $vehicle->customer_id = $request->input('customer_id');
        $vehicle->color = $request->input('color');
        $vehicle->registration = $request->input('registration');

        $vehicle->save();

        return redirect('/admin/vehicles')->with('success', 'Vehicle succesfully added!');
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
        $customers = Customer::pluck('name','id');
        $vehicle = Vehicle::find($id);
        return view('admin.vehicles.edit',['vehicle' => $vehicle, 'customers' => $customers]);

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
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'registration' => 'required|size:8'
        ]);
        
        $vehicle = Vehicle::find($id);
        $vehicle->year = $request->input('year');
        $vehicle->make = $request->input('make');
        $vehicle->model = $request->input('model');

        $vehicle->customer_id = $request->input('customer_id');
        $vehicle->color = $request->input('color');
        $vehicle->registration = $request->input('registration');

        $vehicle->save();

        return redirect('/admin/vehicles')->with('success', 'Vehicle succesfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect('/admin/vehicles')->with('error', 'Vehicle removed!');
    }
}
