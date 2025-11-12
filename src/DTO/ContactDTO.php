<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
   /**
    * Civilité (sexe)
    */
   #[Assert\NotBlank(message: "La civilité est obligatoire.")]
   #[Assert\Choice(choices: ["Homme", "Femme", "Autre"], message: "La civilité doit être 'Homme', 'Femme' ou 'Autre'.")]
   private ?string $gender = null;

   /**
    * Prénom de l'expéditeur
    */
   #[Assert\NotBlank(message: "Le prénom est obligatoire.")]
   #[Assert\Length(min: 2, max: 100, minMessage: "Le prénom doit contenir au moins {{ limit }} caractères.")]
   private ?string $lastName = null;

   /**
    * Nom de l'expéditeur
    */
   #[Assert\NotBlank(message: "Le nom est obligatoire.")]
   #[Assert\Length(min: 2, max: 100, minMessage: "Le nom doit contenir au moins {{ limit }} caractères.")]
   private ?string $firstName = null;

   /**
    * Adresse email de l'expéditeur
    */
   #[Assert\NotBlank(message: "L'adresse email est obligatoire.")]
   #[Assert\Email(message: "L'adresse email n'est pas valide.")]
   private ?string $email = null;

   /**
    * Numéro de téléphone
    */
   #[Assert\NotBlank(message: "Le numéro de téléphone est obligatoire.")]
   #[Assert\Regex(pattern: "/^\+?[0-9\s\-]{7,20}$/", message: "Le numéro de téléphone n'est pas valide.")]
   private ?string $phone = null;

   /**
    * Contenu du message
    */
   #[Assert\NotBlank(message: "Le message ne peut pas être vide.")]
   #[Assert\Length(min: 10, minMessage: "Le message doit contenir au moins {{ limit }} caractères.")]
   private ?string $message = null;

   // Getters / Setters
   public function getGender(): ?string
   {
      return $this->gender;
   }
   public function setGender(?string $gender): static
   {
      $this->gender = $gender;
      return $this;
   }

   public function getLastName(): ?string
   {
      return $this->lastName;
   }
   public function setLastName(?string $lastName): static
   {
      $this->lastName = $lastName;
      return $this;
   }

   public function getFirstName(): ?string
   {
      return $this->firstName;
   }
   public function setFirstName(?string $firstName): static
   {
      $this->firstName = $firstName;
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

   public function getPhone(): ?string
   {
      return $this->phone;
   }
   public function setPhone(?string $phone): static
   {
      $this->phone = $phone;
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
// Cette classe représente un DTO (Data Transfer Object) pour le formulaire de contact de mon site.
// Elle ne correspond pas à une entité stockée en base de données, mais sert uniquement à transporter les données saisies par l’utilisateur.

// Elle contient trois propriétés :
// - name : le nom de l’expéditeur
// - email : son adresse email
// - message : le contenu du message

// Chaque propriété est annotée avec des contraintes de validation Symfony (Assert\...).
// Ces contraintes permettent de vérifier que l’utilisateur a bien rempli le formulaire correctement :
// - NotBlank : le champ ne doit pas être vide
// - Length : impose une longueur minimale (et maximale pour le nom)
// - Email : vérifie que l’adresse email est bien au bon format

// Ces règles sont automatiquement appliquées quand je lie ce DTO à un formulaire Symfony.
// Si une règle n’est pas respectée, un message d’erreur personnalisé est affiché à l’utilisateur.

// Les getters/setters permettent à Symfony de lire et d’écrire les données dans l’objet pendant le traitement du formulaire.

// En résumé : ce DTO me permet de structurer et valider les données d’un formulaire de contact sans avoir besoin de créer une entité Doctrine.