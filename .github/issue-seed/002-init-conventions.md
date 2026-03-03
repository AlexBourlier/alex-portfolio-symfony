---
name: Nouvelle fonctionnalite
about: Mise en place des conventions et standards du projet
title: "[FEATURE] Mettre en place les conventions projet (README, standards, outillage)"
labels: feature, documentation, chore, phase-0-init
assignees: ''
---

## Objectif

Definir et mettre en place les conventions techniques et organisationnelles du projet afin de garantir coherence, lisibilite et maintenabilite.

---

## Description

Mettre en place les elements structurants du projet :

- README.md minimal (objectif, stack, prerequis, lancement)
- .editorconfig
- Verification du .gitignore
- Convention de nommage (Controllers, Services, Entities, templates)
- Organisation claire des dossiers (src/, templates/, tests/)
- Regles de commit (convention simple type prefix: message)

L'objectif est d'etablir une base propre avant d'entrer dans les phases fonctionnelles.

---

## Taches a realiser

- [ ] Rediger un README minimal
- [ ] Ajouter un fichier .editorconfig
- [ ] Verifier et nettoyer .gitignore
- [ ] Definir conventions de nommage internes
- [ ] Documenter les choix techniques dans le README
- [ ] Effectuer un commit propre "chore: init project conventions"

---

## Criteres d’acceptation

- [ ] README clair et exploitable par un tiers
- [ ] Structure du projet coherente et documentee
- [ ] Conventions explicites (noms, organisation)
- [ ] Aucun fichier inutile versionne
- [ ] Base propre avant developpement fonctionnel

---

## References

- Phase concernee : Phase 0 — Initialisation
- Stack : Symfony 7.1, Docker, MySQL, Mailpit