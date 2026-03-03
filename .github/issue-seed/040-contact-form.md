---
name: Nouvelle fonctionnalite
about: Implementation du formulaire de contact avec validation serveur
title: "[FEATURE] Implementer le formulaire de contact (FormType + validation)"
labels: feature, contact, validation, backend, frontend, phase-4-contact
assignees: ''
---

## Objectif

Mettre en place un formulaire de contact fonctionnel, securise et valide cote serveur, conforme aux bonnes pratiques Symfony.

---

## Description

Creer une page accessible via la route :

    /contact

Implementer un formulaire base sur un FormType Symfony comprenant :

- Nom
- Email
- Sujet
- Message

Le formulaire doit inclure :

- Validation serveur (NotBlank, Email, Length, etc.)
- Affichage des erreurs de validation
- Protection CSRF active
- Message flash en cas de succes

L'envoi d'email sera traite dans une issue distincte (Mailer + Mailpit), mais le formulaire doit etre structure pour s'y integrer proprement.

---

## Taches a realiser

- [ ] Creer ContactFormType
- [ ] Ajouter contraintes de validation
- [ ] Creer ContactController avec route `/contact`
- [ ] Gerer soumission et validation du formulaire
- [ ] Afficher erreurs dans le template Twig
- [ ] Ajouter message flash succes
- [ ] Verifier protection CSRF active
- [ ] Tester soumission avec donnees invalides et valides

---

## Criteres d’acceptation

- [ ] Page accessible via `/contact`
- [ ] Formulaire base sur FormType Symfony
- [ ] Validation serveur fonctionnelle
- [ ] Messages d'erreur affiches correctement
- [ ] Protection CSRF active
- [ ] Code respecte separation Controller / FormType / Template
- [ ] Aucun traitement direct des donnees dans le template

---

## References

- Phase concernee : Phase 4 — Contact
- Stack : Symfony 7.1, Twig, Symfony Form, Symfony Validator