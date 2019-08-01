<?php

namespace App\Http\Controllers;

use App\AddressList;
use App\Homeowner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recomendentAddresses = AddressList::inRandomOrder()->limit(4)->get();

        return view('home')->with('recomendentAddresses',$recomendentAddresses);
    }

    public function changeFavorite(Request $request)
    {
        $id = $request->id;
        $favoriteAddress = AddressList::where('id', $id)->first();
        $favoriteAddress->favorite = $favoriteAddress->favorite==1?0:1;
        $favoriteAddress->save();
        return $favoriteAddress->favorite;
    }

    public function basic()
    {
        return view('basic');
    }

    public function resource()
    {
        return view('resource');
    }

    public function tools()
    {
        return view('tools');
    }

    public function result()
    {
        return view('propertyResult');
    }

    public function homeowner(Request $request)
    {
        $homeowner = new Homeowner();

        $homeowner->first_name = $request->input('first_name');
        $homeowner->last_name = $request->input('last_name');
        $homeowner->email = $request->input('email');
        $homeowner->phone = $request->input('phone');
        $homeowner->address = $request->input('address');

        $homeowner->save();

        return back();

    }


}
