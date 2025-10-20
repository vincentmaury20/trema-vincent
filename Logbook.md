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

### Commentary

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

[Le lien vers la dernière version](https://www.mocodo.net/?mcd=eNp1UUFuwyAQvPMK7s6hufZGCYksxRAZoqqqqhW1NxGtDZVNVeX3xa1tOVF7QWh2mJkdMq14zvZQiE3O7ikPNYIOlbMNFFg7C9HFBqFx_p0UTLKdgOWLFV1L-uxO1Nat8y_0qEW5oneSLkkkG-BR_NhjB962CNha18CH7fuv0NXQhQYJLwUzAg7JZ_WP8jAj2XCOigd7xjFmFXxEH8mD2Cu502DUTcCtKgtmciUTvqY8ee1U-USy6TZKchvxHLrLrywhmRHa5IWSE8FgH10b_OXG-LHMU_yZ_eM-J59hooXcpG60Hva84nAlDeNmGqZk18AUMPnZKi6L7D9f3zBBLfb90EjVYdqiBhtJ-gQDy9X_bnZmkGy-jn7b0LU2uuCv9_0Ggea2pw==)

**Generated by Mocodo 4.3.2**

```sql
-- Generated by Mocodo 4.3.2

CREATE TABLE CATEGORY (
  PRIMARY KEY (Code_Category_title),
  Code_Category_title          VARCHAR(42) NOT NULL,
  Code_Formation_title_content VARCHAR(42) NOT NULL
);

CREATE TABLE CONTACT_MESSAGE (
  PRIMARY KEY (Code_Contact_name_email_subject_message_created_at),
  Code_Contact_name_email_subject_message_created_at VARCHAR(42) NOT NULL
);

CREATE TABLE CREATE_PAGE (
  PRIMARY KEY (Code_User_name_email_password_role, Code_Page_title_content),
  Code_User_name_email_password_role VARCHAR(42) NOT NULL,
  Code_Page_title_content            VARCHAR(42) NOT NULL
);

CREATE TABLE EDIT_FORMATION (
  PRIMARY KEY (Code_User_name_email_password_role, Code_Formation_title_content),
  Code_User_name_email_password_role VARCHAR(42) NOT NULL,
  Code_Formation_title_content       VARCHAR(42) NOT NULL
);

CREATE TABLE FORMATION (
  PRIMARY KEY (Code_Formation_title_content),
  Code_Formation_title_content VARCHAR(42) NOT NULL
);

CREATE TABLE MANAGE_SOCIAL_MEDIA (
  PRIMARY KEY (Code_User_name_email_password_role, Code_Social_Media_title_link),
  Code_User_name_email_password_role VARCHAR(42) NOT NULL,
  Code_Social_Media_title_link       VARCHAR(42) NOT NULL
);

CREATE TABLE PAGE (
  PRIMARY KEY (Code_Page_title_content),
  Code_Page_title_content VARCHAR(42) NOT NULL
);

CREATE TABLE SEND_MESSAGE (
  PRIMARY KEY (Code_User_name_email_password_role, Code_Contact_name_email_subject_message_created_at),
  Code_User_name_email_password_role                 VARCHAR(42) NOT NULL,
  Code_Contact_name_email_subject_message_created_at VARCHAR(42) NOT NULL
);

CREATE TABLE SOCIAL_MEDIA (
  PRIMARY KEY (Code_Social_Media_title_link),
  Code_Social_Media_title_link VARCHAR(42) NOT NULL
);

CREATE TABLE TESTIMONY (
  PRIMARY KEY (Code_Testimony_title_content),
  Code_Testimony_title_content VARCHAR(42) NOT NULL
);

CREATE TABLE USER (
  PRIMARY KEY (Code_User_name_email_password_role),
  Code_User_name_email_password_role VARCHAR(42) NOT NULL
);

CREATE TABLE WRITE_TESTIMONY (
  PRIMARY KEY (Code_User_name_email_password_role, Code_Testimony_title_content),
  Code_User_name_email_password_role VARCHAR(42) NOT NULL,
  Code_Testimony_title_content       VARCHAR(42) NOT NULL
);

ALTER TABLE CATEGORY ADD FOREIGN KEY (Code_Formation_title_content) REFERENCES FORMATION (Code_Formation_title_content);

ALTER TABLE CREATE_PAGE ADD FOREIGN KEY (Code_Page_title_content) REFERENCES PAGE (Code_Page_title_content);
ALTER TABLE CREATE_PAGE ADD FOREIGN KEY (Code_User_name_email_password_role) REFERENCES USER (Code_User_name_email_password_role);

ALTER TABLE EDIT_FORMATION ADD FOREIGN KEY (Code_Formation_title_content) REFERENCES FORMATION (Code_Formation_title_content);
ALTER TABLE EDIT_FORMATION ADD FOREIGN KEY (Code_User_name_email_password_role) REFERENCES USER (Code_User_name_email_password_role);

ALTER TABLE MANAGE_SOCIAL_MEDIA ADD FOREIGN KEY (Code_Social_Media_title_link) REFERENCES SOCIAL_MEDIA (Code_Social_Media_title_link);
ALTER TABLE MANAGE_SOCIAL_MEDIA ADD FOREIGN KEY (Code_User_name_email_password_role) REFERENCES USER (Code_User_name_email_password_role);

ALTER TABLE SEND_MESSAGE ADD FOREIGN KEY (Code_Contact_name_email_subject_message_created_at) REFERENCES CONTACT_MESSAGE (Code_Contact_name_email_subject_message_created_at);
ALTER TABLE SEND_MESSAGE ADD FOREIGN KEY (Code_User_name_email_password_role) REFERENCES USER (Code_User_name_email_password_role);

ALTER TABLE WRITE_TESTIMONY ADD FOREIGN KEY (Code_Testimony_title_content) REFERENCES TESTIMONY (Code_Testimony_title_content);
ALTER TABLE WRITE_TESTIMONY ADD FOREIGN KEY (Code_User_name_email_password_role) REFERENCES USER (Code_User_name_email_password_role);

```

-   **CATEGORY** (Code*Category_title, *#Code*Formation_title_content*)
-   **CONTACT_MESSAGE** (Code_Contact_name_email_subject_message_created_at)
-   **CREATE_PAGE** (_#Code_User_name_email_password_role_, _#Code_Page_title_content_)
-   **EDIT_FORMATION** (_#Code_User_name_email_password_role_, _#Code_Formation_title_content_)
-   **FORMATION** (Code_Formation_title_content)
-   **MANAGE_SOCIAL_MEDIA** (_#Code_User_name_email_password_role_, _#Code_Social_Media_title_link_)
-   **PAGE** (Code_Page_title_content)
-   **SEND_MESSAGE** (_#Code_User_name_email_password_role_, _#Code_Contact_name_email_subject_message_created_at_)
-   **SOCIAL_MEDIA** (Code_Social_Media_title_link)
-   **TESTIMONY** (Code_Testimony_title_content)
-   **USER** (Code_User_name_email_password_role)
-   **WRITE_TESTIMONY** (_#Code_User_name_email_password_role_, _#Code_Testimony_title_content_)

<!-- Je ne savais pas que MOCODO pouvait également fournir Les Tables, les chemins relationnels etc...(tout de même à revoir et faire valider par Lauréanne ou/et Pauline)
à revoir également les VARCHAR 42 c'est surement limite... -->
