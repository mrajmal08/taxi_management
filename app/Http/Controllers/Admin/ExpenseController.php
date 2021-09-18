<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenseRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Redirect;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::with('suppliers')->get();

        return view('admin.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('admin.expenses.create',compact('suppliers'));
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
                'entry_date' => 'required|max:255',
                'supplier' => 'required',
                'sub_total' => 'required',
                'vat' => 'required',
                'paymnet_method' => 'required',
            ]);
        try {

        $expense = Expense::create($request->all());
        notify()->success('Expense created');
        return redirect()->route('admin.expenses.index');

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
        $expense   = Expense::where('id',$id)->first();
        $suppliers = Supplier::all();
        return view('admin.expenses.edit', compact('expense','suppliers'));
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
        $expense = Expense::find($id);
        $expense->update($request->all());
        notify()->success('Expense updated');
        return redirect()->route('admin.expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        notify()->success('Expense deleted');
        return back();
    }

    public function massDestroy(MassDestroyExpenseRequest $request)
    {
        Expense::whereIn('id', request('ids'))->delete();
        notify()->success('Expense deleted');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
