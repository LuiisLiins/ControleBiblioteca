<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function get(){
        return Book::all();
    }

    public function getWithAuthor()
    {
        return Book::with('author')->get();
    }

    public function getWithReviews()
    {
        return Book::with(['reviews'])->get();
    }

    public function details(int $id)
    {
        return Book::findOrFail($id);
    }

    public function store(array $data)
    {
        return Book::create($data);
    }

    public function update(int $id, array $data)
    {
        $book = $this->details($id);
        $book->update($data);
        return $book;
    }

    public function delete(int $id)
    {
        $book = $this->details($id);
        $book->delete();
        return $book;
    }

    public function findGender(int $id)
    {
        $book = $this->details($id);
        return $book->gender;
    }

    public function findAuthor(int $id)
    {
        $book = $this->details($id);
        return $book->author;
    }

    public function findReviews(int $id)
    {
        $book = $this->details($id);
        return $book->reviews;
    }
}
