# Projet de stage Tréma

<!-- Ce fichier est vraiment juste un support personnel, comme un carnet de notes, il est destiné à être supprimé  -->

[Le site en ligne actuellement](https://www.trema-coach.com/)

## Infos générales

**Enoncé du projet**

Le site doit être éditable un maximum pour le client (certaines choses peuvent rester en dur tout de même mais l’idée c’est d’avoir quelque chose le plus modifiable possible dans le BO).

Toujours penser aussi à l’affichage, si quelque chose n’est pas rempli, ne pas l’afficher pour éviter de faire des designs moches.

L’objectif est de créer le BO pour mettre en place toutes les pages maquettes qui sont listées au début du document.

Tout ce que je vais marquer dans ce brief est pour t’aider, t’aiguiller mais rien n’est imposé. Si tu as de meilleures idées, une meilleure logique, n’hésite pas, on peut en discuter ou tu peux le faire directement. L’idée globalement c’est de rendre dynamique mes maquettes donc la façon de faire après, c’est principalement à toi de dire et de faire, toujours en pensant “client”, il faut que ce soit le plus simple possible pour lui tout en pensant à la maintenance du code de notre côté agence.

### BO “ADMINISTRATION”

# Projet de stage — Tréma (Logbook synthétique)

Ce document résume l'avancement du projet, les décisions techniques importantes et les prochains axes de travail. Il sert de carnet de bord — garder l'essentiel et les actions à mener.

## Objectif

Rendre le site éditable côté back‑office (BO) pour le client tout en conservant une UI propre côté front (FO). Priorité : facilité d'édition + maintenance pour l'agence.

## Avancement résumé

-   Entités principales mises en place : `User`, `Page`, `Formation`, `Testimony`.
-   BO : CRUDs via EasyAdmin, authentification back‑office fonctionnelle (`LoginFormAuthenticator`).
-   FO : pages d'accueil, contact (formulaire + envoi mail via DTO), soumission de témoignages publique.
-   Structure du projet : arborescence standard Symfony, migrations en place, tests et assets configurés.

## Points techniques notables

-   Les formulaires utilisent DTO / FormType / contraintes `Assert` pour la validation.
-   Les migrations Doctrine versionnent le schéma (ex. ajout de `is_published` pour `Testimony`).
-   Mailpit / MailHog ou équivalent est utilisé en dev pour intercepter les emails.

## État des tâches (high level)

-   Vues Twig : majoritairement créées, restent quelques pages à finaliser (responsive & styles).
-   Sécurité : authentification en place, reste à affiner les permissions selon rôles si besoin.
-   Formulaires : contact et témoignages fonctionnels (validation et persistance).
-   Nettoyage : suppression de fichiers inutiles et revue du code en cours.

## Problèmes rencontrés & résolutions rapides

-   Problème d'installation PostgreSQL localement (résolu manuellement puis migrations appliquées).
-   Bug classique : désynchronisation entité ↔ FormType (ex. champ `name` manquant dans le formulaire `TestimonyType`) — corrigé en ajoutant le champ et en affichant les erreurs de validation.

## Checklist technique (rappels)

-   Générer/Appliquer migrations : `symfony console make:migration` puis `symfony console doctrine:migrations:migrate`.
-   Vérifier SQL attendu : `symfony console doctrine:schema:update --dump-sql`.
-   Lancer serveur local : `symfony server:start`.

## Axes d'amélioration (priorisés)

1.  Style & expérience utilisateur (prioritaire)

    -   Harmoniser la charte (typographie, couleurs, espacements).
    -   Finaliser la refonte Bootstrap pour `formation` et pages liées.
    -   Ajouter thème clair/sombre en option.

2.  Robustesse des formulaires & anti‑spam

    -   Ajouter un honeypot ou reCAPTCHA sur les formulaires publics.
    -   Mettre en place un throttling pour limiter les envois abusifs.

3.  Tests & CI

    -   Ajouter tests unitaires pour DTO et contraintes (`Validator`), tests fonctionnels pour les formulaires et l'envoi d'emails.
    -   Intégrer PHPUnit dans CI/CD et exécuter tests sur chaque PR.

4.  Administration & UX du BO

    -   Permettre au client d'insérer des blocs dynamiques (éditeur WYSIWYG ou blocs réutilisables).
    -   Améliorer le dashboard admin avec accès directs aux actions courantes.

5.  Monitoring & déploiement

    -   Ajouter logs structurés et métriques (usage du mailer, erreurs 5xx).
    -   Préparer `.env` pour staging/prod et documenter la procédure de déploiement.

6.  SEO & URLs
    -   Ajouter champ `slug` aux entités pertinentes et générer des URLs propres.
    -   Ajouter métadonnées et sitemap si besoin.

## Prochaines actions recommandées (court terme)

-   Finaliser les styles des pages critiques (home, formation, contact).
-   Écrire 2 tests unitaires (DTO contact + DTO testimony) et 1 test fonctionnel (soumission contact).

## Ça mérite un peu d'explication ...

Avec mes mots, l'entité page nous sert bien sûr de base pour toutes les données à récolter et il en découle pas mal de méthodes dans chaque controlleurs crud ou non, des service et d'extensions twig ....
Tableau explicatif ici:

| Fichier                     | Rôle principal                           | Responsabilité clé                                                                     |
| --------------------------- | ---------------------------------------- | -------------------------------------------------------------------------------------- |
| `Page.php` (Entité)         | Structure des données                    | Définit les propriétés (title, slug, content...) et les getters/setters                |
| `PageCrudController.php`    | Gestion admin des pages via EasyAdmin    | Gère les formulaires, surcharge `persistEntity()` pour générer un slug automatiquement |
| `PageMenuService.php`       | Service métier pour les pages publiées   | Fournit `getPublishedPages()` pour centraliser la logique de récupération              |
| `PageMenuExtension.php`     | Extension Twig personnalisée             | Expose `menu_pages()` dans les templates Twig pour afficher les pages publiées         |
| `show.html.twig` (Template) | Affichage public d’une page via son slug | Utilise la variable `page` pour afficher dynamiquement le contenu de la page           |

Mais en une phrase :
Les cinq fichiers liés à l’affichage d’une page via son slug collaborent de cette manière : l’entité définit la structure des données, le contrôleur admin gère leur création et leur persistance, le service récupère les pages publiées, l’extension Twig les expose aux vues, et le template affiche dynamiquement le contenu. Un peu de gymnastique ne fait pas de mal — à revoir et re-revoir pour bien intégrer tout ça.
symfony serve
