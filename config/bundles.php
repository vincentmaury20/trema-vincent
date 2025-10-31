<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Symfony\UX\StimulusBundle\StimulusBundle::class => ['all' => true],
    Symfony\UX\Turbo\TurboBundle::class => ['all' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle::class => ['dev' => true, 'test' => true],
    Symfony\UX\TwigComponent\TwigComponentBundle::class => ['all' => true],
    EasyCorp\Bundle\EasyAdminBundle\EasyAdminBundle::class => ['all' => true],
];

// Ce fichier me permet de déclarer tous les bundles que Symfony doit charger au démarrage de l’application.
// Chaque ligne correspond à un bundle, et je peux définir dans quels environnements il est actif :
// - 'all' => true : le bundle est actif partout (dev, test, prod)
// - 'dev' => true : actif uniquement en développement
// - 'test' => true : actif uniquement en test

// Par exemple :
// - Le WebProfilerBundle est utile pour le debug, donc activé en dev et test, mais pas en prod.
// - Le MakerBundle sert à générer du code (ex : contrôleurs), donc activé uniquement en dev.
// - Le FrameworkBundle est le cœur de Symfony, donc toujours actif.

// Cette organisation me permet d’optimiser les performances en production en ne chargeant que ce qui est nécessaire.
// Elle rend aussi mon projet plus clair et modulaire selon l’environnement dans lequel je travaille.