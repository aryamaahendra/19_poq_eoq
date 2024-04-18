<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KanbanController extends Controller
{
    public function data(): JsonResponse
    {
        $Kanban = Kanban::first();
        return response()->json($Kanban);
    }
}
