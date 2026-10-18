<?php
declare(strict_types=1);
require __DIR__ . "/../vendor/autoload.php";

use App\Models\Book;
use App\Models\Member;
use App\Models\Librarian;
use App\Models\Loan;
use App\Exceptions\BookAlreadyBorrowedException;
use App\Exceptions\BookNotAvailableException;

$book1 = new Book("PHP Basics", "Ali", "978-111");
$book2 = new Book("JS Guide", "Sara", "978-222");
$book3 = new Book("Python 101", "Hina", "978-333");

$member = new Member("Ahmad", 1);
$librarian = new Librarian("Madam Fatima", 100);
echo "=== Library System === \n";
echo $librarian->getInfo() . "\n";

$book1->borrow();
$member->addBorrowedBook($book1);
$loan = new Loan($member, $book1);
echo "{$member->name} borrowed {$book1->title}\n" ;
echo "Ahmad has {$member->getBorrowedCount()} book(s)\n";

try{$book1->borrow();
}catch(BookAlreadyBorrowedException $e)
{ echo "Error: " . $e->getMessage() . "\n";}

$book1->returnBook();
$member->removeBorrowedBook($book1);
$loan->endLoan();
echo "{$member->name} returned {$book1->title}\n" ;
echo "Ahmad has {$member->getBorrowedCount()} book(s)\n";

try{$book1->returnBook();
}catch(BookNotAvailableException $e)
{ echo "Error: " . $e->getMessage() . "\n";}

