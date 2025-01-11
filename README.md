URL : 

1. Pour réinstaller un site et sa base de données sur un autre serveur, on commence par sauvegarder les fichiers du site et on télécharge l’ensemble des fichiers du répertoire contenant le site web.
2. Ensuite, on sauvegarde la base de données en se connectant à l'outil de gestion phpMyAdmin. On exporte la base au format SQL.
3. Sur le nouveau serveur, on installe les prérequis nécessaires, tels qu’un serveur web Apache avec MAMP et un système de base de données compatible MySQL.
4. On transfère alors l’ensemble des fichiers sauvegardés vers le répertoire cible du nouveau serveur.
5. On crée une nouvelle base de données vide dans le nouvel environnement puis nous importons nos données SQL.
6. On vérifie et on ajuste alors les lignes de connexion à la BDD qui changent en fonction du serveur de développement.
7. Enfin, on teste alors notre site sur le nouveau serveur et corrige les potentielles erreurs. (Nous pouvons ensuite configurer un certificat SSL pour activer HTTPS)