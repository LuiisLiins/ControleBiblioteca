<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    private ClientService $clientService;

    public function __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }

    public function get(){
        $clients = $this->clientService->get();
        return ClientResource::collection($clients);
    }

    public function getWithReviews()
    {
        $clients = $this->clientService->getWithReviews();
        return ClientResource::collection($clients);
    }
    
    public function details($id)
    {
        try{
            $client = $this->clientService->details($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Client not found'],404);
        }
        return new ClientResource($client);
    }

    public function store(ClientStoreRequest $request){
        $data = $request->validated();
        $client = $this->clientService->store($data);
        return new ClientResource($client);
    }

    public function update($id, ClientUpdateRequest $request)
    {
        $data = $request->validated();

        try {
            $client = $this->clientService->update((int) $id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return new ClientResource($client);
    }

    public function delete(int $id)
    {
        try{
            $client = $this->clientService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Client not found'],404);
        }
        return new ClientResource($client);
    }

    public function findReviews(int $id)
    {
        try {
            $reviews = $this->clientService->findReviews($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json(['data' => $reviews]);
    }

}
