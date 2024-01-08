<?php

namespace App\Http\Controllers;
use App\Models\Customers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.dashboard');
    }




    public function bookingStore(Request $request) {


        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'book' => 'required',


            
        ]);

        Customers::create($formFields);

        
        return redirect('/table')->with('message','Booking created successfuly');
  

    }



    public function bookingShow() {



        $customer=Customers::all();

        return view('layouts.table',['dates'=>$customer]);

    
  




  

        


  

    }


    public function bookingForm() {

  

        return view('layouts.formCustomer');


  

    }

    public function edit($id)
{
   $item = Customers::find($id);

   return view('layouts.formEdit',['item'=>$item]);

   
 
   
}



public function update(Request $request, $id)
{
  $item = Customers::find($id);
  $item->update($request->all());
  return redirect('/table')->with('message','Listing edit successfully');
}






public function delete($id)
{
   $item = Customers::find($id);
 
   $item->delete();
   
return redirect('/table')->with('message','Listing delete successfully');
}

    
}
