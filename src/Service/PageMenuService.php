<?php

namespace App\Service;

use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;

class PageMenuService
{
   private EntityManagerInterface $em;

   public function __construct(EntityManagerInterface $em)
   {
      $this->em = $em;
   }

   public function getPublishedPages(): array
   {
      return $this->em->getRepository(Page::class)->findBy(['published' => true]);
   }
}
