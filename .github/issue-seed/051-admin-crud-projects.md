---
name: Nouvelle fonctionnalite
about: Back-office pour gerer les projets (CRUD) avec Doctrine
title: "[FEATURE] Implementer le CRUD Projets (admin) et gestion des images (optionnel)"
labels: feature, admin, backend, database, doctrine, upload, phase-5-admin
assignees: ''
---

## Objectif

Mettre en place un back-office permettant a un administrateur (ROLE_ADMIN) de creer, lire, modifier et supprimer les projets du portfolio, avec une gestion optionnelle des images.

---

## Description

Creer une section d'administration accessible via :

    /admin/projects

Fonctionnalites attendues :

- Liste des projets (tableau admin)
- Creation d'un projet (formulaire)
- Edition d'un projet (formulaire)
- Suppression d'un projet (confirmation)
- Gestion du slug (unique) lors de la creation / modification
- Validation serveur (champs obligatoires, formats, longueurs)

Optionnel (si inclus) :

- Upload d'images liees a un projet
- Stockage du chemin en base (ProjectImage)
- Champs alt obligatoires pour l'accessibilite
- Affichage des images en preview dans l'admin

Le CRUD doit utiliser Doctrine (Entities + Repositories) et respecter la separation des responsabilites (Controller / FormType / Repository / Template).

---

## Taches a realiser

- [ ] Definir entites Project (et ProjectImage si upload)
- [ ] Ajouter contraintes (unique slug, champs requis)
- [ ] Creer migrations Doctrine et appliquer
- [ ] Creer routes admin (index, new, edit, delete)
- [ ] Creer FormType(s) pour Project (et ProjectImage si besoin)
- [ ] Implementer validation serveur + affichage erreurs
- [ ] Implementer suppression avec protection CSRF
- [ ] Gerer generation/mise a jour du slug (event listener ou service)
- [ ] Creer templates Twig admin (liste + formulaires)
- [ ] Tester le CRUD complet en environnement Docker

Optionnel upload :
- [ ] Configurer dossier d'upload (public/uploads)
- [ ] Gerer nommage fichier (unique) et securite (extensions autorisees)
- [ ] Stocker uniquement le chemin relatif en base
- [ ] Ajouter preview des images dans l'admin

---

## Criteres d’acceptation

- [ ] Acces reserve a ROLE_ADMIN
- [ ] CRUD complet fonctionnel (liste, creation, edition, suppression)
- [ ] Validation serveur correcte (pas de donnees invalides en base)
- [ ] Suppression protegee par token CSRF
- [ ] Slug unique et stable (gestion des conflits)
- [ ] Code organise (FormType, controllers, templates clairs)
- [ ] Donnees persistantes en base via Doctrine

Optionnel upload :
- [ ] Upload fonctionnel et securise (types limites, nommage safe)
- [ ] Alt texte gere pour chaque image
- [ ] Aucune fuite de chemin absolu ou donnees sensibles

---

## References

- Phase concernee : Phase 5 — Admin
- Pre-requis : Auth + ROLE_ADMIN en place
- Stack : Symfony 7.1, Doctrine ORM, Twig, Docker