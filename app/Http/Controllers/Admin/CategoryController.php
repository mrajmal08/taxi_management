<?php

namespace App\Http\Controllers\Admin;

use App\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVehicleRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Gate;
use Request;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expense_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseCategories = Vehicle::all();

        return view('admin.Categories.index', compact('expenseCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.Categories.create');
    }

    public function store(StoreVehicleRequest $request)
    {
         $request->validate([
            'mot_file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'vehicle_reg_doc' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'plate_issue_authority_file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
            ]);
        
        if($request->file()) {

            if($request->mot_file){
                $name = time().'.'.$request->mot_file->extension();

                $filePath = $request->file('mot_file')->storeAs('uploads', $name, 'public');
                
                $request->mot_file = time().'.'.$request->mot_file->extension();
                
                $request['mot'] =  $filePath;
            }

            if($request->plate_issue_authority_file){
                $name = time().'.'.$request->plate_issue_authority_file->extension();
                $filePath = $request->file('plate_issue_authority_file')->storeAs('uploads', $name, 'public');
    
                $request->plate_issue_authority_file = time().'.'.$request->plate_issue_authority_file->extension();
                
                $request['plate_issue_authority'] =  $filePath;
            }

            if($request->vehicle_reg_doc_file){
                $name = time().'.'.$request->vehicle_reg_doc_file->extension();
                $filePath = $request->file('vehicle_reg_doc_file')->storeAs('uploads', $name, 'public');
    
                $request->vehicle_reg_doc_file = time().'.'.$request->vehicle_reg_doc_file->extension();
                
                $request['vehicle_reg_doc'] =  $filePath;
            }

            if($request->insurance_doc_file){
                $name = time().'.'.$request->insurance_doc_file->extension();
                $filePath = $request->file('insurance_doc_file')->storeAs('uploads', $name, 'public');
    
                $request->insurance_doc_file = time().'.'.$request->insurance_doc_file->extension();
                
                $request['insurance_reg_doc'] =  $filePath;
            }
        }
        
        Vehicle::create($request->all());
        notify()->success('Car created');
        return redirect()->route('admin.categories.index');
    }

    public function edit(Vehicle $vehicle,$id)
    {
        abort_if(Gate::denies('expense_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $vehicle = Vehicle::find($id);
        $vehicle->load('created_by');

        return view('admin.Categories.edit', compact('vehicle'));
    }

    public function update(UpdateVehicleRequest $request, $id)
    {
        
        if($request->file()) {

            if($request->hasFile('mot_file')){

                if(Request::has('mot_delete'))
                {
                    
                    unlink(public_path().'/storage/'.$request['mot_file']);
                    $request['mot_file'] = '';
                    
                }

                $name = time().'.'.$request->mot_file->extension();

                $filePath = $request->file('mot_file')->storeAs('uploads', $name, 'public');
                
                $request->mot_file = time().'.'.$request->mot_file->extension();
                
                $request['mot'] =  $filePath;
            }

            if($request->hasFile('plate_issue_authority_file')){

                 if(Request::has('plate_delete'))
                {
                    
                    unlink(public_path().'/storage/'.$request['plate_issue_authority']);
                    $request['plate_issue_authority'] = '';
                    
                }

                $name = time().'.'.$request->plate_issue_authority_file->extension();
                $filePath = $request->file('plate_issue_authority_file')->storeAs('uploads', $name, 'public');
    
                $request->plate_issue_authority_file = time().'.'.$request->plate_issue_authority_file->extension();
                
                $request['plate_issue_authority'] =  $filePath;
            }

            if($request->hasFile('vehicle_reg_doc_file')){

                 if(Request::has('reg_delete'))
                {
                    
                    unlink(public_path().'/storage/'.$request['vehicle_reg_doc_file']);
                    $request['vehicle_reg_doc'] = '';
                    
                }

                $name = time().'.'.$request->vehicle_reg_doc_file->extension();
                $filePath = $request->file('vehicle_reg_doc_file')->storeAs('uploads', $name, 'public');
    
                $request->vehicle_reg_doc_file = time().'.'.$request->vehicle_reg_doc_file->extension();
                
                $request['vehicle_reg_doc'] =  $filePath;
            }

            if($request->hasFile('insurance_doc_file')){

                 if(Request::has('insurance_delete'))
                {
                    
                    unlink(public_path().'/storage/'.$request['insurance_doc_file']);
                    $request['insurance_reg_doc'] = '';
                    
                }
                
                $name = time().'.'.$request->insurance_doc_file->extension();
                $filePath = $request->file('insurance_doc_file')->storeAs('uploads', $name, 'public');
    
                $request->insurance_doc_file = time().'.'.$request->insurance_doc_file->extension();
                
                $request['insurance_reg_doc'] =  $filePath;
            }
        } 
        elseif(Request::has('plate_delete'))
        {
            
            unlink(public_path().'/storage/'.$request['plate_issue_authority']);
            $request['plate_issue_authority'] = '';        
        }
        elseif(Request::has('mot_delete'))
        {
            
            unlink(public_path().'/storage/'.$request['mot_file']);
            $request['mot_file'] = '';
            
        } 
        elseif(Request::has('reg_delete'))
        {
            
            unlink(public_path().'/storage/'.$request['vehicle_reg_doc_file']);
            $request['vehicle_reg_doc'] = '';
            
        }
        elseif(Request::has('insurance_delete'))
        {
            
            unlink(public_path().'/storage/'.$request['insurance_doc_file']);
            $request['insurance_reg_doc'] = '';
            
        }

        $vehicle = Vehicle::find($id);
        $vehicle->update($request->all());
        notify()->success('Car updated');
        return redirect()->route('admin.categories.index');
    }

    public function show(Vehicle $expenseCategory)
    {
        abort_if(Gate::denies('expense_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseCategory->load('created_by');

        return view('admin.Categories.show', compact('expenseCategory'));
    }

    public function destroy(Vehicle $expenseCategory)
    {
        abort_if(Gate::denies('expense_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        notify()->success('Car deleted');
        $expenseCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleRequest $request)
    {
        Vehicle::whereIn('id', request('ids'))->delete();
        notify()->success('Cars deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }


}
