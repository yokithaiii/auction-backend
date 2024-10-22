<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lot\LotStoreRequest;
use App\Http\Requests\Lot\LotUpdateRequest;
use App\Models\Lot;
use App\Presenters\JsonPresenter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    public function __construct(
        private readonly JsonPresenter $presenter
    )
    {
    }

    public function index(): JsonResponse
    {
        $lots = Lot::all();
        return response()->json(['data' => $lots]);
    }

    public function store(LotStoreRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        $lot = new Lot();
        $lot->seller_id = $user->id;
        $lot->title = $data['title'];
        $lot->description = $data['description'];
        $lot->price = $data['price'];
        $lot->quantity = $data['quantity'];
        $lot->start_date = $data['start_date'];
        $lot->end_date = $data['end_date'];
        $lot->category_id = $data['category_id'];

        $response = ['data' => $lot];
        $this->presenter->present($response);
    }

    public function update(LotUpdateRequest $request, String $id)
    {
        $lot = Lot::query()->findOrFail($id);
        $data = $request->validated();
    }

    public function destroy(String $id)
    {
        $lot = Lot::query()->findOrFail($id);
        $lot->delete();
    }
}
