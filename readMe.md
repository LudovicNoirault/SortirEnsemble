# IMIE - [Ux]-Periment

Projet [Ux]-periment réalisé a l'IMIE avec pour but la création d'une application web visant les entreprises permettant a leurs employés d'organiser des sorties. CRUD complet sur plusieurs objets.

## Description technique

Technologies :
    - Composer
    - Php 7.2
    - Symfony 4.3
    - Twig

## Utilisateurs en place

Admin :
    - Email : admin@admin.admin
    - Password : admin
    - Role : administrateur

User :
    - Email : user@user.user
    - Password : user
    - Role : Utilisateur

## Etapes des mises en place

- Cloner le projet (Ou bien dézipper le dossier si obtenu via téléchargement)

- Création d'une base de données nommée SortirEnsemble

- Creation d'un utilisateur avec droit illimité sur cette base seulement

- Import de la base de données -> Fichier dbexport.sql a la route du projet

- lancer la commande suivante a la racine du projet pour installer les différentes dépendances

```cmd
    composer install
```

- lancer la commande suivante pour démarrer le server

```cmd
    php bin/console server:run
```

- Accéder a l'adresse [localhost:8000](localhost:8000) pour accéder au projet

## Credit

Designer : Phillipe Favreau
Développeurs : Alexis Pontoizeau, Ludovic Noirault
