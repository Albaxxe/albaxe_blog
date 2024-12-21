# 🌟 Albaxe Blog - Un blog PHP complet et dynamique

Albaxe Blog est une plateforme web moderne, conçue avec PHP en respectant l'architecture MVC. Ce projet allie fonctionnalités avancées, sécurité et design intuitif pour fournir une expérience utilisateur de qualité.

## 🚀 Fonctionnalités

- **💼 CV Dynamique** : Présentation professionnelle sous forme de CV interactif.
- **📂 Gestion des Projets** : Affichage des projets avec suivi des étapes d'avancement via des "postes".
- **💬 Interaction Utilisateur** : Les utilisateurs peuvent commenter les projets et les étapes d'avancement.
- **🔐 Gestion des Comptes** : Système sécurisé pour s'inscrire, se connecter et se déconnecter.
- **👨‍💻 Interface Administrateur** : Contrôle total sur les contenus (projets, postes, utilisateurs).
- **📱 Responsive Design** : Une interface adaptable, optimisée pour ordinateurs, tablettes et mobiles.
- **🔒 Sécurité Renforcée** : 
  - Mots de passe hashés.
  - Requêtes SQL préparées pour éviter les injections.
  - Protection contre les failles XSS (Cross-Site Scripting).

---

## 📋 Prérequis

Assurez-vous d'avoir les éléments suivants installés sur votre système :

- **Serveur local** : [XAMPP](https://www.apachefriends.org/index.html) ou [WAMP](https://www.wampserver.com/).
- **PHP** : Version 7.4 ou supérieure.
- **MySQL** : Version 5.7 ou supérieure.
- **Navigateur moderne** : Google Chrome, Firefox, Edge ou Safari.

---

## 🛠️ Installation

1. **Clonez le dépôt :**
   ```bash
   git clone https://github.com/Albaxxe/albaxe_blog.git
   ```
   Placez le projet dans `C:/xampp/htdocs/albaxe_blog` (Windows).

2. **Configurez la base de données :**
   - Créez une base de données nommée `albaxe_blog` via phpMyAdmin.
   - Importez le fichier SQL disponible à l'emplacement suivant :
     ```bash
     scripts/create_database.sql
     ```

3. **Activez `mod_rewrite` sur Apache :**
   - Vérifiez que `AllowOverride All` est activé dans la configuration d'Apache (fichier `httpd.conf`).

4. **Lancez le site :**
   Rendez-vous sur `http://localhost/albaxe_blog/public/` via votre navigateur.

---

## ⚙️ Configuration Personnalisée

Modifiez le fichier de configuration `app/config/config.php` selon vos besoins :

```php
<?php
const DB_HOST = 'localhost'; // Hôte de la base de données
const DB_NAME = 'albaxe_blog'; // Nom de la base de données
const DB_USER = 'root'; // Nom d'utilisateur MySQL
const DB_PASSWORD = ''; // Mot de passe MySQL

const BASE_URL = 'http://localhost/albaxe_blog'; // URL de base du site
const SECURITY_SALT = 'random_salt_for_extra_security'; // Clé de sécurité
const DEBUG_MODE = true; // Activer ou désactiver le mode debug
date_default_timezone_set('UTC'); // Fuseau horaire par défaut
```

---

## 🖥️ Fonctionnalités pour les Développeurs

- **Architecture MVC** : Code organisé en modèles, vues et contrôleurs.
- **Structure modulaire** : Ajoutez facilement de nouvelles fonctionnalités.
- **Scripts inclus** : Migration et seed de base de données.

---

## 🎨 Design et Expérience Utilisateur

Le design du site est basé sur une combinaison personnalisée de CSS et Bootstrap, garantissant :

- Une **navigation intuitive**.
- Une **mise en page moderne** et **responsive**.
- Une compatibilité avec la plupart des navigateurs modernes.

---

## 🧩 Contributions

Les contributions sont les bienvenues ! Voici comment contribuer au projet :

1. Forkez le projet.
2. Créez une branche pour vos modifications :
   ```bash
   git checkout -b feature/ma-nouvelle-fonctionnalite
   ```
3. Poussez vos modifications et soumettez une Pull Request.

---

## 📧 Assistance

Si vous rencontrez des problèmes ou avez des questions, ouvrez une **issue** sur GitHub ou contactez-moi directement via mon [profil GitHub](https://github.com/Albaxxe).

---

## 📜 Licence

Ce projet est sous licence **MIT**. Vous êtes libre de l'utiliser, de le modifier et de le distribuer, sous réserve d'inclure la licence d'origine.

---

### 🌐 [Visitez le projet](http://localhost/albaxe_blog/public/) et commencez dès aujourd'hui !

--- 

### 🛠️ Mainteneur

Projet développé et maintenu par **Albaxxe**.
