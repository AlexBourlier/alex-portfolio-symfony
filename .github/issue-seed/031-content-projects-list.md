---
name: Nouvelle fonctionnalite
about: Implementation de la page liste des projets
title: "[FEATURE] Implementer la page Projets (liste + filtres)"
labels: feature, projects, backend, frontend, twig, phase-3-content
assignees: ''
---

## Objectif

Mettre en place une page listant l'ensemble des projets du portfolio avec une presentation claire, structurée et evolutive.

---

## Description

Creer une page accessible via la route `/projects` affichant :

- Une liste de projets sous forme de cartes (cards)
- Titre, description courte, stack principale
- Lien vers la page detail du projet
- Gestion via donnees dynamiques (Doctrine)

Prevoir une structure permettant l'ajout futur de :

- Filtres par technologie ou categorie
- Tri (date, type, importance)
- Pagination si necessaire

La page doit heriter du layout global et respecter le design system.

---

## Taches a realiser

- [ ] Creer entite Project (si non existante)
- [ ] Creer migration Doctrine
- [ ] Creer repository ProjectRepository
- [ ] Creer ProjectController avec route `/projects`
- [ ] Recuperer projets via Doctrine
- [ ] Creer template `projects/index.html.twig`
- [ ] Implementer affichage en cartes reutilisables
- [ ] Ajouter lien vers detail (slug)
- [ ] Tester affichage avec donnees de test (fixtures)

---

## Criteres d’acceptation

- [ ] Page accessible via `/projects`
- [ ] Donnees recuperees dynamiquement depuis la base
- [ ] Structure HTML semantique correcte
- [ ] Chaque projet possede un lien vers sa page detail
- [ ] Code respecte separation Controller / Repository / Template
- [ ] Aucun contenu duplique en dur dans le template

---

## References

- Phase concernee : Phase 3 — Contenu
- Stack : Symfony 7.1, Doctrine ORM, Twig