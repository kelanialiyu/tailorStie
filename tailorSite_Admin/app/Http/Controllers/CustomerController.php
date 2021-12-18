<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SizeType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view("customer.index")->with("customer",$customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ["phone" => "required|unique",
        "email" => "required|unique",
        'name' => 'required|string'];
        if($request->password){
            $rules['password']= 'confirmed|min:8|string';
        }

        $validated = $request->validate($rules);
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->home_address = $request->home_address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;

        $customer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = Customer::find($customer);
        return view("customer.show")->with("customer",$customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $customer = Customer::find($customer);
        return view("customer.edit")->with("customer",$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $custome)
    {
        $validated = $request->validate([
            "phone" => "required|unique",
            "email" => "required|unique",
            'name' => 'required|string',
            'password' => 'required|confirmed|min:8|string',
        ]);
        $customer = Customer::find($custome);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->home_address = $request->home_address;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;

        $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customerModel = Customer::find($customer);
        $customerModel->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Customer $customer, Request $request)
    {
        $validated = $request->validate([
            "password" =>"required|current_password:api",
            'new_password' => 'required|confirmed|min:8|string',
        ]);
        $customerModel = Customer::find($customer);
        $customerModel ->password = $request->password;
        $customerModel ->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function addSizes(Customer $customer, Request $request)
    {
        $input = $request->input();
         foreach ($input as $sizeType => $value) {
             $sizeType_id = SizeType::findOrCreate(["name"=> $sizeType]);

         }
    }




}
