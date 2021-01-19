# Harvestdata

Création d'un outil de web scraping !

## **Description du projet**
Vous allez créer une application multi-utilisateur qui permet d'extraire des données d'un site web (web scraping). L'utilité de cette application va permettre a une personne ayant une bonne connaissance en HTML de pouvoir créer des alertes de prix ou d'informations sur ses thèmes d'intérêt. Votre objectif est de réaliser un outil permettant de :
+ Générer des notifications de mise à jour des données
+ Gérer l'affichage des extractions

### **Processus de l'application**
- Au départ la personne doit créer un compte utilisateur avec validation du compte par email.
- Quand la personne est connecté elle va ajouter un site web dont elle veut extraire des données.
    - Elle définit si c'est un jeu de données ou des données simples
    - Elle définit l'élément racine contenant le jeu de données ou la donnée simple.
    - Elle définit les éléments de données à extraire.
    - Elle définit le type de données des éléments à extraire (Texte, nombre, monétaire..).
    - Elle définit la périodicité de l'extraction
    - Elle définit la catégorie de l'extraction (Information, comparaison, prix...)
- Le serveur exécute les extractions d'après la périodicité et stocke les données dans la base de données.


### **Fonctionnalités**

* L'utilisateur peut modifier les informations de son compte
* L'utilisateur peut modifier son mot de passe avec confirmation par email
* L'utilisateur peur supprimer son compte
* L'utilisateur peut créer, modifier, supprimer une demande d'extration4
* L'utilisateur peut lancer manuellement une extraction et afficher en direct le résultat.
* L'utilisateur peut voir l'historique d'une extraction.
* L'utilisateur peut aussi aficher ou supprimer un élément de l'historique. 
* L'utilisateur peut supprimer l'historique complet d'une extraction
* L'utilisateur peut extraire les données au format excel avec un editeur d'extration pour gérer l'affichage et l'ordre des colonnes ainsi que le tri des données (librairie de création de fichier excel).

#### Les plus

Permettre à l'utilisateur de définir le contenueur principal, le conteneur des données et les données à extraire avec le clic de la souris.

**************************************************************************
**info**
Vous avez le droit d'utiliser de bundle ou librairie de scraping web, de générer des fichiers Excel et de templating. Vous devez créer votre propre classe de routeur. Votre projet utilisera l'architecture MVC et sera complétement écrit en programmation orientée objet.

## Objectifs d'apprentissage
    
    * Concevoir une maquette
    * Concevoir un diagramme de classe
    * Concevoir un MVC
    * Programmer en PHP POO

**************************************************************************

## Objectifs opérationnels


* A la fin du projet vous serez :
* Maquetter une application
* Développer la partie front-end d’une interface utilisateur web
* Développer la partie back-end d’une interface utilisateur web
* Concevoir une base de données
* Mettre en place une base de données
* Développer des composants dans le langage d’une base de données
* Développer des composants d’accès aux données

**************************************************************************
### LES Ressources

**UML**
[link]
* (https://fr.wikipedia.org/wiki/UML_(informatique))
> Le Langage de Modélisation Unifié, de l'anglais Unified Modeling Language (UML), est un langage de modélisation graphique à base de pictogrammes conçu comme une méthode normalisée de visualisation dans les domaines du développement logiciel et en conception orientée objet.
**************************************************************************
> UML est destiné à faciliter la conception des documents nécessaires au développement d'un logiciel orienté objet, comme standard de modélisation de l'architecture logicielle.

* Activité d'un objet/logiciel
* Acteurs
* Processus
* Schéma de base de données
* Composants logiciels
* Réutilisation de composants
> Il est également possible de générer automatiquement tout ou partie du code, par exemple en langage Java, à partir des documents réalisés.

*Formalisme*

> UML est un langage de modélisation. La version actuelle, UML 2.5, propose 14 types de diagrammes dont sept structurels et sept comportementaux. À titre de comparaison, UML 1.3 comportait 25 types de diagrammes.


