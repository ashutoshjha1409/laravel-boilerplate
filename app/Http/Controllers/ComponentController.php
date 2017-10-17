<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Component;

class ComponentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$cmps = Component::where('status', 1)
						->orderBy('name', 'asc')
						->get();

		return $cmps;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//['name', 'type', 'owner', 'description', 'status', 'raw_data'];
		$validator = Validator::make($request->all(), [
	        'name' => 'required',
	        'type' => 'required',
	        'owner' => 'required'	        
	    ]);

	    if(!$validator->fails()){
	        $data = Component::create([
            'name'=> $request->name,
            'type'=> $request->type,            
            'owner'=> $request->owner,
            'status'=> true,
            'description'=>$request->description,
            'raw_data'=>$request->raw_data
	        ]);
	        return $data;       
	    } else {
	        return "Please enter all required fields";
	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 * Active component
	 */
	public function show($id)
	{
		$active = Component::where('id', $id)
			->where('status', true)			
			->first();
		return $active;
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

	public function allRequests($id){
		$cmp = Component::where('id', $id)->where('status', true)->get();
		$requests = $cmp->requests()->orderBy('created_at', 'desc')->get();
		return $requests;
	}
}
