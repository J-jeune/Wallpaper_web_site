# Wallpaper Web Site

Site e-commerce de vente de wallpapers de voitures, développé avec Laravel.

## Fonctionnalités

- Page d'accueil avec liste des produits
- Page détail produit
- Panier (gestion via cookies, sans compte requis)
- Authentification complète (connexion, inscription, déconnexion, mot de passe oublié)
- Routes protégées (auth uniquement)
- Page profil (modification des informations, suppression du compte)
- Validation de commande liée au compte utilisateur
- Relation Many-to-Many entre produits et catégories
- Espace administrateur (routes protégées admin)
  - CRUD complet : produits, catégories, marques
  - Gestion des utilisateurs
  - Gestion des commandes (changement de statut)
  - Association dynamique produits ↔ catégories

## Stack technique

- Laravel 13
- MySQL
- Bootstrap 5
- Laravel Breeze (authentification)

## Installation

```bash
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

Configurer la base de données dans `.env` :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB_Wallpaper_Web
DB_USERNAME=root
DB_PASSWORD=


Puis :
```bash
php artisan migrate:fresh --seed
```

## Créer un compte administrateur

```bash
php artisan tinker
```
```php
$user = App\Models\User::where('email', 'test@example.com')->first();
$user->is_admin = true;
$user->save();
```

## Structure de la base de données

- `users` — comptes utilisateurs (avec `is_admin`)
- `brands` — marques de voitures
- `categories` — types de voitures (Sport Car, Rally...)
- `products` — wallpapers en vente
- `category_product` — table pivot (many-to-many)
- `orders` — commandes passées
- `order_product` — table pivot (contenu d'une commande)

## Auteur

Développé par J-jeune dans le cadre d'un projet Licence Informatique.
