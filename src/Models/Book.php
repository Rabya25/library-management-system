<?php
declare(strict_types=1);
namespace App\Models;

use App\Contracts\Borrowable;
use App\Exceptions\BookAlreadyBorrowedException;
use App\Exceptions\BookNotAvailableException;

class Book implements Borrowable{
    public bool $isBorrowed = false;
    public function __construct(
        public string $title, 
        public string $author, 
        public string $isbn){}
    
    public function borrow(): void{
        if($this->isBorrowed){
            throw new BookAlreadyBorrowedException("Book '{$this->title}' is already borrowed");           
        } $this->isBorrowed = true;
    }  

     public function returnBook(): void {
        if ($this->isBorrowed === false) {
            throw new BookNotAvailableException("Book '{$this->title}' is not currently borrowed");
        }
        $this->isBorrowed = false;
    }

    public function isAvailable(): bool{
        return !$this->isBorrowed;
    }
}