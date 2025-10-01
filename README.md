
# Nom de l'Application

Kim
Une application moderne construite avec Laravel et Filament v4 pour la gestion administrative.

## 📋 Table des matières

- [Fonctionnalités](#-fonctionnalités)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Développement](#-développement)
- [Déploiement](#-déploiement)
- [Structure](#-structure)
- [Contribuer](#-contribuer)
- [Licence](#-licence)

## ✨ Fonctionnalités

### 🎯 Fonctionnalités principales
- **Tableau de bord administrateur** avec Filament v4
- **Gestion des utilisateurs** et permissions
- **CRUD avancé** avec relations complexes
- **Interface responsive** et moderne
- **Recherche et filtres** avancés

### 🔧 Fonctionnalités techniques
- Gestion des rôles et permissions

## 🛠 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **PHP** 8.2 ou supérieur
- **Composer** 2.5 ou supérieur
- **Node.js** 18 ou supérieur
- **MySQL** 8.0 ou **PostgreSQL** 13 ou supérieur

## 🚀 Installation

### 1. Cloner le projet
```bash
git clone https://github.com/zomihintsy/kin.git
cd votre-repo
```

2. Installer les dépendances PHP

```bash
composer install
```

3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données

Éditez le fichier .env avec vos paramètres de base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_votre_base
DB_USERNAME=votre_username
DB_PASSWORD=votre_password
```

5. Exécuter les migrations et seeders

```bash
php artisan migrate --seed
```

6. Installer les assets Frontend

```bash
npm install
npm run build
```

7. Configurer le stockage

```bash
php artisan storage:link
```

8. Lancer l'application

```bash
php artisan serve
```

L'application sera accessible à l'adresse : http://localhost:8000

⚙️ Configuration

Variables d'environnement importantes

```env
APP_NAME="Nom de votre application"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Configuration Filament
FILAMENT_PATH=admin

# Configuration Mail
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null

# Configuration Cache
REDIS_CLIENT=phpredis
```

🎨 Personnalisation Filament

Thème personnalisé

Le thème Filament peut être personnalisé dans :

```php
// app/Providers/Filament/AdminPanelProvider.php
public function panel(Panel $panel): Panel
{
    return $panel
        ->default()
        ->id('admin')
        ->path('admin')
        ->login()
        ->colors([
            'primary' => Color::Amber,
        ])
        ->font('Inter')
        ->brandName('Votre Application');
}
```

Ressources personnalisées

Les ressources Filament se trouvent dans :

```
app/Filament/Resources/
```

🏗 Structure du projet

```
app/
├── Filament/
│   ├── Resources/          # Ressources Filament
│   ├── Widgets/           # Widgets du dashboard
│   └── Pages/             # Pages personnalisées
├── Models/                # Modèles Eloquent
├── Policies/              # Politiques d'accès
└── Providers/             # Service Providers

config/
├── filament.php          # Configuration Filament
└── ...

database/
├── migrations/           # Migrations de base de données
├── seeders/             # Seeders pour les données tests
└── factories/           # Factories pour les tests

resources/
├── views/               # Vues Blade personnalisées
└── css/                # Styles CSS personnalisés
```

🚀 Déploiement

Production

```bash
# Optimiser l'application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Mettre en place la queue
php artisan queue:work --daemon
```

Variables d'environnement production

```env
APP_ENV=production
APP_DEBUG=false

# Configuration cache
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
```

🧪 Développement

Lancer les tests

```bash
php artisan test
```

Analyser le code

```bash
composer analyse
```

Formater le code

```bash
composer format
```

Observer les changements (développement)

```bash
# Pour PHP
php artisan serve

# Pour les assets
npm run dev
```
# Route
  GET|HEAD  / ...................................................................................... home
  GET|HEAD  a-propos ......................................................................... about.show
  GET|HEAD  admin-kim ....................... filament.admin.pages.dashboard › Filament\Pages › Dashboard
  GET|HEAD  admin-kim/clients filament.admin.resources.clients.index › App\Filament\Resources\Clients\Pa…
  GET|HEAD  admin-kim/clients/create filament.admin.resources.clients.create › App\Filament\Resources\Cl…
  GET|HEAD  admin-kim/clients/{record} filament.admin.resources.clients.view › App\Filament\Resources\cl…
  GET|HEAD  admin-kim/clients/{record}/edit filament.admin.resources.clients.edit › App\Filament\Resourc…
  GET|HEAD  admin-kim/ingredients filament.admin.resources.ingredients.index › App\Filament\Resources\In…  
  GET|HEAD  admin-kim/ingredients/{record} filament.admin.resources.ingredients.view › App\Filament\Reso…  
  GET|HEAD  admin-kim/login ........................... filament.admin.auth.login › Filament\Auth › Login
  POST      admin-kim/logout .............. filament.admin.auth.logout › Filament\Auth › LogoutController  
  GET|HEAD  admin-kim/recettes filament.admin.resources.recettes.index › App\Filament\Resources\Recettes…  
  GET|HEAD  admin-kim/recettes/create filament.admin.resources.recettes.create › App\Filament\Resources\…
  GET|HEAD  admin-kim/recettes/{record} filament.admin.resources.recettes.view › App\Filament\Resources\…  
  GET|HEAD  admin-kim/recettes/{record}/edit filament.admin.resources.recettes.edit › App\Filament\Resou…
  GET|HEAD  admin-kim/register .................. filament.admin.auth.register › Filament\Auth › Register  
  GET|HEAD  client ......................... filament.client.pages.dashboard › Filament\Pages › Dashboard  
  GET|HEAD  client/login ............................. filament.client.auth.login › Filament\Auth › Login
  POST      client/logout ................ filament.client.auth.logout › Filament\Auth › LogoutController  
  GET|HEAD  client/password-reset/request filament.client.auth.password-reset.request › Filament\Auth › …
  GET|HEAD  client/password-reset/reset filament.client.auth.password-reset.reset › Filament\Auth › Rese…  
  GET|HEAD  client/profile ................... filament.client.auth.profile › Filament\Auth › EditProfile  
  GET|HEAD  client/register .................... filament.client.auth.register › Filament\Auth › Register
  GET|HEAD  client/repices filament.client.resources.repices.index › App\Filament\Client\Resources\Repic…  
  GET|HEAD  client/repices/create filament.client.resources.repices.create › App\Filament\Client\Resourc…  
  GET|HEAD  client/repices/{record} filament.client.resources.repices.view › App\Filament\Client\Resourc…  
  GET|HEAD  client/repices/{record}/edit filament.client.resources.repices.edit › App\Filament\Client\Re…
  GET|HEAD  confirm-password ................. password.confirm › Auth\ConfirmablePasswordController@show
  POST      confirm-password ................................... Auth\ConfirmablePasswordController@store
  GET|HEAD  contact ........................................................................ contact.show
  GET|HEAD  dashboard ................................................... dashboard › DashboardController
  POST      email/verification-notification verification.send › Auth\EmailVerificationNotificationContro…
  GET|HEAD  filament/exports/{export}/download filament.exports.download › Filament\Actions › DownloadEx…
  GET|HEAD  filament/imports/{import}/failed-rows/download filament.imports.failed-rows.download › Filam…
  GET|HEAD  forgot-password .................. password.request › Auth\PasswordResetLinkController@create
  POST      forgot-password ..................... password.email › Auth\PasswordResetLinkController@store
  GET|HEAD  livewire/livewire.js ............ Livewire\Mechanisms › FrontendAssets@returnJavaScriptAsFile
  GET|HEAD  livewire/livewire.min.js.map ...................... Livewire\Mechanisms › FrontendAssets@maps  
  GET|HEAD  livewire/preview-file/{filename} livewire.preview-file › Livewire\Features › FilePreviewCont…  
  POST      livewire/update ......... livewire.update › Livewire\Mechanisms › HandleRequests@handleUpdate  
  POST      livewire/upload-file . livewire.upload-file › Livewire\Features › FileUploadController@handle  
  GET|HEAD  login .................................... login › Auth\AuthenticatedSessionController@create  
  POST      login ............................................. Auth\AuthenticatedSessionController@store
  POST      logout ................................. logout › Auth\AuthenticatedSessionController@destroy  
  PUT       password ................................... password.update › Auth\PasswordController@update  
  GET|HEAD  profile ............................................... profile.edit › ProfileController@edit  
  PATCH     profile ........................................... profile.update › ProfileController@update  
  DELETE    profile ......................................... profile.destroy › ProfileController@destroy  
  GET|HEAD  recettes ............................................. recipes.index › RecipeController@index
  POST      recettes ............................................. recipes.store › RecipeController@store  
  GET|HEAD  recettes/ajouter ................................... recipes.create › RecipeController@create  
  GET|HEAD  recettes/{slug} ........................................ recipes.show › RecipeController@show  
  GET|HEAD  register .................................... register › Auth\RegisteredUserController@create  
  POST      register ................................................ Auth\RegisteredUserController@store
  POST      reset-password ............................ password.store › Auth\NewPasswordController@store  
  GET|HEAD  reset-password/{token} ................... password.reset › Auth\NewPasswordController@create  
  GET|HEAD  storage/{path} ................................................................ storage.local  
  GET|HEAD  up ..........................................................................................  
  GET|HEAD  verify-email ................... verification.notice › Auth\EmailVerificationPromptController  
  GET|HEAD  verify-email/{id}/{hash} ................... verification.verify › Auth\VerifyEmailController  
