<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use App\Maintenance;
use App\Maintainer;
use App\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMaintenanceRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Redirect;


class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::with(['suppliers','maintain','vehicle'])->get();

        return view('admin.maintenances.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $maintainers = Maintainer::all();
        $vehicles = Vehicle::all();
        return view('admin.maintenances.create',compact('suppliers','vehicles','maintainers'));
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
                'vehicle_id' => 'required',
                'entry_date' => 'required',
                'supplier' => 'required',
                'maintenance_by' => 'required',
                'millage' => 'required',
                'cost' => 'required',
            ]);
        try {
        $maintenances = Maintenance::create($request->all());
        notify()->success('Vehicle maintenance created');
        return redirect()->route('admin.maintenances.index');

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
        $maintenance   = Maintenance::where('id',$id)->first();
        $suppliers = Supplier::all();
        $maintainers = Maintainer::all();
        $vehicles = Vehicle::all();
        return view('admin.maintenances.edit', compact('maintenance','suppliers','maintainers','vehicles'));
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
        $maintenance = Maintenance::find($id);
        $maintenance->update($request->all());
        notify()->success('Vehicle maintenance updated');
        return redirect()->route('admin.maintenances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        $maintenance->delete();

        notify()->success('Vehicle maintenance deleted');
        return back();
    }

    public function massDestroy(MassDestroyMaintenanceRequest $request)
    {
        Maintenance::whereIn('id', request('ids'))->delete();
        notify()->success('Vehicle maintenances deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
