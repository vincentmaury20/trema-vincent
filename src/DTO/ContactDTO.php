<?php

namespace App\DTO; // DTO = Data Transfer Object

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
   /**
    * Nom de l'expéditeur
    */
   #[Assert\NotBlank(message: "Le nom est obligatoire.")]
   #[Assert\Length(min: 2, max: 100, minMessage: "Le nom doit contenir au moins {{ limit }} caractères.")]
   private ?string $name = null;

   /**
    * Adresse email de l'expéditeur
    */
   #[Assert\NotBlank(message: "L'adresse email est obligatoire.")]
   #[Assert\Email(message: "L'adresse email n'est pas valide.")]
   private ?string $email = null;

   /**
    * Contenu du message
    */
   #[Assert\NotBlank(message: "Le message ne peut pas être vide.")]
   #[Assert\Length(min: 10, minMessage: "Le message doit contenir au moins {{ limit }} caractères.")]
   private ?string $message = null;

   // Getters / Setters
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
