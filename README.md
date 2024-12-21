# Albaxe Blog

**Albaxe Blog** est un site web dynamique développé en PHP, conçu pour offrir un espace d'interaction autour de projets et de contenus. Le site est basé sur une architecture MVC et propose diverses fonctionnalités avancées.

---

## Fonctionnalités disponibles

### Gestion des utilisateurs
- [✅] Inscription
- [✅] Connexion
- [✅] Déconnexion
- [🔄] Validation des entrées utilisateur (protection XSS)
- [❌] Récupération de mot de passe

### Gestion des projets
- [✅] Liste des projets
- [✅] Affichage détaillé des projets
- [🔄] Création/édition de projet (administrateur uniquement)
- [❌] Ajout de posts d'avancement

### Gestion des commentaires
- [✅] Affichage des commentaires
- [❌] Ajout de commentaires
- [❌] Modération des commentaires

### Front-end (design et expérience utilisateur)
- [🔄] Design responsive avec Bootstrap (problèmes d'alignement)
- [❌] Notifications en temps réel

### Base de données
- [✅] Structure des tables pour utilisateurs, projets, commentaires
- [🔄] Optimisation des relations entre tables
- [❌] Requêtes SQL optimisées

---

## Fonctionnalités futures (roadmap)

- [❌] Intégration d'une API REST pour les développeurs
- [❌] Ajout de notifications en temps réel
- [❌] Outil d'import/export des données (JSON, CSV)
- [❌] Hébergement du site avec une URL accessible en ligne
- [❌] Mode hors ligne avec Progressive Web App (PWA)

## Installation

### Prérequis

1. **Logiciels nécessaires** :
   - XAMPP ou WAMP (Apache, MySQL, PHP).
   - PHP 7.4 ou supérieur.
   - MySQL 5.7 ou supérieur.

2. **Étapes d'installation** :
   - Clonez ce dépôt dans `C:/xampp/htdocs/albaxe_blog` (Windows).
   - Créez une base de données `albaxe_blog` via phpMyAdmin.
   - Importez le fichier `scripts/create_database.sql` dans la base `albaxe_blog`.
   - Assurez-vous que `mod_rewrite` est activé dans Apache et que `AllowOverride All` est configuré pour `htdocs`.
   - Accédez à : `http://localhost/albaxe_blog/public/`.

---

## Checklist des fonctionnalités

| Fonctionnalité                      | État     |
|-------------------------------------|----------|
| Système de gestion des utilisateurs | ✅       |
| Protection (hashage, XSS, SQLi)     | ✅       |
| CV dynamique                        | ❌       |
| Liste des projets                   | ❌       |
| Design responsive                   | ❌       |
| Notifications en temps réel         | ❌       |
| API REST                            | ❌       |
| Hébergement en ligne                | ❌       |

---

## Mise en ligne (future)

L’objectif futur est de rendre ce site accessible en ligne en utilisant votre PC local. Cela pourrait être réalisé via :
- **Ngrok** pour créer un tunnel sécurisé.
- **No-IP** pour un accès via une adresse DNS personnalisée.

---

## Liens utiles

- **Dépôt GitHub** : [Albaxe Blog](https://github.com/Albaxxe/albaxe_blog)
- **Documentation officielle PHP** : [php.net](https://www.php.net/)
- **Documentation Bootstrap** : [getbootstrap.com](https://getbootstrap.com/)
