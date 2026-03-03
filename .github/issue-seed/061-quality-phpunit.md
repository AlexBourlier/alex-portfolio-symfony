---
name: Nouvelle fonctionnalite
about: Ajouter PHPUnit et mettre en place une base de tests automatises
title: "[FEATURE] Integrer PHPUnit et ecrire les tests de base"
labels: feature, test, backend, phase-6-quality
assignees: ''
---

## Objectif

Mettre en place PHPUnit dans le projet Symfony et ecrire une base de tests automatises afin de securiser les fonctionnalites critiques (controllers, services, logique metier).

---

## Description

Ajouter PHPUnit (et l'integration Symfony si necessaire) puis creer une suite minimale de tests qui couvre :

- Un test de fumee (kernel boot) pour verifier que l'application demarre
- Des tests de routes principales (ex: /, /projects, /contact)
- Un test de validation du formulaire de contact (donnees invalides => erreurs)
- Si services presents : tests unitaires sur la logique metier (ex: ProjectQueryService, ContactService)

Les tests doivent etre executables facilement en local (Docker) et documentes.

---

## Taches a realiser

- [ ] Ajouter PHPUnit en dependance dev (composer)
- [ ] Verifier/ajouter configuration PHPUnit (phpunit.xml.dist)
- [ ] Creer un test de demarrage kernel (KernelTestCase)
- [ ] Creer des tests fonctionnels (WebTestCase) :
  - [ ] GET / renvoie 200
  - [ ] GET /projects renvoie 200
  - [ ] GET /contact renvoie 200
- [ ] Tester la validation contact :
  - [ ] soumission vide => erreurs
  - [ ] email invalide => erreur
- [ ] Ajouter une commande Composer (ex: `composer test`)
- [ ] Documenter l'execution des tests (README)

Optionnel (si BDD utilisee en test) :
- [ ] Mettre en place une base de test (sqlite ou mysql) et fixtures
- [ ] Ajouter reset schema avant tests (si necessaire)

---

## Criteres d’acceptation

- [ ] PHPUnit s'execute sans erreur de configuration
- [ ] Suite de tests minimale passe en local via Docker
- [ ] Tests couvrent au moins demarrage + routes principales + formulaire contact
- [ ] Commande unique pour lancer les tests
- [ ] Documentation claire pour lancer les tests et comprendre leur portee

---

## References

- Phase concernee : Phase 6 — Qualite
- Stack : Symfony 7.1, PHPUnit, Symfony FrameworkBundle (tests)