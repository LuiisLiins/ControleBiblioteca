<?php
namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository){
        $this->clientRepository = $clientRepository;
    }

    public function get()
    {
        return $this->clientRepository->get();
    }

    

    public function details(int $id)
    {
        return $this->clientRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->clientRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->clientRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->clientRepository->delete($id);
    }

    public function getWithReviews()
    {
        return $this->clientRepository->getWithReviews();
    }

    public function findReviews(int $id)
    {
        return $this->clientRepository->findReviews($id);
    }
}
