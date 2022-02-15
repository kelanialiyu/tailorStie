<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Size;
use App\Models\SizeType;
use App\Models\Unit;
use Facade\FlareClient\Http\Response;
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
        $customer = Customer::orderBy('created_at')->get();
        return view("customer.index")->with(["customers"=>$customer]);
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
        $rules = ["phone" => "required|unique:customers",
        "email" => "required|unique:customers",
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
        $customer->signed_up=false;
        $customer->save();
        return redirect("customer")->with(["new_customer" => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $size_type = SizeType::all();
        $units = Unit::all();
        return view("customer.show")->with([
            "customer"=>$customer,
            "id"=>$customer->id,
             "sizetypes"=>$size_type,
             "units"=>$units
            ]);
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

    public function message(Customer $customer)
    {
        return view("customer.message",["customer"=>$customer]);
    }

    /**
     * Add User size to storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addSize(Customer $customer, Request $request)
    {
        $validate = $request->validate([
            "name" =>"required",
            "unit" =>"required",
            "size" =>"required",
        ]);
        $size_type = SizeType::firstOrCreate(['name' => $request->name]);
        $unit = Unit::find($request->unit);

        $size = new Size();
        $size->size = $request->size;
        $customer->sizes()->save($size);
        $size_type->sizes()->save($size);
        $unit->sizes()->save($size);
        $result=[];
        $result["message"] = "Size added sucessfully";
        $result["data"]=[
            "id" => $size->id,
            "size" => $size->size,
            "unit" => $size->unit->name,
            "type" => $size->sizeType->name
        ];
        return response($result);

    }

    /**
     * Edit Customer size on storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Size  $size
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function editSize(Request $request, Size $size)
    {
        $request->validate([
            "name" =>"required",
            "unit" =>"required",
            "size" =>"required",
        ]);
        $size->size = $request->size;
        $size_type = SizeType::firstOrCreate(['name' => $request->name]);
        $unit = Unit::find($request->unit);
        $size->size_type_id=$size_type->id;
        $size->unit_id=$unit->id;
        $size->update();
        return $size;
    }

    /**
     * Delete Customer size on storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Size  $size
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteSize(Request $request,Customer $customer, Size $size)
    {
        $customer->sizes()->delete($size->id);
        $size->delete();
        return $customer;
    }

}
