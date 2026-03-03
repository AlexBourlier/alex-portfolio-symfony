---
name: Nouvelle fonctionnalite
about: Envoi d'email depuis le formulaire de contact via Symfony Mailer (Mailpit)
title: "[FEATURE] Envoyer un email depuis le formulaire de contact (Mailer + Mailpit)"
labels: feature, mailer, mailpit, backend, phase-4-contact
assignees: ''
---

## Objectif

Permettre l'envoi d'un email a partir du formulaire de contact en utilisant Symfony Mailer, avec verification via Mailpit en environnement Docker.

---

## Description

Brancher l'envoi d'email a la soumission valide du formulaire de contact.

Le flux attendu :

1. L'utilisateur soumet le formulaire `/contact`
2. Si le formulaire est valide :
   - Creation d'un email (From / To / Subject / Body)
   - Envoi via Symfony Mailer
   - Message flash de succes
   - Redirection (Post/Redirect/Get) vers `/contact`
3. Si le formulaire est invalide :
   - Affichage des erreurs de validation
   - Aucun email envoye

L'envoi doit utiliser `MAILER_DSN=smtp://mailpit:1025` et les emails doivent etre visibles dans l'interface Mailpit.

---

## Taches a realiser

- [ ] Verifier configuration MAILER_DSN (Mailpit)
- [ ] Installer/activer Symfony Mailer si necessaire
- [ ] Implementer l'envoi dans le controller (ou via un service dedie)
- [ ] Definir un destinataire (ex: adresse personnelle ou env var CONTACT_TO)
- [ ] Construire le contenu de l'email (texte et/ou HTML Twig)
- [ ] Gerer succes (flash + redirect PRG)
- [ ] Gerer erreurs d'envoi (try/catch + message utilisateur)
- [ ] Verifier reception dans Mailpit (http://localhost:8025)
- [ ] Documenter la config (MAILER_DSN + variables) dans le README

---

## Criteres d’acceptation

- [ ] Aucun email envoye si le formulaire est invalide
- [ ] Email envoye si formulaire valide
- [ ] Email visible dans Mailpit
- [ ] Utilisation correcte de Post/Redirect/Get apres succes
- [ ] Gestion d'erreur propre (pas d'exception brute en front)
- [ ] Configuration documentee et reproductible via Docker

---

## References

- Phase concernee : Phase 4 — Contact
- Stack : Symfony 7.1, Symfony Mailer, Twig, Mailpit, Docker