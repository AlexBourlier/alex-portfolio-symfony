---
name: Nouvelle fonctionnalite
about: Mise en place du layout global et de la navigation principale
title: "[FEATURE] Implementer le layout global et la navigation principale"
labels: feature, twig, frontend, phase-2-layout
assignees: ''
---

## Objectif

Mettre en place le layout global de l'application avec une navigation principale coherente, reutilisable sur toutes les pages du portfolio.

---

## Description

Creer un layout principal `base.html.twig` structurant l'application avec :

- Une structure HTML semantique (header, nav, main, footer)
- Une navigation principale avec liens vers :
  - Accueil
  - Projets
  - A propos
  - Contact
- Mise en place des blocks Twig standards
- Gestion de l'etat actif du menu selon la route courante
- Structure propre et maintenable sans duplication

La navigation doit etre claire, accessible et evolutive (future section admin).

---

## Taches a realiser

- [ ] Finaliser `base.html.twig`
- [ ] Ajouter header avec balise `<nav>`
- [ ] Creer liens vers les routes principales
- [ ] Mettre en place un systeme de lien actif (app.request ou helper Twig)
- [ ] Ajouter footer simple (copyright / liens externes)
- [ ] Verifier absence de duplication de structure
- [ ] Tester navigation entre pages

---

## Criteres d’acceptation

- [ ] Layout unique herite par toutes les pages
- [ ] Navigation fonctionnelle entre toutes les routes
- [ ] Lien actif visible selon la page courante
- [ ] Structure HTML semantique correcte
- [ ] Code Twig propre et organise
- [ ] Base solide pour les futures evolutions (admin, auth)

---

## References

- Phase concernee : Phase 2 — Layout
- Technologie : Symfony 7.1, Twig