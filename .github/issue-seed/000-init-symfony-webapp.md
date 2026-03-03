---
name: Nouvelle fonctionnalite
about: Initialisation du projet Symfony portfolio
title: "[FEATURE] Initialiser le projet Symfony 7.1 (webapp)"
labels: feature, symfony, phase-0-init
assignees: ''
---

## Objectif

Initialiser le projet portfolio avec Symfony 7.1 (version webapp) et mettre en place la base technique propre au projet.

---

## Description

Creer un nouveau projet Symfony via la commande :

    symfony new alex-portfolio --version="7.1.*" --webapp

Verifier que l'application fonctionne en local (environnement dev) et que la structure generee correspond aux standards Symfony.

Mettre en place les elements de base necessaires au projet :

- Structure Symfony par defaut (src/, templates/, config/, public/, etc.)
- Initialisation Git
- Verification des dependances
- Configuration environnement de base (.env)

---

## Taches a realiser

- [ ] Creation du projet Symfony 7.1 (webapp)
- [ ] Verification version PHP compatible (>= 8.2)
- [ ] Installation des dependances (composer install)
- [ ] Initialisation du repository Git
- [ ] Premier commit propre
- [ ] Verification acces page d'accueil Symfony

---

## Criteres d’acceptation

- [ ] Projet Symfony 7.1 installe sans erreur
- [ ] Page d'accueil Symfony accessible
- [ ] Arborescence conforme aux standards Symfony
- [ ] Repository Git initialise proprement
- [ ] README minimal present

---

## References

- Phase du projet concernee : Phase 0 — Initialisation
- Commande officielle utilisee : symfony new <nom-projet> --version="7.1.*" --webapp