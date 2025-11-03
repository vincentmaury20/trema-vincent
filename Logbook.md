# Projet de stage Tréma

<!-- Ce fichier est vraiment juste un support personnel, comme un carnet de notes, il est destiné à être supprimé  -->

[Le site en ligne actuellement](https://www.trema-coach.com/)

## Infos générales

**Enoncé du projet**

Le site doit être éditable un maximum pour le client (certaines choses peuvent rester en dur tout de même mais l’idée c’est d’avoir quelque chose le plus modifiable possible dans le BO).

Toujours penser aussi à l’affichage, si quelque chose n’est pas rempli, ne pas l’afficher pour éviter de faire des designs moches.

L’objectif est de créer le BO pour mettre en place toutes les pages maquettes qui sont listées au début du document.

Tout ce que je vais marquer dans ce brief est pour t’aider, t’aiguiller mais rien n’est imposé. Si tu as de meilleures idées, une meilleure logique, n’hésite pas, on peut en discuter ou tu peux le faire directement. L’idée globalement c’est de rendre dynamique mes maquettes donc la façon de faire après, c’est principalement à toi de dire et de faire, toujours en pensant “client”, il faut que ce soit le plus simple possible pour lui tout en pensant à la maintenance du code de notre côté agence.

### FO “STYLE DES PAGES”

Les indications dans le code ont été mises pour un projet ne partant pas de zéro, c’est à dire qu’on a développé une base, à l’image d’un CMS comme Wordpress, pour nous éviter de développer à chaque fois des choses qui sont récurrentes (pages, menus, etc.). Donc possible que toutes les indications ne soient pas pertinentes, mais surtout demande moi si tu as besoin (Discord de préférence pour gérer en fonction des urgences ^^).

### BO “ADMINISTRATION”

Définir les Entity et les champs nécessaires (avec leur type, s’ils sont obligatoires, etc.). Possible de faire sur un GoogleSheet ou toute autre ressource de ton choix.
Faire valider par l’équipe avant de développer.

### ORGANISATION DU PROJET

1. Prise en main du projet, installation en local de symfony, lecture du brief, analyse des maquettes et des commentaires dans le code

2. Faire un listing de toutes les entités dont on va avoir besoin + les champs présents à l’intérieur -> Nous montrer

3. Création d’un login sécurisé pour se connecter au BO

4. Mise en place du BO et du FO (voir avec nous l’ordre à effectuer, on fera peut-être pas toutes les pages)

5. Mise en place de la vue contact avec création d’un formulaire fonctionnel

# Lundi 20/10

## Entités du projet Tréma

### User

| Champ     | Type          | Contraintes | Description                       |
| --------- | ------------- | ----------- | --------------------------------- |
| ID        | Integer       | Obligatoire | Identifiant unique du user        |
| name      | VARCHAR (255) | Obligatoire | Nom et prénom du user             |
| email     | VARCHAR(100)  | Obligatoire | Email du user                     |
| password  | TEXT          | Obligatoire | Code d'identification à hasher    |
| role      | VARCHAR(100)  | Obligatoire | Rôle du user                      |
| createdAt | TIMESTAMP     | Auto-généré | Date de création du compte (auto) |

---

### Page

| Champ   | Type    | Contraintes | Description        |
| ------- | ------- | ----------- | ------------------ |
| ID      | Integer | Obligatoire | Identifiant unique |
| title   | VARCHAR | Obligatoire | Titre de la page   |
| content | TEXT    | Obligatoire | Contenu HTML       |

---

### Formation

| Champ   | Type         | Contraintes | Description             |
| ------- | ------------ | ----------- | ----------------------- |
| ID      | Integer      | Obligatoire | Identifiant unique      |
| title   | VARCHAR(100) | Obligatoire | Nom de la formation     |
| content | TEXT         | Obligatoire | Contenu de la formation |

---

### Category

| Champ | Type         | Contraintes | Description         |
| ----- | ------------ | ----------- | ------------------- |
| ID    | Integer      | Obligatoire | Identifiant unique  |
| title | VARCHAR(100) | Obligatoire | Nom de la catégorie |

---

### Testimony

| Champ   | Type         | Contraintes | Description            |
| ------- | ------------ | ----------- | ---------------------- |
| ID      | Integer      | Obligatoire | Identifiant unique     |
| title   | VARCHAR(100) | Obligatoire | Nom de la catégorie    |
| content | TEXT         | Obligatoire | Contenu du commentaire |

---

### SocialMedia

| Champ | Type         | Contraintes | Description                 |
| ----- | ------------ | ----------- | --------------------------- |
| ID    | Integer      | Obligatoire | Identifiant unique          |
| title | VARCHAR(100) | Obligatoire | Nom de la catégorie         |
| link  | VARCHAR(100) | Obligatoire | Liens vers le réseau social |

### Les associations

Il faut absolument que je reprenne les associations dans le MOCODO, il faut que je travaille là-dessus.

---

Voilà où j'en suis pour le moment

USER: Code_User, name, email, password, role
ACCESS TO, 0N [admin]FORMATION, 0N PAGE, 0N CATEGORY, 0N

PAGE: Code_Page, title, content

FORMATION: Code_Page, title, content

CATEGORY:Code_Category,title

COMMENTARY:Code_Commentary,title, content

CONTACT:Code_Contact,title , email

SOCIAL_MEDIA:Code_Social_Media, title, link

---

#### Questions en fin de journée

Mes tables sont-elles justifiées?
Twig fonctionne comme ejs ?
Les prochaines étapes ce sera donc de faire les fichiers pour les vues...
Mettre en place une base de données avec postgresl je pense

---

### Mocodo pour le MCD

[Le lien vers la dernière version](https://www.mocodo.net/?mcd=eNp10EELwiAUB_D7-xTe3aGu3WRZCM3FZkREPCwNpM3FZvT128aSXXb78_zxfyrQI9vzDXEGgwuVxe5z78OQHo0P1gegipdKZLm8jMzoYCf7FwC0zFPBDpjxrWCztsr5F6QFZ4rjsCgha0mu7km0qZ2_kVPJi4SsJBkO4VyI3sV1I44ijgEyJnuO852LxXMEdBiP1_O6tmhr7Sp86677Nq3Btqks9E7hLi8ypkQuF2ujABrj7N3Tz_wAFgxsdw==)

**Generated by Mocodo 4.3.2**

```sql
-- Utilisateurs
CREATE TABLE user (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) DEFAULT 'ROLE_USER'
);

-- Formations
CREATE TABLE formation (
  id SERIAL PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  content TEXT
);


-- Pages
CREATE TABLE page (
  id SERIAL PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  subtitle VARCHAR(255),
  content TEXT,
  image TEXT
);

-- Témoignages
CREATE TABLE testimony (
  id SERIAL PRIMARY KEY,
  date DATE,
  title VARCHAR(100) NOT NULL,
  content TEXT
);

-- Réseaux sociaux (admin gestion des réseaux sociaux )
CREATE TABLE social_link (
  id SERIAL PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  link VARCHAR(255) NOT NULL
);


-- Création de page par utilisateur (admin)
CREATE TABLE create_page (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL,
  page_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (page_id) REFERENCES page(id)
);

-- Édition de formation par utilisateur (admin)
CREATE TABLE edit_formation (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL,
  formation_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (formation_id) REFERENCES formation(id)
);

-- Gestion des réseaux sociaux par utilisateur (admin)
CREATE TABLE manage_social_media (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL,
  social_media_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (social_media_id) REFERENCES social_media(id)
);


CREATE TABLE send_message (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL,
  contact_message_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (contact_message_id) REFERENCES contact_message(id)
);


CREATE TABLE write_testimony (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL,
  testimony_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (testimony_id) REFERENCES testimony(id)
);

ALTER TABLE category
ADD FOREIGN KEY (formation_id) REFERENCES formation(id);


ALTER TABLE create_page
ADD FOREIGN KEY (user_id) REFERENCES user(id),
ADD FOREIGN KEY (page_id) REFERENCES page(id);


ALTER TABLE edit_formation
ADD FOREIGN KEY (user_id) REFERENCES user(id),
ADD FOREIGN KEY (formation_id) REFERENCES formation(id);


ALTER TABLE manage_social_media
ADD FOREIGN KEY (user_id) REFERENCES user(id),
ADD FOREIGN KEY (social_media_id) REFERENCES social_media(id);


ALTER TABLE send_message
ADD FOREIGN KEY (user_id) REFERENCES user(id),
ADD FOREIGN KEY (contact_message_id) REFERENCES contact_message(id);


ALTER TABLE write_testimony
ADD FOREIGN KEY (user_id) REFERENCES user(id),
ADD FOREIGN KEY (testimony_id) REFERENCES testimony(id);
```

-   **CATEGORY** (id*title, *#id*title_content*)
<!-- -   **CONTACT_MESSAGE** (id_name_email_subject_message_created_at) -->
-   **CREATE_PAGE** (_#id_name_email_password_role_, _#id_title_content_)
-   **EDIT_FORMATION** (_#id_name_email_password_role_, _#id_title_content_)
-   **FORMATION** (id_title_content)
-   **MANAGE_SOCIAL_MEDIA** (_#id_name_email_password_role_, _#id_title_link_)
-   **PAGE** (id_title_content)
<!-- -   **SEND_MESSAGE** (_#id_name_email_password_role_, _#id_name_email_subject_message_created_at_) -->
-   **SOCIAL_MEDIA** (id_title_link)
-   **TESTIMONY** (id_title_content)
-   **USER** (id_name_email_password_role)
-   **WRITE_TESTIMONY** (_#id_name_email_password_role_, _#id_title_content_)

<!-- Je ne savais pas que MOCODO pouvait également fournir Les Tables, les chemins relationnels etc...(tout de même à revoir et faire valider par Lauréanne ou/et Pauline)
à revoir également les VARCHAR 42 c'est surement limite... -->

# Mardi 21/10

Revue de l'établissement des tables et retrait de celles qui n'auvaient pas leur place

Réédition du MDC (le lien est mis à jour)

aujourd'hui très frustrant d'avoir perdu du temps pour rien, littéralement car la création de la database ne se faisait pas et ne pouvait pas se faire car tout simplement je n'avais pas installer ce fichu postgresql... le problème était entre la chaisse et l'ordinateur apparemment

je rencontre d'ailleurs toujours des soucis avec cette tâche

J'ai pourtant suivi la doc synfony mais je n'arrive pas à la créer

Désinstaller puis réinstaller le postgresql entièrement avec une subtilité puisque j'installe page4admin

mon but serait d'enfin avoir la bdd de créée ensuite je passerai enfin aux migrations

bon c'est toujours un echec je ne comprends pas...
une journée dessus et je ne sais pas ce qu'il se passe
à voir peut-être avec les filles du coup... je pensais pouvoir y arriver
peut-être un autre SGBD

j'ai réinstallé encore une fois on va bien voir

1 journée complète de perdue 😓😓😓

# Mercredi 22/10

J'ai enfin pu créer ma BDD.... je l'ai faite à la main et ça s'est bien passé au niveau des migrations

trema=> \dt
Liste des tables
Schéma | Nom | Type | Propriétaire
--------+-----------------------------+-------+--------------
public | doctrine_migration_versions | table | trema
public | formation | table | trema
public | messenger_messages | table | trema
public | page | table | trema
public | testimony | table | trema
public | toto | table | trema
public | user | table | trema
(7 lignes)

## Je vais m'attaquer à la prochaine étape : l'authentification

Après avoir mis en place tous les controllers, EN SUIVANT LA DOC.... (Je mets ça comme ça car à ce moment là je ne l'ai pas vraiment suivie `composer require symfony/security-bundle` à faire avant de parler de sécurité)
Il faut résoudre le souci avec les méthodes de User car lors de la commande `php bin/console make:security:form-login`, mais ça ne devrait pas prendre longtemps vu que Lauréanne m'a expliqué quil manquait des fonctions à rajouter au niveau du User.
Je vais esssayer de préparer le reste du projet correctement et essayer de bien avancer car là ça commence à être un peu long...
Bien regarder la doc et impératif, et regarder d'autres projets qui se sont faits avec ce même langage... je devrais pouvoir trouver ça pour avoir une aide ...

```bash
trema=> SELECT * FROM "user";
 id | name  |     email      |                           password                           |    role
----+-------+----------------+--------------------------------------------------------------+------------
  1 | Admin | admin@site.com | $2y$13$RuKNhxKTjelVxlCDJaer3Oil2VpK.4.CE.YCZn8.BpJFvw7z71X12 | ROLE_ADMIN
(1 ligne)

```

#### Petit résumé des choses à faire selon l'avancé du projet actuel :

-   Finaliser les entités manquantes :
    <!-- attention les tables de liaisons ne sont pas faites ... -->

        -   SocialLink☑️
        -   CMS ?

    <!-- et les tables de liaisons donc: -->

        - create_page
        - edit_formation

-   Ajouter des validations dans les entités

    -   Messages d'erreurs
    -   Contraintes symfony (NotBlank, Length ....)

-   Créer les FormTypes

    -   TestimonyType.php☑️
    -   FormationType.php☑️ dans le controller, gérer le fait que ce soit juste l'admin qui puisse le faire
    -   SocialLinkType.php☑️
    -   ...

-   Compléter les controllers

    -   Actions new, edit, delete, index pour les entités restantes
    -   Sécurisation avec ROLE_ADMIN

-   Créer les vues Twig, vraiment

    -   Tous les templates

-   Gérer les slugs et URLs dynamiques

    -   Ajout d’un champ slug dans Page, Formation, etc.
    -   Routing dynamique basé sur le slug

-   Créer la page Contact avec formulaire fonctionnel
    -   Entité ou simple traitement via ContactController
    -   Validation + envoi d’email ou stockage

## Structure du projet

Voici une description en français du rôle des principaux dossiers et fichiers du projet :

-   `composer.json` : configuration des dépendances PHP (Composer) et autoload.
-   `compose.yaml` / `compose.override.yaml` : fichiers Docker Compose pour lancer les services (base de données, serveur, etc.).
-   `public/` : racine publique du serveur web (contient `index.php`, assets compilés).
-   `bin/` : scripts exécutables du projet (ex : `console` pour Symfony).
-   `src/` : code source PHP de l'application (contrôleurs, entités, repositories, services, security, commandes).

    -   `src/Controller/` : contrôleurs HTTP (actions qui retournent des Response/Twig/JSON).
    -   `src/Entity/` : entités Doctrine (modèles persistés en base).
    -   `src/Repository/` : classes pour requêtes personnalisées (QueryBuilder/DQL).
    -   `src/Form/` : FormType Symfony (définition des formulaires).
    -   `src/Security/` : authenticators, providers, règles de sécurité.
    -   `src/Command/` : commandes console (Console) pour tâches d'administration.

-   `templates/` : templates Twig pour le rendu des pages (ex : `formation/`, `user/`, `security/`).
-   `assets/` : sources front-end (JS, CSS), contrôleurs Stimulus, point d'entrée JS.
-   `config/` : configuration Symfony (services, packages, routes).
-   `migrations/` : fichiers de migration Doctrine (versionnement du schéma de la base).
-   `var/` : cache et logs générés à l'exécution.
-   `vendor/` : dépendances installées par Composer.
-   `tests/` : tests PHPUnit.
-   `translations/` : fichiers de traduction pour l'internationalisation.

Pour l'expérience user il faudrait que je fasse un dashboard qui afficherait des liens vers les pages de création de pages, formations, gestion des social medias etc.

# Dimanche 26/10

Je commence par mettre en place ce dashboard dont Lauréanne m'a parlé,

Pour "terminer" le projet il me faut :

1. Trouver la solution au problème de l'affichage du logo différent sur certaines pages✅
2. Gérer les témoignages de manière 'joli'✅
3. Faire une page contact avec formulaire✅
4. Gestion des erreurs avec symfony
5. Mettre des logos cliquables d'insta et linkedin ✅
6. La page des formations est gérée en css pur mais voir si bootstrapper✅
7. Faire une review du code entier✅
8. Nettoyer en enlevant les fichiers et dossiers dont je n'ai plus besoin
9. Regarder si, des animations pas trop lourdes (révisions...) sont possiblement exploitables, ou si j'ai envie✅
10. Ajouter un text cliquable au moment du hover sur les images de la page d'accueil✅

aller voir sur le site des animations css que j'ai mis dans PHP apprentissage

**J'ai dû réinstaller composer car il ne retrouvait pas mon bin/console....**

J'ai dû le réinstaller à la main

# Vendredi 31/10

# Implémentation d’un formulaire de contact avec envoi d’email (Symfony)

## Vue d’ensemble — composants à mettre en place

-   **Transporteur mail** : configuration `MAILER_DSN` pour dev / prod / test
-   **FormType** : `ContactType` décrivant les champs du formulaire
-   **DTO** : `ContactDTO` contenant les données + contraintes de validation
-   **Controller** : `ContactController` pour créer le formulaire, valider, envoyer le mail
-   **Templates Twig** :
    -   `index.html.twig` pour le formulaire
    -   `contact.html.twig` pour le contenu du mail

## Configuration des environnements

### `.env` (développement par défaut)

```env
MAILER_DSN=smtp://USER:PASS@smtp.example.com:587
```

### `.env.local` (override local)

-   Contient les identifiants SMTP réels (non versionnés)
-   Exemple avec Mailpit (sans Docker) :

```powershell
cd chemin/vers/le/projet
./mailpit
```

```env
MAILER_DSN=smtp://localhost:1025
```

-   Interface Mailpit : http://127.0.0.1:8025

### `.env.test` (environnement de test)

```env
MAILER_DSN=null://null
```

## Implémentation — fichiers principaux

### `ContactDTO.php`

-   Propriétés privées : `name`, `email`, `message`
-   Contraintes `#[Assert\NotBlank]`, `#[Assert\Email]`, etc.
-   Getters & setters utilisés par Symfony via `handleRequest`

### `ContactType.php`

-   Champs : `name`, `email`, `message`
-   Options : `empty_data`, labels, etc.

### `ContactController.php`

-   Création du DTO
-   Création du formulaire :

```php
$form = $this->createForm(ContactType::class, $dto);
$form->handleRequest($request);
```

-   Si valide :
    -   Création d’un `TemplatedEmail`
    -   Envoi via `$mailer->send($email)`
    -   Flash message + redirection

### Templates Twig

-   `index.html.twig` : affichage du formulaire
-   `contact.html.twig` : contenu HTML de l’email

---

## Pourquoi le "mapping" fonctionne

-   Symfony lie les champs du formulaire aux propriétés du DTO
-   Lors du `handleRequest`, Symfony appelle les setters (`setName`, etc.)
-   Après soumission, `$form->getData()` retourne l’objet DTO rempli

---

# Suivi de mon avancement — Projet Tréma

## Ce que j’ai déjà mis en place

-   J’ai créé les entités principales : `Formation`, `Page`, `Testimony`, `User`
-   J’ai mis en place les CRUD EasyAdmin pour toutes ces entités
-   J’ai sécurisé l’accès au back-office avec un login fonctionnel (`LoginFormAuthenticator`)
-   J’ai structuré le formulaire de témoignage (`TestimonyType`)
-   J’ai une route d’affichage des témoignages côté front (`/testimony`)
-   J’ai configuré l’envoi d’email via le formulaire de contact avec DTO, FormType et Mailer
-   J’ai structuré le projet proprement (BDD, migrations, arborescence, etc.)

## Ce qu’il me reste à faire

| Tâche                                                   | Statut      | Action à faire                                                                |
| ------------------------------------------------------- | ----------- | ----------------------------------------------------------------------------- |
| Soumission de témoignage par les visiteurs              | À faire     | Ajouter la méthode `new()` + créer le template `new.html.twig`                |
| Filtrer les témoignages affichés (`isPublished = true`) | À faire     | Modifier `index()` dans `TestimonyController` pour n’afficher que les validés |
| Ajouter le champ `isPublished` dans `Testimony`         | À faire     | Modifier l’entité + afficher dans EasyAdmin                                   |
| Afficher le lien vers le BO dans le header              | À faire     | Ajouter conditionnel dans `header.html.twig` avec `is_granted('ROLE_ADMIN')`  |
| CRUD pour `SocialLink`                                  | À faire     | Générer le `SocialLinkCrudController` + configurer les champs                 |
| Ajout du champ `slug` dans `Formation` (optionnel)      | À envisager | Permettre des URLs propres + routing dynamique                                |
| Ajouter des validations dans les entités                | À faire     | Contraintes Symfony (`NotBlank`, `Length`, etc.)                              |
| Créer les vues Twig                                     | À faire     | Templates pour chaque entité et chaque page                                   |
| Sécuriser les routes admin                              | À faire     | Vérifier `security.yaml` + restreindre avec `ROLE_ADMIN`                      |
| Nettoyer le projet                                      | À faire     | Supprimer les fichiers inutiles + faire une review du code                    |
| Créer un dashboard admin clair                          | En cours    | Ajouter des liens vers les pages de gestion dans le BO                        |
| Masquer les blocs vides dans le front                   | À faire     | Éviter les affichages moches si un champ n’est pas rempli                     |

## Priorités pour demain

1. Finaliser la soumission de témoignage côté front
2. Ajouter le champ `isPublished` et filtrer les témoignages affichés
3. Intégrer le lien vers le BO dans le header
4. Générer le CRUD pour `SocialLink` si je décide de le garder
5. Commencer à créer les templates Twig manquants
