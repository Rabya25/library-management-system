<?php
declare(strict_types=1);
namespace App\Models;

use App\Traits\Timestampable;

class Loan{
    use Timestampable;
    public function __construct(public Member $member, public Book $book){$this->touch();}
    public function endLoan(): void{
        $this->touch();
    }
    
}