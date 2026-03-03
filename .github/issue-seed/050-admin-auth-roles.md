---
name: Nouvelle fonctionnalite
about: Mise en place de l'authentification et des roles pour la zone admin
title: "[FEATURE] Mettre en place l'authentification et les roles (ROLE_ADMIN)"
labels: feature, auth, security, backend, phase-5-admin
assignees: ''
---

## Objectif

Mettre en place une authentification Symfony et une gestion des roles afin de proteger l'acces a la zone d'administration du portfolio.

---

## Description

Ajouter un systeme d'authentification base sur le composant Security de Symfony afin de :

- Creer un utilisateur administrateur (ROLE_ADMIN)
- Permettre la connexion via un formulaire `/login`
- Proteger toutes les routes admin (ex: `/admin/*`)
- Gerer la deconnexion `/logout`

La mise en place doit etre compatible avec Doctrine (User entity) et respecter les bonnes pratiques de securite (hash de mot de passe, protection CSRF, redirections propres).

---

## Taches a realiser

- [ ] Generer l'entite User (email unique, roles, password)
- [ ] Generer migration Doctrine et appliquer
- [ ] Generer le systeme de login (Security bundle / maker)
- [ ] Configurer firewall et access_control (admin reserve a ROLE_ADMIN)
- [ ] Ajouter route logout
- [ ] Creer un utilisateur admin (commande, fixtures ou script)
- [ ] Verifier hash du mot de passe (PasswordHasher)
- [ ] Tester : acces /admin sans auth => redirection login
- [ ] Tester : acces /admin avec ROLE_USER => refuse
- [ ] Tester : acces /admin avec ROLE_ADMIN => OK
- [ ] Documenter l'acces admin (creation du compte, identifiants dev) dans le README

---

## Criteres d’acceptation

- [ ] Page de login fonctionnelle
- [ ] Authentification fonctionnelle (session)
- [ ] Routes `/admin/*` inaccessibles sans ROLE_ADMIN
- [ ] Mot de passe stocke uniquement sous forme de hash
- [ ] Protection CSRF active sur le formulaire de login
- [ ] Comportement coherent (redirect apres login, logout effectif)
- [ ] Documentation claire pour l'environnement dev

---

## References

- Phase concernee : Phase 5 — Admin
- Stack : Symfony 7.1, Symfony Security, Doctrine ORM