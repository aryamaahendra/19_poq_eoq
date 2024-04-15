<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KanbanController extends Controller
{
    public function data(): JsonResponse
    {
        return response()->json(
            [
                [
                    "id" => Str::orderedUuid(),
                    "title" => "Pendding",
                    "item" =>  []
                ],
                [
                    "id" => Str::orderedUuid(),
                    "title" => "Delivery",
                    "item" =>  []
                ],
                [
                    "id" => Str::orderedUuid(),
                    "title" => "Success",
                    "item" =>  []
                ]
            ]
        );
    }
}
