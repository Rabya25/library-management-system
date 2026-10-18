<?php
declare(strict_types=1);
namespace App\Models;

class Librarian{
    public function __construct(public string $name, public int $employeeId){}
    public function getInfo(): string{
     return "Librarian: {$this->name} (ID: {$this->employeeId})";
    }
 }