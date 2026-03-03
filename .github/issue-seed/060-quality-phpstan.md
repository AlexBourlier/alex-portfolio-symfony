---
name: Nouvelle fonctionnalite
about: Ajouter l'analyse statique PHPStan et corriger les erreurs
title: "[FEATURE] Integrer PHPStan et faire passer l'analyse statique"
labels: feature, refactor, backend, phase-6-quality
assignees: ''
---

## Objectif

Mettre en place PHPStan pour analyser statiquement le code PHP du projet et corriger les erreurs afin d'ameliorer la qualite, la fiabilite et la maintenabilite.

---

## Description

Ajouter PHPStan au projet Symfony et configurer un niveau d'analyse adapte.

Le but est de :

- Detecter les erreurs de typage et incoherences
- Identifier les appels de methodes/proprietes invalides
- Ameliorer progressivement la qualite du code (sans bloquer le developpement)

L'analyse doit pouvoir etre lancee facilement en local (Docker) et idealement etre integrable en CI.

---

## Taches a realiser

- [ ] Ajouter PHPStan en dependance dev (composer)
- [ ] Ajouter la configuration PHPStan (phpstan.neon ou phpstan.neon.dist)
- [ ] Configurer les chemins analyses (src/, tests/ si present)
- [ ] Definir un niveau initial (ex: level 6 ou equivalent) et un objectif (augmenter ensuite)
- [ ] Lancer PHPStan et corriger les erreurs remontées
- [ ] Ajouter des types manquants (proprietes, retours, parametres)
- [ ] Ajouter/ajuster des annotations si necessaire (PHPDoc) sans surcharger inutilement
- [ ] Ajouter une commande Composer (ex: `composer phpstan`)
- [ ] Documenter l'utilisation dans le README (commande + interpretation)

Optionnel (si CI presente) :
- [ ] Ajouter une etape CI qui lance PHPStan

---

## Criteres d’acceptation

- [ ] PHPStan s'execute sans erreur de configuration
- [ ] Analyse sur `src/` (et `tests/` si applicable) passe au niveau defini
- [ ] Les erreurs critiques sont corrigees (types, appels invalides, retours)
- [ ] Commande unique documentee pour lancer l'analyse
- [ ] Aucun contournement abusif (ignoreErrors massif sans justification)

---

## References

- Phase concernee : Phase 6 — Qualite
- Stack : Symfony 7.1, PHP 8.2+, PHPStan