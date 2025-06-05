<?php
namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function get(){
        return Client::all();
    }

    public function details(int $id)
    {
        return Client::findOrFail($id);
    }

    public function store(array $data)
    {
        return Client::create($data);
    }

    public function update(int $id, array $data)
    {
        $client = $this->details($id);
        $client->update($data);
        return $client;
    }

    public function delete(int $id)
    {
        $client = $this->details($id);
        $client->delete();
        return $client;
    }

    public function getWithReviews()
    {
        return Client::with('reviews')->get();
    }

    public function findReviews(int $id)
    {
        $client = $this->details($id);
        return $client->reviews;
    }
}
