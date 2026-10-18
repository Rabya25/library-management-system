<?php
declare(strict_types=1);
namespace App\Models;

class Member{
    public array $borrowedBooks = [];
    public function __construct(
        public string $name, public int $id
    ){}

   public function addBorrowedBook(Book $book): void{
        $this->borrowedBooks[] = $book;
    }

   public function removeBorrowedBook(Book $book): void{
    $this->borrowedBooks = array_values(array_filter($this->borrowedBooks, fn(Book $b)=> $b->isbn !== $book->isbn)); 
   }

   public function getBorrowedCount(): int{
    return count($this->borrowedBooks);
   }

}