<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use App\Insurance;
use App\Vehicle;
use App\Badge;
use App\Http\Requests\MassDestroyDriverRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers    = Driver::with('car')->get();
        return view('admin.Drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insurances = Insurance::all();
        $categories = Vehicle::all();
        $badges = Badge::all();
        return view('admin.Drivers.create',compact('categories','insurances','badges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Driver::create($request->all());
        notify()->success('Driver created');
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::with('car')->where('id',$id)->first();
        $categories = Vehicle::all();
        $insurances = Insurance::all();
        $badges = Badge::all();
        return view('admin.Drivers.edit',compact('categories','driver','insurances','badges'));

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
        $driver = Driver::find($id);
        $driver->update($request->all());
        notify()->success('Driver updated');
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        notify()->success('Driver deleted');
        return back();
    }

     public function massDestroy(MassDestroyDriverRequest $request)
    {
        Driver::whereIn('id', request('ids'))->delete();
        notify()->success('Drivers deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
