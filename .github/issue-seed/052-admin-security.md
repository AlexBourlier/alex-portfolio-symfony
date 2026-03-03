---
name: Nouvelle fonctionnalite
about: Durcissement securite et protection des routes admin
title: "[FEATURE] Securiser la zone admin (access_control, protections et durcissement)"
labels: feature, admin, security, backend, phase-5-admin
assignees: ''
---

## Objectif

Garantir que toutes les fonctionnalites d'administration sont correctement protegees et qu'aucune route sensible n'est accessible sans autorisation.

---

## Description

Mettre en place une securisation complete de la zone admin afin de :

- Restreindre toutes les routes `/admin/*` aux utilisateurs `ROLE_ADMIN`
- S'assurer que les formulaires admin (creation, edition, suppression) sont proteges (CSRF)
- Eviter toute fuite d'information sur les pages non autorisees
- Centraliser les regles de securite dans la configuration Security Symfony

Le but est d'obtenir une configuration robuste, lisible et verifiable.

---

## Taches a realiser

- [ ] Verifier configuration `security.yaml` (firewalls, providers)
- [ ] Ajouter/regler `access_control` pour proteger `/admin` et sous-routes
- [ ] Verifier redirection correcte vers `/login` si non authentifie
- [ ] Verifier refus d'acces (403) si authentifie sans ROLE_ADMIN
- [ ] Verifier que toutes les actions sensibles (POST/DELETE) utilisent un token CSRF
- [ ] Verifier que les routes admin ne sont pas accessibles via methodes inattendues
- [ ] Ajouter un test manuel (checklist) des routes critiques admin
- [ ] (Optionnel) Ajouter voters ou attributs `IsGranted` sur controllers si pertinent
- [ ] Documenter les regles de securite admin dans le README (concis)

---

## Criteres d’acceptation

- [ ] Aucune route `/admin/*` accessible sans authentification
- [ ] Aucune route `/admin/*` accessible sans ROLE_ADMIN
- [ ] Formulaires sensibles proteges par CSRF
- [ ] Comportement coherent : redirect login si non connecte, 403 si role insuffisant
- [ ] Configuration claire et maintenable (pas de regles dispersees)
- [ ] Verification manuelle reproductible (liste de routes testees)

---

## References

- Phase concernee : Phase 5 — Admin
- Pre-requis : Auth + ROLE_ADMIN en place
- Stack : Symfony 7.1, Symfony Security, Twig, Doctrine