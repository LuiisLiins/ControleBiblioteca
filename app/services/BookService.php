<?php
namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository){
        $this->bookRepository = $bookRepository;
    }

    public function get()
    {
        return $this->bookRepository->get();
    }

    public function getWithAuthor()
    {
        return $this->bookRepository->getWithAuthor();
    }

    public function getWithReviews()
    {
        return $this->bookRepository->getWithReviews();
    }

    public function details(int $id)
    {
        return $this->bookRepository->details($id);
    }

    public function store(array $data)
    {
        return $this->bookRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->bookRepository->delete($id);
    }

    public function findGender(int $id)
    {
        return $this->bookRepository->findGender($id);
    }

    public function findAuthor(int $id)
    {
        return $this->bookRepository->findAuthor($id);
    }

    public function findReviews(int $id)
    {
        return $this->bookRepository->findReviews($id);
    }
}
