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

### Contact

| Champ | Type         | Contraintes | Description         |
| ----- | ------------ | ----------- | ------------------- | --- |
| ID    | Integer      | Obligatoire | Identifiant unique  |
| title | VARCHAR(100) | Obligatoire | Nom de la catégorie |
| email | VARCHAR(100) | Obligatoire | Mail du contact     |     |

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
