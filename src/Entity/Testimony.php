<?php

namespace App\Entity;

use App\Repository\TestimonyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TestimonyRepository::class)]
class Testimony
{
    // Identifiant unique — auto-généré
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Date du témoignage — obligatoire, choisie par l'utilisateur
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: "La date du témoignage est obligatoire.")]
    private ?\DateTime $date = null;

    // Titre du témoignage — obligatoire
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le titre est obligatoire.")]
    private ?string $title = null;

    // Contenu du témoignage — obligatoire
    #[ORM\Column(length: 5000)]
    #[Assert\NotBlank(message: "Le contenu est obligatoire.")]
    private ?string $content = null;

    #[ORM\Column(length: 5000)]
    #[Assert\NotBlank(message: "Le contenu est obligatoire.")]
    private ?string $author = null;

    // Nom du témoin — obligatoire
    #[ORM\Column(length: 5000)]
    #[Assert\NotBlank(message: "Le nom du témoin est obligatoire.")]
    private ?string $name = null;

    // Date de création du témoignage — générée automatiquement
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'boolean')]
    private bool $isPublished = false;


    // Constructeur : initialise automatiquement la date de création
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    // Getters / Setters

    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;
        return $this;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
}
