# Alex Portfolio — Symfony 7.4

Portfolio professionnel développé avec  **Symfony 7.4** , visant à présenter mes projets backend, mes compétences en architecture applicative et mes bonnes pratiques (qualité, sécurité, tests, Docker).

---

## Stack technique

* Symfony 7.4
* PHP 8.2+
* Doctrine ORM
* Twig
* MySQL 8
* Docker (PHP-FPM, Nginx)
* Mailpit (SMTP développement)
* PHPUnit
* PHPStan

---

## Prérequis

* Docker
* Docker Compose

Aucune installation locale de PHP ou MySQL n’est nécessaire.

---

## Installation

Cloner le projet :

```bash
git clone https://github.com/TON-USER/alex-portfolio-symfony.git 
cd alex-portfolio-symfony
```

Lancer l’environnement Docker :

```bash
docker compose up -d --build
```

Installer les dépendances :

```bash
docker compose exec php composer install
```

Créer la base de données :

```bash
docker compose exec php php bin/console doctrine:database:create
docker compose exec php php bin/console doctrine:migrations:migrate
```

---

## Accès

* Application : [http://localhost:8080]()
* phpMyAdmin : [http://localhost:8081]()
* Mailpit : [http://localhost:8025]()

---

## Variables importantes

Dans `.env.local` :

```bash
DATABASE_URL="mysql://symfony:symfony@mysql:3306/symfony?serverVersion=8.4&charset=utf8mb4"
MAILER_DSN="smtp://mailpit:1025"
```
---

## Commandes utiles

Lancer les tests :

```bash
docker compose exec php vendor/bin/phpunit
```

Analyse statique :

```bash
docker compose exec php composer phpstan
```

---

## Structure simplifiée

```bash
src/
  Controller/
  Entity/
  Repository/
  Service/
templates/
config/
docker/
```

---

## Database Design

### MCD

![MCD](./capture/mcd.png)

### MLD

![MLD](./capture/mld.png)

---

## Objectif du projet

* Mettre en valeur mes projets techniques
* Démontrer une architecture Symfony propre
* Appliquer les bonnes pratiques (validation, sécurité, tests)
* Fournir un environnement Docker reproductible

---

## Roadmap

* Back-office admin (CRUD projets)
* Upload d’images
* Amélioration SEO
* Déploiement production
