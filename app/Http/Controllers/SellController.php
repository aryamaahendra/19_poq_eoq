<?php

namespace App\Http\Controllers;

use App\Actions\Sells\DTSell;
use App\Exports\SellExport;
use App\Http\Requests\Sells\CreateSell;
use App\Http\Requests\Sells\DeleteSell;
use App\Http\Requests\Sells\UpdateSell;
use App\Models\Component;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('sells.index');
    }

    public function data(DTSell $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $components = Component::all();
        return view('sells.create', compact('components'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSell $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.sell.index')->with(
            $this->createdFlashMessage()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $sell = $request->route('m_sell');
        $components = Component::all();
        return view('sells.update', compact('components', 'sell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSell $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.sell.index')->with(
            $this->updatedFlashMessage()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSell $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.sell.index')->with(
            $this->deletedFlashMessage()
        );
    }

    public function excel(Request $request)
    {
        $sell = $request->route('m_sell');
        return Excel::download(new SellExport, Str::of($sell->no)->replace('/', '-')->slug() . '-sell.xlsx');
    }
}
