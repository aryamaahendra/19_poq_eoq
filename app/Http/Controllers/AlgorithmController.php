<?php

namespace App\Http\Controllers;

use App\Actions\Algorithm\DTAlgorithm;
use App\Actions\Metode;
use App\Models\Component;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AlgorithmController extends Controller
{
    public function index(): View
    {
        $data = Cache::get('order_dates', null);
        return view('algorithm.index', compact('data'));
    }

    public function data(DTAlgorithm $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    public function proses(Request $request)
    {
        $components = Component::all();
        $maxof = (int) $request->input('maxof');
        $dates = explode(',', $request->input('order_date'));

        Metode::proses($components, $dates, $maxof);

        return redirect()->route('dshb.algoritm.index');
    }
}
