<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\CustomerRequest;
use App\Tour;
use Illuminate\Http\Request;
use App\Customer;
use App\Gender;


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

        return view('page.customer.customers', compact('customers', 'gender'));
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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        $customer->passport()->create($request->all());

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('page.customer.info', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $gender = Gender::all();
        if (isset($customer)) {
            foreach ($gender as $gen) {
                if ($customer->gender_id == $gen->id) {
                    $gen->checked = true;
                }
            }
        }

        return view('page.customer.edit', compact('customer', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {

        $customer = Customer::find($id);

        $customer->passport()->update($request->only([
            'series',
            'issue',
            'expire'
        ]));
        $customer->update($request->all());

        return redirect()->route('customers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->passport()->delete();

        Customer::find($id)->delete();

        return redirect()->back();
    }

    public function showTour(Request $request, $id) {

        $customer = Customer::find($id);
        $customer_id = $request->route('id');
        session(['customer_id' => $customer_id]);

        $tours = Tour::all();
        return view('page.customer.addTours', compact('tours', 'customer'));
    }

    public function addTour(Request $request) {
        $customer = Customer::find(session('customer_id'));

        if ($request->input('selectTour')) {
            $customer->tour()->attach($request->input('selectTour'));
        }
        return redirect()->route('customers.index');
    }
}
