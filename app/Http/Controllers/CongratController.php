<?php

namespace App\Http\Controllers;

use App\Congrat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CongratController extends Controller
{
    /**
     * Controller constructor.
     *
     * @param  \App\Congrat  $congrats
     */
    public function __construct(Congrat $congrats)
    {
        $this->congrats = $congrats;
    }

    /**
     * Get all the congrats.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $congrats = $this->congrats->all();

        return response()->json($congrats, Response::HTTP_OK);
    }

    /**
     * Store a congrat.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'message' => 'required'
        ]);

        $congrat = $this->congrats->create($request->all());

        return response()->json($congrat, Response::HTTP_CREATED);
    }
}
