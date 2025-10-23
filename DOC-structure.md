# Structure du projet — Tréma

Ce document décrit brièvement le rôle des dossiers et fichiers principaux du projet. Il est destiné aux nouveaux développeurs pour faciliter la prise en main.

## Racine

-   `composer.json` : configuration des dépendances PHP (Composer) et autoload.
-   `compose.yaml` / `compose.override.yaml` : fichiers Docker Compose pour lancer les services (base de données, serveur, etc.).
-   `bin/` : scripts exécutables du projet (ex : `console` pour Symfony).
-   `public/` : racine publique du serveur web (contient `index.php`, assets compilés).
-   `Logbook.md` : journal du projet, notes et avancement.
-   `phpunit.dist.xml` : configuration PHPUnit pour les tests.

## Code applicatif

-   `src/` : code source PHP de l'application.
    -   `src/Controller/` : contrôleurs HTTP (actions qui retournent des Response/Twig/JSON).
    -   `src/Entity/` : entités Doctrine (modèles persistés en base).
    -   `src/Repository/` : classes pour requêtes personnalisées (QueryBuilder/DQL).
    -   `src/Form/` : FormType Symfony (définition des formulaires).
    -   `src/Security/` : authenticators, providers, règles de sécurité.
    -   `src/Command/` : commandes console (Console) pour tâches d'administration.
    -   `src/Service/` : services métiers ou utilitaires (si présents).

## Front-end et templates

-   `assets/` : sources front-end (JS, CSS), contrôleurs Stimulus, point d'entrée JS.
    -   `assets/controllers/` : contrôleurs Stimulus.
    -   `assets/styles/` : fichiers CSS source.
-   `templates/` : templates Twig pour le rendu des pages, organisés par fonctionnalité.
    -   `base.html.twig` : layout global.

## Configuration et déploiement

-   `config/` : configuration Symfony (services, packages, routes).
    -   `config/packages/` : configuration des bundles (doctrine, security, twig...).
    -   `config/routes/` : définition des routes.
-   `migrations/` : fichiers de migration Doctrine (versionnement du schéma de la base).
-   `var/` : cache et logs générés à l'exécution.
-   `vendor/` : dépendances installées par Composer (ne pas modifier manuellement).

## Tests et traductions

-   `tests/` : tests PHPUnit.
-   `translations/` : fichiers de traduction pour l'internationalisation.

## Conseils pratiques

-   Documenter toute modification structurelle dans `Logbook.md` ou `DOC-structure.md`.
-   Ajouter des descriptions courtes pour les nouvelles entités et services.
-   Pour onboarding, garder ce fichier à jour et committer les changements.
