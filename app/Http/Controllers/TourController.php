<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Customer;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('page.tour.index', compact('tours'));
    }

    public function showCustomer(Request $request, $id)
    {
        $tour = Tour::find($id);
        $tour_id = $request->route('id');
        session(['tour_id' => $tour_id]);

        $customers = Customer::all();

        return view('page.tour.addCustomer', compact('customers', 'tour'));
    }


    public function addCustomer(Request $request)
    {
        $tour = Tour::find(session('tour_id'));

        if ($request->input('check')) {
            $tour->customer()->attach($request->input('check'));
        }

        return redirect()->route('tour');
    }
}
