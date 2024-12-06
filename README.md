# wargameG5
Site vulnérable pour le wargame 2024 des M2 Cyber - ISEN Nantes.


## Description du projet

Le projet Wargame est un travail de groupe par 2 ou 3 personnes. Chaque groupe doit créer un site web avec au moins 3 vulnérabilités spécifiques *(une de chaque catégorie)* parmi les 16 suivantes : 

![Tableau des vulnérabilités possibles](vulns.png)

Une fois le site créé, chaque groupe devra identifier et exploiter les vulnérabilités sur les applications des autres groupes.

### Objectifs
1. **Création de site vulnérable** 

Le site présente au total 4 vulnérabilités, 3 d'entre elles permettent d'acquérir un flag pour récompenser les attaquants.
2. **Recherche & Exploitation des vulnérabilités sur le site d'un autre groupe** 

## Technologies utilisées

Le choix des technologies utilisées pour notre groupe : 

- **Frontend** : HTML, CSS, JavaScript (JQuery et Ajax)
- **Backend** : PHP
- **Database** : PostgreSQL
- **Docker** : Pour containeriser l'application et faciliter le déploiement


## Prérequis

Avant de commencer, assurez-vous d'avoir installé Docker et docker-compose sur votre machine. Si besoin le lien du [site officiel](https://www.docker.com/get-started).

## Setup 

### 1. Cloner le projet

Clonez ce projet sur votre machine locale.

```bash
git clone https://github.com/Mart-1/wargameG5
cd wargameG5
```

### 2. Lancez votre instance docker

```bash
docker-compose up --build

```

### 3. Accedez ensuite à l'application

L'instance docker est lancée sur le port 8080 et est configurée pour être accessible depuis [http://localhost:8080/](http://localhost:8080/).

## Description de l'application

L'application est un site permettant visualiser les menus de notre restaurant. La page d'accueil permet la connection de l'utilisateur ou la création d'un nouveau compte utilisateur. Si l'utilisateur choisit de créer un nouveau compte, il est redirigé sur la page register.html ou il devra remplir les différents champs nécesseraires à la création d'un compte (Nom / Prénom / Mail / Mot de passe). Une fois ce compte créé, il doit aller sur la page login.html et saisir son mail ainsi que son mot de passe pour accéder à la page lui présentant le menu avec la possibilité de le télécharger.Si l'utilisateur souhaite mettre à jour ses données personelles, il peut le faire en cliquant sur le bouton Info qui le redirige sur la page personal_info.html. Il peur ici choisir de changer son nom / prénom ainsi que son mot de passe en remplissant les différents champs. 

## Auteurs
**Groupe 5**:
- **Martin L.**
- **Enzo P.**
- **Noa V.**