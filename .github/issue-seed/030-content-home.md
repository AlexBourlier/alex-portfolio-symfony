---
name: Nouvelle fonctionnalite
about: Implementation de la page d'accueil du portfolio
title: "[FEATURE] Implementer la page Accueil (presentation + projets mis en avant)"
labels: feature, home, frontend, twig, phase-3-content
assignees: ''
---

## Objectif

Creer une page d'accueil claire, professionnelle et orientee recruteur, mettant en avant ton positionnement et tes projets principaux.

---

## Description

Mettre en place la page Accueil accessible depuis la route principale (`/`).

La page doit inclure :

- Une section hero (presentation courte + role cible)
- Un court resume de profil (2-3 paragraphes maximum)
- Une section "Projets mis en avant"
- Un appel a l'action vers la page Projets
- Un appel a l'action vers la page Contact

La structure doit etre semantique et heriter du layout global Twig.

---

## Taches a realiser

- [ ] Creer HomeController avec route `/`
- [ ] Creer template `home/index.html.twig`
- [ ] Ajouter section hero claire et concise
- [ ] Ajouter section projets mis en avant (statique ou dynamique)
- [ ] Ajouter boutons d'action (Voir mes projets, Me contacter)
- [ ] Verifier integration avec le layout global
- [ ] Tester affichage responsive

---

## Criteres d’acceptation

- [ ] Page accessible via `/`
- [ ] Structure HTML semantique correcte
- [ ] Message clair et professionnel
- [ ] Liens vers Projets et Contact fonctionnels
- [ ] Mise en page coherente avec le design system
- [ ] Aucun contenu superflu ou trop long

---

## References

- Phase concernee : Phase 3 — Contenu
- Stack : Symfony 7.1, Twig