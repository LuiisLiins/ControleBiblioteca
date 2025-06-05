<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClientController extends Controller
{
    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function get()
    {
        $clients = $this->clientService->get();
        return ClientResource::collection($clients);
    }

    public function details(int $id)
    {
        try {
            $client = $this->clientService->details($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return new ClientResource($client);
    }

    public function store(ClientStoreRequest $request)
    {
        $data = $request->validated();

        $client = $this->clientService->store($data);

        return new ClientResource($client);
    }

    public function update(int $id, ClientUpdateRequest $request)
    {
        $data = $request->validated();

        try {
            $client = $this->clientService->update($id, $data);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return new ClientResource($client);
    }

    public function delete(int $id)
    {
        try {
            $client = $this->clientService->delete($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json(['message' => 'Client deleted successfully']);
    }

    public function getWithReviews()
    {
        $clients = $this->clientService->getWithReviews();
        return ClientResource::collection($clients);
    }

    public function findReviews(int $id)
    {
        try {
            $reviews = $this->clientService->findReviews($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        return response()->json($reviews);
    }
}
