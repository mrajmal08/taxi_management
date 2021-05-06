<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAreaRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AreaController extends Controller
{
    public function index()
    {
       
        $areas = Area::all();

        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {

        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $area = Area::create($request->all());
        notify()->success('Area created');
        return redirect()->route('admin.areas.index');
    }

    public function edit($id)
    {
        $area = Area::where('id',$id)->first();
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request,$id)
    {
    	$area = Area::find($id);
        $area->update($request->all());
        notify()->success('Area updated');
        return redirect()->route('admin.areas.index');
    }

    public function show($id)
    {
       
    }

    public function destroy($id)
    {
        notify()->success('Area deleted');
        $area = Area::find($id);
        $area->delete();

        return back();
    }

    public function massDestroy(MassDestroyAreaRequest $request)
    {
        Area::whereIn('id', request('ids'))->delete();
        notify()->success('Areas deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
