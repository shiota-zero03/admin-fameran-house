<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Process\Repositories\WebOrderRepository;
use App\Process\Rules\WebOrderRules;
use App\Process\Responses\ApiResponse;

use App\Mail\ResponseMessageOrder;
use Illuminate\Support\Facades\Mail;

use DataTables;

class MessageController extends Controller
{
    protected $repo, $rules, $res;
    public function __construct(WebOrderRepository $repo, WebOrderRules $rules, ApiResponse $res)
    {
        $this->repo = $repo;
        $this->rules = $rules;
        $this->res = $res;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of($this->repo->showDataDesc())
                            ->addIndexColumn()
                            ->addColumn('waktu', function($row){
                                return date('d-m-Y H:i:s', strtotime($row['created_at']));
                            })
                            ->addColumn('action', function($row){
                                return '
                                            <button data-toggle="tooltip" data-placement="bottom" title="Balas pesan" onclick="editData('.$row['id'].')" class="btn btn-primary"><i class="mx-0 my-0 zmdi zmdi-comment-edit"></i></button>
                                            <button data-toggle="tooltip" data-placement="bottom" title="Hapus pesan" onclick="deleteData('.$row['id'].')" class="btn btn-danger"><i class="mx-0 my-0 zmdi zmdi-delete"></i></button>
                                        ';
                            })
                            ->rawColumns(['waktu', 'action'])
                            ->make(true);
        }
        return view('pages.admin.web.kotak-masuk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->res->successResponse([
            'message' => 'Data berhasil ditemukan',
            'data' => $this->repo->getById($id),
            'code' => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $getData = $this->repo->getById($id);
        $data = [
            'name' => $getData->name,
            'email' => $getData->email,
            'whatsapp' => $getData->whatsapp,
            'message' => $getData->message,
            'institution' => $getData->institution,
            'status' => 'Pending',
            'response' => $request->input('balasan')
        ];
        return $request->balasan;
        $this->repo->updateData($data, $id);
        $send = Mail::to($getData->email)->send(new ResponseMessageOrder($data));

        return $this->res->successResponse([
            'message' => 'Pesan berhasil dibalas',
            'data' => $data,
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
