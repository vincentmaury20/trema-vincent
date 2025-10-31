<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isPublished = false;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }
    public function isPublished(): bool
    {
        return $this->isPublished;
    }
    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;
        return $this;
    }
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }
}
// Cette classe représente l’entité "Formation" utilisée par Doctrine pour gérer les données en base.
// Elle définit les propriétés que je veux stocker :
// - id : identifiant unique, auto-généré
// - title : titre de la formation
// - content : description détaillée
// - isPublished : booléen pour savoir si la formation est visible ou non
// - createdAt : date de création, automatiquement définie à l’instanciation

// Grâce aux annotations #[ORM\Column], Symfony sait comment mapper chaque propriété à une colonne SQL.

// Les méthodes get/set me permettent d’accéder et de modifier les données de chaque propriété.
// Le constructeur initialise automatiquement la date de création avec la date du jour.

// Cette entité est utilisée dans EasyAdmin pour créer, modifier et afficher les formations dans le back-office.