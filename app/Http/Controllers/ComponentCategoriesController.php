<?php

namespace App\Http\Controllers;

use App\Actions\Components\Categories\DTCategory;
use App\Http\Requests\Components\Categories\CreateCategory;
use App\Http\Requests\Components\Categories\UpdateCategory;
use App\Http\Requests\Components\Categories\DeleteCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComponentCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('p_components.categories.index');
    }

    public function data(DTCategory $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('p_components.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategory $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->route('dshb.components.categories.index')->with(
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
        $category = $request->route('m_category');

        return view('p_components.categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request)
    {
        $request->fulfill();

        return redirect()->route('dshb.components.categories.index')->with(
            $this->updatedFlashMessage()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategory $request)
    {
        $request->fulfill();

        return redirect()->route('dshb.components.categories.index')->with(
            $this->deletedFlashMessage()
        );
    }
}
