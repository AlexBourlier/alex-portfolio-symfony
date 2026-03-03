---
name: Nouvelle fonctionnalite
about: Implementation de la page A propos
title: "[FEATURE] Implementer la page A propos (parcours + competences)"
labels: feature, frontend, twig, phase-3-content
assignees: ''
---

## Objectif

Creer une page A propos presentant ton parcours, ton positionnement professionnel et tes competences techniques de maniere claire et structuree.

---

## Description

Mettre en place une page accessible via la route :

    /about

La page doit inclure :

- Une presentation synthétique de ton profil
- Ton parcours de formation
- Tes competences techniques (backend, bases de donnees, architecture, outils)
- Ta stack principale (Symfony, PHP, MySQL, Docker)
- Eventuellement un lien vers ton CV (PDF)
- Liens vers GitHub / LinkedIn

Le contenu doit etre concis, professionnel et oriente recruteur.

La page doit heriter du layout global et respecter le design system.

---

## Taches a realiser

- [ ] Creer AboutController avec route `/about`
- [ ] Creer template `about/index.html.twig`
- [ ] Structurer contenu avec sections semantiques
- [ ] Mettre en valeur competences techniques
- [ ] Ajouter liens externes (GitHub, CV, LinkedIn)
- [ ] Verifier lisibilite et hierarchie des titres
- [ ] Tester responsive

---

## Criteres d’acceptation

- [ ] Page accessible via `/about`
- [ ] Contenu clair et professionnel
- [ ] Structure HTML semantique correcte
- [ ] Liens externes fonctionnels
- [ ] Aucune repetition inutile avec la page Accueil
- [ ] Coherence visuelle avec le reste du site

---

## References

- Phase concernee : Phase 3 — Contenu
- Stack : Symfony 7.1, Twig