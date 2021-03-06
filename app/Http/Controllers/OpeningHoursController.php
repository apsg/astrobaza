<?php
namespace App\Http\Controllers;

use App\Http\Requests\OpeningsStoreRequest;
use App\Models\Opening;

class OpeningHoursController extends Controller
{
    public function store(OpeningsStoreRequest $request)
    {
        Opening::create($request->all());

        return back();
    }

    public function destroy(Opening $opening)
    {
        $opening->delete();

        return response()->json([], 200);
    }
}
