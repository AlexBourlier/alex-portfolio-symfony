---
name: Nouvelle fonctionnalite
about: Mise en place du stack Docker de developpement
title: "[FEATURE] Mettre en place le stack Docker (PHP, Nginx, MySQL, phpMyAdmin, Mailpit)"
labels: feature, docker, nginx, php, mysql, phpmyadmin, mailpit, phase-1-docker
assignees: ''
---

## Objectif

Mettre en place un environnement de developpement complet et reproductible via Docker pour le projet Symfony.

---

## Description

Configurer un stack Docker compose comprenant :

- PHP-FPM compatible Symfony 7.1 (>= PHP 8.2)
- Nginx comme serveur web
- MySQL 8.x pour la base de donnees
- phpMyAdmin pour l'administration BDD
- Mailpit pour la gestion des emails en environnement dev

Assurer la bonne communication entre les services (reseau interne Docker) et la configuration correcte des variables d'environnement Symfony (DATABASE_URL, MAILER_DSN).

---

## Taches a realiser

- [ ] Creer le fichier compose.yaml
- [ ] Creer Dockerfile PHP (extensions: pdo_mysql, intl, etc.)
- [ ] Configurer Nginx (root public/, fastcgi vers php)
- [ ] Configurer service MySQL (user, password, volume)
- [ ] Ajouter phpMyAdmin
- [ ] Ajouter Mailpit (SMTP + UI)
- [ ] Configurer DATABASE_URL
- [ ] Configurer MAILER_DSN
- [ ] Verifier que l'application est accessible via http://localhost
- [ ] Verifier acces phpMyAdmin et Mailpit

---

## Criteres d’acceptation

- [ ] Tous les conteneurs demarrent sans erreur
- [ ] Symfony accessible depuis le navigateur
- [ ] Connexion base de donnees fonctionnelle
- [ ] Emails visibles dans Mailpit
- [ ] Aucun mot de passe sensible commit dans le repo
- [ ] Environnement reproductible via `docker compose up -d --build`

---

## References

- Phase concernee : Phase 1 — Docker
- Stack : Symfony 7.1, PHP 8.2+, MySQL 8.x, Nginx, Mailpit