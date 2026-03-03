---
name: Nouvelle fonctionnalite
about: Ameliorer la qualite front (semantique, responsive, accessibilite)
title: "[FEATURE] Qualite front: HTML semantique, responsive et bases a11y"
labels: feature, a11y, frontend, phase-6-quality
assignees: ''
---

## Objectif

Ameliorer la qualite front du portfolio en garantissant une structure HTML semantique correcte, un rendu responsive propre et une accessibilite de base (a11y).

---

## Description

Verifier et corriger l'ensemble des pages (Accueil, Projets, Detail projet, A propos, Contact, Admin si present) afin de :

- Respecter la semantique HTML5 (header/nav/main/footer, section/article)
- Garantir une hierarchie de titres coherente (un seul h1 par page)
- Assurer une navigation au clavier fonctionnelle (focus visible, ordre logique)
- Ameliorer l'accessibilite des formulaires (labels, erreurs lisibles, aria si besoin)
- Assurer un contraste suffisant et une lisibilite correcte
- Rendre le site utilisable sur mobile / tablette / desktop

L'objectif est d'avoir un rendu professionnel et robuste, sans ajustements au cas par cas.

---

## Taches a realiser

- [ ] Verifier structure semantique sur toutes les pages (templates Twig)
- [ ] Verifier hierarchie des titres (h1, h2, h3)
- [ ] Verifier liens et boutons (texte explicite, pas d'element cliquable non semantique)
- [ ] Verifier navigation clavier :
  - [ ] tabulation coherent
  - [ ] focus visible sur liens/boutons/champs
- [ ] Corriger formulaires :
  - [ ] association label/field correcte
  - [ ] affichage erreurs de validation lisible
  - [ ] indications necessaires (required)
- [ ] Verifier alt des images (decoratives vs informatives)
- [ ] Verifier contraste (test manuel)
- [ ] Tester responsive (mobile, tablette, desktop)
- [ ] Ajouter une checklist de verification dans la documentation (README ou docs)

Optionnel (si tu veux objectiver) :
- [ ] Lancer un audit Lighthouse (a11y + best practices) et noter les points corrigeables

---

## Criteres d’acceptation

- [ ] Toutes les pages ont une structure HTML semantique correcte
- [ ] Un seul h1 par page et hierarchie de titres logique
- [ ] Navigation complete possible au clavier
- [ ] Focus visible et utilisable
- [ ] Formulaires accessibles (labels, erreurs, champs requis)
- [ ] Rendu responsive correct sur ecrans courants
- [ ] Aucun element interactif inaccessible ou ambigu

---

## References

- Phase concernee : Phase 6 — Qualite
- Stack : Symfony 7.1, Twig, CSS
- Reference : bonnes pratiques WCAG (bases)