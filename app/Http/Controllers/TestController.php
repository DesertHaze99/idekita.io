<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\Customer;
use App\Store;
Blade::component('components.alert', 'alert');
class TestController extends Controller{
	

	public function index(){
       
        $data = customer::orderBy('customer_id','desc')->get();
        return view('Customer',['customer' => $data]);
    }


    public function create(Request $request)
    {
    	// dd($request->first_name);
    	// query insert dengan eloquent
    	$c = new Customer();
		$c->store_id = $request->store_id;
		$c->first_name = $request->first_name;
		$c->last_name = $request->last_name;
		$c->email = $request->email;
		$c->address_id = $request->address_id;
		$c->active = $request->active;
		$c->save();
    	return redirect('customer')->with('popup', 3);;
    }
    public function update(Request $request, $customer_id){
    	//cek isi customer id
    	//dd($customer_id);
        //dd($id);
    	$c = Customer::find($customer_id);
		$c->store_id = $request->store_id;
		$c->first_name = $request->first_name;
		$c->last_name = $request->last_name;
		$c->email = $request->email;
		$c->address_id = $request->address_id;
		$c->active = $request->active;
		$c->update();

		return redirect('customer')->with('popup', 1);
    }
    public function delete(Request $request, $customer_id){
    	$c = Customer::find($customer_id);
    	$c->deleted = true;
    	$c->save();
    	//Customer::where('customer_id',$customer_id)->delete();
    	
    	return redirect('customer')->with('popup', 2);

    }



    public function join_store_to_customer()
    {
    	//join pertama
    	$store = Store::join('customer','store.store_id','=','customer.store_id')
    	->where('store.store_id',1)
    	->limit(10)
    	->get();
    	dd($store);
    	//join ke dua, di set dulu function customer() pada model class Store 
    	$store = Store::where('store_id',1)->first();
    	dd($store->customer);
    }
}