<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        $customers = Customer::latest()
            ->search($s)
            ->paginate(15);
        return view('admin.customers.customer',['customers' => $customers, 's' => $s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
            
            'surname' => 'required',
            'email' => 'required',
            'cell' => 'max:10',
        ]);
        
        $customer = new Customer;
        $customer->title = $request->input('title');
        $customer->name = $request->input('name');
        $customer->surname = $request->input('surname');
        $customer->email = $request->input('email');
        $customer->cell = $request->input('cell');
        $customer->insurancename = $request->input('insurancename');
        $customer->insurancenumber = $request->input('insurancenumber');

        $customer->save();

        return redirect('/admin/customers')->with('success', 'Customer succesfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $customer = Customer::find($id);
        $vehicles = Customer::find($id)->vehicles;
        return view('admin.customers.showvehicles',['customer' => $customer, 'vehicles' => $vehicles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit')->with('customer', $customer);
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
            
            'surname' => 'required',
            'email' => 'required',
            'cell' => 'max:10',
        ]);
        
        $customer = Customer::find($id);
        $customer->title = $request->input('title');
        $customer->name = $request->input('name');
        $customer->surname = $request->input('surname');
        $customer->email = $request->input('email');
        $customer->cell = $request->input('cell');
        $customer->insurancename = $request->input('insurancename');
        $customer->insurancenumber = $request->input('insurancenumber');

        $customer->save();

        return redirect('/admin/customers')->with('success', 'Customer succesfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/admin/customers')->with('error', 'Customer removed!');
    }
}
