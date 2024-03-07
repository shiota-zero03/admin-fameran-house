<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Process\Repositories\WebOrderRepository;
use App\Process\Rules\WebOrderRules;
use App\Process\Responses\ApiResponse;

use App\Mail\WebOrderMail;
use Illuminate\Support\Facades\Mail;

class WebFormController extends Controller
{
    protected $repo, $rules, $res;
    public function __construct(WebOrderRepository $repo, WebOrderRules $rules, ApiResponse $res)
    {
        $this->repo = $repo;
        $this->rules = $rules;
        $this->res = $res;
    }
    public function store(Request $request)
    {
        $this->rules->storeRules($request);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'message' => $request->message,
            'institution' => $request->institution,
            'status' => 'Pending'
        ];
        $send = Mail::to($request->email)->send(new WebOrderMail($data));

        $create = $this->repo->createData($data);
        if($create){
            return $this->res->successResponse([
                'message' => 'Data send succesfully',
                'data' => $create,
                'code' => 200
            ]);
        }
        return $this->res->errorResponse([
            'message' => 'Internal server error',
            'code' => 500
        ]);
    }
}
