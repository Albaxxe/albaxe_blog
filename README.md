# Albaxe Blog

**Albaxe Blog** est un site web dynamique développé en PHP, conçu pour offrir un espace d'interaction autour de projets et de contenus. Le site est basé sur une architecture MVC et propose diverses fonctionnalités avancées.

---

## Fonctionnalités actuelles

### Backend
- [✅] Système de gestion des comptes utilisateur (**inscription, connexion, déconnexion**).
- [✅] Protection des mots de passe via **hashage sécurisé**.
z- [✅] Protection contre les attaques **XSS**.

### Frontend (non finalisé)
- [❌] Présentation d'un **CV dynamique** (problèmes d'alignement et de design).
- [❌] Affichage des **projets** (structure fonctionnelle mais design incomplet).
- [❌] Design responsive basé sur **Bootstrap** (non aligné et non optimisé).

---

## Fonctionnalités futures (roadmap)
- [❌] Notifications en temps réel (ex. : nouveaux commentaires, nouvelles publications).
- [❌] Intégration d'une API REST pour les développeurs.
- [❌] Outil d'import/export des données (JSON, CSV).
- [❌] Optimisation pour le référencement SEO.
- [❌] Mode hors ligne avec **Progressive Web App** (PWA).

---

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
