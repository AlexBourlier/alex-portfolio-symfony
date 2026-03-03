---
name: Nouvelle fonctionnalite
about: Configurer la connexion Doctrine avec MySQL via Docker
title: "[FEATURE] Configurer DATABASE_URL et valider la connexion Doctrine"
labels: feature, database, doctrine, backend, phase-1-docker
assignees: ''
---

## Objectif

Configurer correctement la connexion entre Symfony (Doctrine) et le service MySQL du stack Docker.

---

## Description

Mettre en place la variable d'environnement `DATABASE_URL` afin que Symfony puisse communiquer avec le conteneur MySQL.

Verifier :

- Configuration correcte dans `.env.local`
- Correspondance avec les identifiants definis dans Docker
- Compatibilite avec MySQL 8.x
- Bon fonctionnement des commandes Doctrine

Tester la creation de base et la connexion effective depuis l'application.

Exemple attendu :

DATABASE_URL="mysql://symfony:symfony@mysql:3306/symfony?serverVersion=8.4&charset=utf8mb4"

---

## Taches a realiser

- [ ] Configurer DATABASE_URL
- [ ] Verifier variables Docker (user, password, db name)
- [ ] Lancer `php bin/console doctrine:database:create`
- [ ] Verifier absence d'erreurs de connexion
- [ ] Tester `php bin/console doctrine:query:sql "SELECT 1"`
- [ ] Documenter la configuration dans le README

---

## Criteres d’acceptation

- [ ] Connexion base de donnees fonctionnelle via Docker
- [ ] Commandes Doctrine executables sans erreur
- [ ] Configuration coherente entre Docker et Symfony
- [ ] Aucune credentielle sensible exposee dans le repo
- [ ] Documentation claire dans le README

---

## References

- Phase concernee : Phase 1 — Docker
- Stack : Symfony 7.1, Doctrine ORM, MySQL 8.x