<?php

namespace App\Http\Controllers;

use App\Actions\Components\DTComponent;
use App\Http\Requests\Components\CreateComponent;
use App\Http\Requests\Components\DeleteComponent;
use App\Http\Requests\Components\UpdateComponent;
use App\Models\ComponentCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComponentController extends Controller
{
    protected string $flashMessageObj = 'component';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('p_components.index');
    }

    public function data(DTComponent $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = ComponentCategory::all();
        return view('p_components.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateComponent $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.components.index')->with(
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
        $categories = ComponentCategory::all();
        $component = $request->route('m_component');
        return view('p_components.update', compact('component', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComponent $request)
    {
        $request->fulfill();
        return redirect()->route('dshb.components.index')->with(
            $this->updatedFlashMessage()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteComponent $request)
    {
        $request->fulfill();

        return redirect()->route('dshb.components.index')->with(
            $this->deletedFlashMessage()
        );
    }
}
