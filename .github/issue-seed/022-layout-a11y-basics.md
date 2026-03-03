---
name: Nouvelle fonctionnalite
about: Mise en place d'un design system minimal pour le portfolio
title: "[FEATURE] Mettre en place un design system minimal (typographie, couleurs, composants)"
labels: feature, frontend, phase-2-layout
assignees: ''
---

## Objectif

Mettre en place un design system simple, coherent et maintenable pour assurer une identite visuelle propre et uniforme sur l'ensemble du portfolio.

---

## Description

Definir une base visuelle reutilisable comprenant :

- Palette de couleurs principale et secondaire
- Typographie (titres, textes, hierarchie claire)
- Espacements standards (marges, paddings coherents)
- Styles globaux (body, liens, boutons)
- Composants reutilisables (button, card projet, container)

Centraliser les styles dans un fichier CSS principal (ex: assets/styles/app.css) afin d'eviter les duplications et incoherences.

Le design doit rester sobre, professionnel et lisible.

---

## Taches a realiser

- [ ] Definir palette de couleurs (variables CSS)
- [ ] Definir echelle typographique (h1, h2, h3, p)
- [ ] Mettre en place variables d'espacement
- [ ] Creer style de bouton reutilisable
- [ ] Creer composant carte projet (card)
- [ ] Uniformiser les liens (hover, focus)
- [ ] Verifier lisibilite et contraste

---

## Criteres d’acceptation

- [ ] Identite visuelle coherente sur toutes les pages
- [ ] Absence de styles inline ou dupliques
- [ ] Composants reutilisables
- [ ] Code CSS organise et lisible
- [ ] Contraste suffisant et lisibilite correcte

---

## References

- Phase concernee : Phase 2 — Layout
- Stack : Symfony 7.1, Twig, CSS (AssetMapper ou equivalent)