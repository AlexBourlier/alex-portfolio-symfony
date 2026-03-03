---
name: Nouvelle fonctionnalite
about: Documenter et preparer le deploiement du projet
title: "[FEATURE] Ajouter un guide de deploiement (configuration et checklist)"
labels: documentation, ci, phase-7-delivery
assignees: ''
---

## Objectif

Definir et documenter une procedure claire de deploiement du portfolio afin de garantir une mise en production propre, securisee et reproductible.

---

## Description

Rediger un guide de deploiement couvrant :

- Configuration des variables d'environnement en production
- Parametrage APP_ENV=prod et APP_DEBUG=0
- Gestion des secrets (DATABASE_URL, MAILER_DSN)
- Installation des dependances en mode production
- Execution des migrations Doctrine
- Build des assets si necessaire
- Configuration serveur (Nginx, PHP-FPM)
- Gestion des permissions (var/, cache/, logs/)
- Checklist finale avant mise en ligne

Le guide doit permettre a un tiers de comprendre les etapes techniques sans connaissance implicite du projet.

---

## Taches a realiser

- [ ] Rediger section "Variables d'environnement production"
- [ ] Documenter configuration APP_ENV et APP_DEBUG
- [ ] Documenter installation composer en prod (sans dev)
- [ ] Documenter execution migrations
- [ ] Documenter configuration Nginx (root public/)
- [ ] Documenter gestion permissions dossiers
- [ ] Ajouter checklist de verification pre-deploiement
- [ ] Ajouter checklist post-deploiement (tests routes critiques)
- [ ] Verifier coherence avec stack Docker (si utilisation en prod ou non)
- [ ] Relire et tester procedure sur environnement propre

Optionnel :
- [ ] Ajouter exemple de fichier .env.prod
- [ ] Ajouter section CI/CD si pipeline present

---

## Criteres d’acceptation

- [ ] Procedure claire et chronologique
- [ ] Toutes les commandes testees
- [ ] Aucune information sensible commit dans le repo
- [ ] Verification explicite de l'environnement production
- [ ] Checklist complete et realiste
- [ ] Documentation concise et technique

---

## References

- Phase concernee : Phase 7 — Livrables
- Stack : Symfony 7.1, Doctrine, Nginx, PHP-FPM, Docker (dev)