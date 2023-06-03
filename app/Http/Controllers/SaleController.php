<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Illuminate\Http\Request;
use DataTables;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();

        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $sale = new Sale;

        $sale->name = $request->input('name');
        $sale->price = $request->input('price');
        $sale->description = $request->input('description');
        $sale->save();

        return redirect()->back()->with('success', 'Sale was added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $sale = Sale::findOrFail($sale);

        $sale->name = $request->input('name');
        $sale->price = $request->input('price');
        $sale->description = $request->input('description');
        $sale->save();

        return redirect()->back()->with('success', 'Sale was added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale = Sale::findOrFail($sale);
        $sale->delete();

        return redirect('/')->with('success', 'The sale was deleted successfully!');
    }

    // Get lists
    public function getSales(Request $request) {
        if ($request->ajax()) {
            $sales = Sale::all();

            return Datatables::of($sales)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $actionBtn = '<a data-toggle="modal" data-id="'. $row->id .'" data-name="'. $row->name .'" data-price="'. $row->price .'" data-description="'. $row->description .'" href="#editSaleModal" class="edit_modal btn btn-primary btn-sm">Edit</a> <a data-toggle="modal" data-id="'. $row->id .'" data-name="'. $row->name .'" href="#deleteSaleModal" class="delete_modal btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
