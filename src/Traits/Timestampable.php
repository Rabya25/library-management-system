<?php
declare(strict_types=1);
namespace App\Traits;

use DateTime;

trait Timestampable{
    public ?DateTime $createdAt = null;
    public ?DateTime $updatedAt = null;
    
    public function touch(): void{
        $this->updatedAt = new DateTime();
        if($this->createdAt === null){
         $this->createdAt = new DateTime();
         }
    }

    public function getCreatedAtFormatted(): string{
         if($this->createdAt === null){
            return "Not set";
         }
          return $this->createdAt->format("Y-m-d H:i:s");
    }

}