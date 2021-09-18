<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use App\Insurance;
use App\Vehicle;
use App\Badge;
use App\Http\Requests\MassDestroyDriverRequest;
use Redirect;
use DB;
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
//        $drivers    = DB::table('drivers')->get();

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
            $request->validate([
                'name' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
                'license_no' => 'required',
                'license_expiry' => 'required',
                'vehicle_reg' => 'required',
                'plate_number' => 'required',
                'plate_renewal' => 'required',
                'capacity' => 'required',
                'insurance_renewal_date' => 'required',
                'dob' => 'required',
            ]);
        try {
            Driver::create($request->all());
            notify()->success('Driver created');
            return redirect()->route('admin.drivers.index');

        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['Something went wrong!']);
        }
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
