<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null; // on a l'id

    #[ORM\Column(length: 255)]
    private ?string $title = null; // le titre de la page

    #[ORM\Column(length: 255)]
    private ?string $subtitle = null; // le sous-titre de la page

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;   // le slug de la page

    #[ORM\Column(length: 2000)]
    private ?string $content = null; // le contenu de la page

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $image = null; // l'image de la page

    #[ORM\Column(type: 'boolean')]
    private bool $Published = false;


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

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }
    public function isPublished(): bool
    {
        return $this->Published;
    }
    public function setPublished(bool $Published): static
    {
        $this->Published = $Published;
        return $this;
    }
}
