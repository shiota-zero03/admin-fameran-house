<?php

namespace App\Process\Responses;

class ApiResponse
{
    public function successResponse($data)
    {
        $request = [
            'message' => $data['message']
        ];
        if(isset($data['data'])) $request = array_merge($request, ['data' => $data['data']]);
        if(isset($data['extra'])) $request = array_merge($request, ['extra' => $data['extra']]);
        return response()->json($request, $data['code']);
    }
}
