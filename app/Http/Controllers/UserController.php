<?php

namespace App\Http\Controllers;

use App\Actions\Users\DTUser;
use App\Http\Requests\Users\CreateUser;
use App\Http\Requests\Users\UpdateUser;
use App\Http\Requests\Users\DeleteUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected string $flashMessageObj = 'user';

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
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUser $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->route('dshb.users.index')->with(
            $this->createdFlashMessage()
        );
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
    public function edit(Request $request): View
    {
        $user = $request->route('m_user');
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request)
    {
        $request->fulfill();

        return redirect()->route('dshb.users.index')->with(
            $this->updatedFlashMessage()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteUser $request)
    {
        $request->fulfill();

        return redirect()->route('dshb.users.index')->with(
            $this->deletedFlashMessage()
        );
    }
}
