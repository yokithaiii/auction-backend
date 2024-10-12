<?php

namespace App\Http\Controllers\Ping;

use App\Http\Controllers\Controller;
use App\Presenters\JsonPresenter;
use Illuminate\Http\JsonResponse;

class PingController extends Controller
{
    public function __construct(
        private JsonPresenter $presenter
    )
    {
    }

    /**
     * Ping-pong route
     *
     * @return JsonResponse
     */
    public function ping(): JsonResponse
    {
        $response = ['message' => 'pong'];
        return $this->presenter->present($response);
    }
}
