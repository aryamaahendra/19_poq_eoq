<?php

namespace App\Http\Controllers;

use App\Actions\Orders\DTOrder;
use App\Http\Requests\Orders\CreateOrder;
use App\Http\Requests\Orders\DeleteOrder;
use App\Http\Requests\Orders\UpdateOrder;
use App\Models\Component;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    protected string $flashMessageObj = 'order';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('orders.index');
    }

    public function data(DTOrder $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $components = Component::all();
        return view('orders.create', compact('components'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrder $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.order.index')->with(
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
    public function edit(Request $request): View
    {
        $order = $request->route('m_order');
        $order->load('items');
        $order->load('items.component');

        $components = Component::all();

        return view('orders.update', compact('order', 'components'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrder $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.order.index')->with(
            $this->updatedFlashMessage()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteOrder $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.order.index')->with(
            $this->updatedFlashMessage()
        );
    }
}
