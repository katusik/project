<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Customer;
use App\Gender;
use App\Passport;

use MenaraSolutions\Geographer\Earth;
use MenaraSolutions\Geographer\Country;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $gender = Gender::all();

        return view('page.customer.costumers', compact('customers', 'gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Gender::all();
       return view('page.customer.create', compact('gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)

    {
        if ($request->input('day') && $request->input('month') && $request->input('year')) {
            $birthday = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');
            $request->merge([
                'birthday' => $birthday,
            ]);
            $this->validate($request, [
                'birthday' => 'date'
            ]);
        }

        $customer = Customer::create($request->all());
        $customer->passport()->create($request->all());

        return redirect()->route('customers.index');
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

        return view('page.customer.customer', compact('customer' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
