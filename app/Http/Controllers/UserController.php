<?php

namespace App\Http\Controllers;

use App\Actions\Users\DTUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     */
    public function index(): View
    {
        return view('users.index');
    }

    /**
     * Display a listing of the Users for Datatable.
     */
    public function data(DTUser $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    /**
     * Show the form for creating a new Users.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified Users.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified Users.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
