<?php


namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Service\PageMenuService;

class PageMenuExtension extends AbstractExtension
{
   private PageMenuService $pageMenuService;

   public function __construct(PageMenuService $pageMenuService)
   {
      $this->pageMenuService = $pageMenuService;
   }

   public function getFunctions(): array
   {
      return [
         new TwigFunction('menu_pages', [$this->pageMenuService, 'getPublishedPages']),
      ];
   }
}
