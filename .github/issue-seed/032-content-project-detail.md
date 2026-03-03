---
name: Nouvelle fonctionnalite
about: Implementation de la page detail d'un projet
title: "[FEATURE] Implementer la page Detail projet (slug + 404 propre)"
labels: feature, project-detail, backend, frontend, twig, phase-3-content
assignees: ''
---

## Objectif

Mettre en place une page detail permettant d'afficher toutes les informations d'un projet via une route basee sur un slug.

---

## Description

Creer une route dynamique de type :

    /projects/{slug}

La page doit afficher :

- Titre du projet
- Description longue
- Contexte et problematique
- Solutions techniques mises en oeuvre
- Stack technique
- Liens externes (GitHub, demo si disponible)
- Images ou captures si disponibles

La recuperation des donnees doit se faire via Doctrine, avec recherche par slug unique.

En cas de slug inexistant, retourner une erreur 404 propre.

---

## Taches a realiser

- [ ] Ajouter champ slug unique dans entite Project
- [ ] Generer migration Doctrine
- [ ] Mettre a jour ProjectRepository (findOneBySlug)
- [ ] Creer route `/projects/{slug}`
- [ ] Recuperer projet dans le controller
- [ ] Gerer erreur 404 si projet introuvable
- [ ] Creer template `projects/show.html.twig`
- [ ] Afficher informations detaillees du projet
- [ ] Ajouter lien retour vers liste des projets
- [ ] Tester avec fixtures

---

## Criteres d’acceptation

- [ ] Page accessible via `/projects/{slug}`
- [ ] Slug unique et coherent
- [ ] Recuperation dynamique via Doctrine
- [ ] Gestion correcte des erreurs 404
- [ ] Structure HTML semantique correcte
- [ ] Separation claire Controller / Repository / Template
- [ ] Aucun contenu en dur dans le template

---

## References

- Phase concernee : Phase 3 — Contenu
- Stack : Symfony 7.1, Doctrine ORM, Twig