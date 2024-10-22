<?php

namespace App\Services;

use App\Http\Resources\Lot\LotResource;
use App\Models\Lot;
use Illuminate\Support\Facades\Auth;

class LotService
{
    public function getAllLots($request)
    {
        $query = Lot::query();

        if (isset($request->q)) {
            $query = $query
                ->where('title', 'like', '%' . $request->q . '%')
                ->orWhere('description', 'like', '%' . $request->q . '%');
        }

        $lots = $query->get();
        return response()->json(['data' => LotResource::collection($lots)]);
    }

    public function createLot($data)
    {
        $userID = Auth::id();
        $data['user_id'] = $userID;

        $lot = Lot::query()->updateOrCreate($data);

        return response()->json(['data' => LotResource::make($lot)]);
    }

    public function updateLot($id, $data)
    {
        $lot = Lot::query()->findOrFail($id);
        $lot->update($data);

        return response()->json(['data' => LotResource::make($lot)]);
    }

    public function deleteLot($id)
    {
        $lot = Lot::query()->findOrFail($id);
        $lot->delete();

        return response()->json(['message' => 'lot deleted successfully'], 200);
    }
}
