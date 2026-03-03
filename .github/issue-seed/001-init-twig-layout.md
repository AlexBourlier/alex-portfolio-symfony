---
name: Nouvelle fonctionnalite
about: Mise en place du layout Twig de base
title: "[FEATURE] Mettre en place le layout global Twig (base.html.twig)"
labels: feature, twig, frontend, phase-0-init
assignees: ''
---

## Objectif

Mettre en place la structure globale Twig de l'application avec un layout principal reutilisable pour toutes les pages du portfolio.

---

## Description

Creer le template principal `base.html.twig` servant de layout global.

Mettre en place :

- Structure semantique HTML5 (header, main, footer)
- Navigation principale
- Blocks Twig (title, stylesheets, javascripts, body)
- Integration des assets (CSS, JS via AssetMapper ou equivalent)
- Organisation propre du dossier templates/

L'objectif est d'etablir une base claire et maintenable pour toutes les futures pages (Accueil, Projets, Contact, Admin).

---

## Taches a realiser

- [ ] Creation du fichier templates/base.html.twig
- [ ] Mise en place des blocks Twig standards
- [ ] Creation header avec navigation
- [ ] Creation footer simple
- [ ] Verification integration CSS/JS
- [ ] Creation premiere page heritant du layout (ex: home)

---

## Criteres d’acceptation

- [ ] Layout unique reutilisable par heritage Twig
- [ ] Structure HTML semantique correcte
- [ ] Navigation fonctionnelle
- [ ] Aucune duplication de structure entre les pages
- [ ] Code propre et organise

---

## References

- Phase concernee : Phase 0 — Initialisation
- Technologie : Twig (Symfony 7.1)