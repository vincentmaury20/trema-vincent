# Projet de stage Tréma

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
CREATE TABLE social_media (
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
-   **CONTACT_MESSAGE** (id_name_email_subject_message_created_at)
-   **CREATE_PAGE** (_#id_name_email_password_role_, _#id_title_content_)
-   **EDIT_FORMATION** (_#id_name_email_password_role_, _#id_title_content_)
-   **FORMATION** (id_title_content)
-   **MANAGE_SOCIAL_MEDIA** (_#id_name_email_password_role_, _#id_title_link_)
-   **PAGE** (id_title_content)
-   **SEND_MESSAGE** (_#id_name_email_password_role_, _#id_name_email_subject_message_created_at_)
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

# Mercredi 22/10

J'ai enfin pu créer ma BDD.... je l'ai faite à la main et ça s'est bien passé au niveau des migrations

trema=> \dt
Liste des tables
SchÚma | Nom | Type | PropriÚtaire
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

Après avoir mis en place tous les controllers, EN SUIVANT LA DOC.... (Je mets ça comme ça car à ce moment là je ne l'ai pas vraiment suivie `composer require symfony/security-bundle` à fait avant de parler de sécurité)
Il faut résoudre le souci avec les méthodes de User car lors de la commande `php bin/console make:security:form-login`, mais ça ne devrait pas prendre longtemps vu que Lauréanne m'a expliqué quil manquait des fonctions à rajouter au niveau du User.
Je vais esssayer de préparer le reste du projet correctement et essayer de bien avancer car là ça commence à être un peu long...
Bien regarder la doc et impératif, et regarder d'autres projets qui se sont faits avec ce même langage... je devrais pouvoir trouver ça pour avoir une aide ...
