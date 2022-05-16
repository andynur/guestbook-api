<?php

namespace App\Http\Controllers;

use App\Template;
use App\Whatsapp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WhatsappController extends Controller
{
    /**
     * Controller constructor.
     *
     * @param  \App\Whatsapp  $whatsapps
     */
    public function __construct(Whatsapp $whatsapps, Template $template)
    {
        $this->whatsapps = $whatsapps;
        $this->template = $template;
    }

    /**
     * get whatsapp template.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function template(): JsonResponse
    {
        $data = [
            'template' => $this->template->first(),
            'histories' => $this->whatsapps->all(),
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Update a whatsapp template.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function templateUpdate(Request $request): JsonResponse
    {
        $this->validate($request, ['message' => 'required']);
        
        $template = $this->template->first();
        $template->update(['message' => $request->message]);

        return response()->json($template, Response::HTTP_OK);
    }

    /**
     * Send whatsapp message.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);
        
        $whatsapps = $this->whatsapps->create($request->all());

        return response()->json($whatsapps, Response::HTTP_CREATED);
    }
}
