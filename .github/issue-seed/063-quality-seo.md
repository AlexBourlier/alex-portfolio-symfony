---
name: Nouvelle fonctionnalite
about: Ameliorer le referencement naturel (SEO) du portfolio
title: "[FEATURE] Optimiser le SEO (meta, structure, bonnes pratiques)"
labels: feature, seo, frontend, phase-6-quality
assignees: ''
---

## Objectif

Mettre en place les optimisations SEO de base afin d'ameliorer la visibilite et la structure du portfolio pour les moteurs de recherche.

---

## Description

Optimiser les pages principales (Accueil, Projets, Detail projet, A propos, Contact) en respectant les bonnes pratiques SEO :

- Balise `<title>` dynamique et pertinente par page
- Balise `<meta name="description">` unique par page
- Structure de titres coherente (un seul h1, hierarchie logique)
- URLs propres et explicites (ex: /projects/slug)
- Balises alt pertinentes sur les images
- Liens internes coherents
- Gestion propre des erreurs 404

Ajouter une base technique propre pour permettre une evolution future (sitemap, robots.txt).

---

## Taches a realiser

- [ ] Ajouter block `title` dynamique dans base.html.twig
- [ ] Ajouter meta description personnalisable par page
- [ ] Verifier un seul h1 par page
- [ ] Verifier slugs propres et lisibles
- [ ] Ajouter balises alt pertinentes sur images projets
- [ ] Ajouter fichier robots.txt minimal
- [ ] (Optionnel) Generer un sitemap.xml simple
- [ ] Verifier absence de contenu duplique
- [ ] Tester rendu des meta dans l'inspecteur navigateur
- [ ] Documenter les choix SEO dans le README

Optionnel (si deploy public) :
- [ ] Verifier indexabilite (pas de noindex en prod)
- [ ] Tester score Lighthouse SEO

---

## Criteres d’acceptation

- [ ] Chaque page possede un title unique et pertinent
- [ ] Chaque page possede une meta description coherente
- [ ] URLs propres et sans parametres inutiles
- [ ] Hierarchie des titres respectee
- [ ] Images correctement decrites
- [ ] robots.txt present
- [ ] Aucun blocage involontaire de l'indexation

---

## References

- Phase concernee : Phase 6 — Qualite
- Stack : Symfony 7.1, Twig
- Bonnes pratiques : SEO technique de base (structure, meta, URLs propres)