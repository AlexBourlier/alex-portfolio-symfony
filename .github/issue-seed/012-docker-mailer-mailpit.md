---
name: Nouvelle fonctionnalite
about: Configurer l'envoi d'emails en environnement Docker via Mailpit
title: "[FEATURE] Configurer Symfony Mailer avec Mailpit (Docker)"
labels: feature, mailer, mailpit, backend, phase-1-docker
assignees: ''
---

## Objectif

Configurer Symfony Mailer afin d'envoyer des emails en environnement de developpement via le service Mailpit du stack Docker.

---

## Description

Mettre en place la variable d'environnement `MAILER_DSN` afin que Symfony utilise le serveur SMTP Mailpit (conteneur Docker).

Verifier :

- Configuration correcte dans `.env.local` ou variables Docker
- Communication entre le conteneur PHP et Mailpit
- Bon fonctionnement de l'envoi d'email via Symfony Mailer
- Affichage des emails dans l'interface web Mailpit

Exemple attendu :

MAILER_DSN="smtp://mailpit:1025"

---

## Taches a realiser

- [ ] Verifier presence du service Mailpit dans compose.yaml
- [ ] Configurer MAILER_DSN
- [ ] Installer composant symfony/mailer si necessaire
- [ ] Creer un test d'envoi simple (Controller ou commande)
- [ ] Verifier reception dans Mailpit (http://localhost:8025)
- [ ] Documenter la configuration dans le README

---

## Criteres d’acceptation

- [ ] Envoi d'email fonctionnel en environnement Docker
- [ ] Emails visibles dans l'interface Mailpit
- [ ] Aucune configuration SMTP externe necessaire
- [ ] Configuration proprement documentee
- [ ] Aucun secret sensible commit dans le repository

---

## References

- Phase concernee : Phase 1 — Docker
- Stack : Symfony 7.1, Symfony Mailer, Mailpit, Docker