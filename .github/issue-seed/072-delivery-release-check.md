---
name: Nouvelle fonctionnalite
about: Verification finale avant publication ou presentation du projet
title: "[FEATURE] Preparer la release finale (checklist de verification)"
labels: chore, phase-7-delivery
assignees: ''
---

## Objectif

Effectuer une verification complete du projet avant publication (GitHub, presentation, evaluation ou mise en ligne) afin de garantir un rendu professionnel et sans erreur.

---

## Description

Mettre en place une checklist de verification finale couvrant :

- Stabilite technique
- Qualite du code
- Fonctionnement des fonctionnalites principales
- Cohérence de la documentation
- Presentation generale du repository

Cette etape doit permettre d'eviter toute erreur evidente ou incoherence avant livraison.

---

## Taches a realiser

### Verification technique

- [ ] Lancer `docker compose up -d --build` sur environnement propre
- [ ] Verifier acces page Accueil
- [ ] Verifier page Projets
- [ ] Verifier page Detail projet
- [ ] Verifier page Contact (validation + email Mailpit)
- [ ] Verifier acces admin (login, CRUD projets)
- [ ] Verifier protection routes admin

### Verification qualite

- [ ] Lancer PHPStan (aucune erreur critique)
- [ ] Lancer PHPUnit (tests passent)
- [ ] Verifier absence d'erreurs visibles en console navigateur
- [ ] Verifier structure HTML semantique
- [ ] Verifier responsive mobile/tablette

### Verification documentation

- [ ] README complet et coherent
- [ ] Instructions Docker testees
- [ ] Variables d'environnement documentees
- [ ] Guide de deploiement present

### Verification repository

- [ ] Aucun fichier inutile versionne (node_modules, var/, vendor/ si ignore)
- [ ] Aucun secret expose (.env.local non versionne)
- [ ] Historique Git propre (pas de commit parasite)
- [ ] Description GitHub renseignee
- [ ] Topics GitHub ajoutes (symfony, docker, portfolio, php)

---

## Criteres d’acceptation

- [ ] Projet installable sans intervention manuelle supplementaire
- [ ] Toutes les fonctionnalites principales operationnelles
- [ ] Aucun message d'erreur critique en execution
- [ ] Documentation exploitable par un tiers
- [ ] Repository propre et professionnel

---

## References

- Phase concernee : Phase 7 — Livrables
- Stack : Symfony 7.1, Docker, Doctrine, Twig, Mailer