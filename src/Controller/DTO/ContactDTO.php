<?php

namespace App\Controller\DTO; // DTO veut dire Data Transfer Object "objet de transfert de données"

class ContactDTO
{
   private ?string $name = null;
   private ?string $email = null;
   private ?string $message = null;

   public function getName(): ?string
   {
      return $this->name;
   }
   public function setName(?string $name): static
   {
      $this->name = $name;
      return $this;
   }

   public function getEmail(): ?string
   {
      return $this->email;
   }
   public function setEmail(?string $email): static
   {
      $this->email = $email;
      return $this;
   }

   public function getMessage(): ?string
   {
      return $this->message;
   }
   public function setMessage(?string $message): static
   {
      $this->message = $message;
      return $this;
   }
}
