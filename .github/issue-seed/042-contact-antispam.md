---
name: Nouvelle fonctionnalite
about: Ajouter des mesures anti-spam au formulaire de contact
title: "[FEATURE] Ajouter une protection anti-spam au formulaire de contact"
labels: feature, security, backend, phase-4-contact
assignees: ''
---

## Objectif

Reduire efficacement les soumissions de spam sur le formulaire de contact, sans degrader l'experience utilisateur.

---

## Description

Ajouter une protection anti-spam simple et maintenable, compatible avec Symfony, en combinant plusieurs mecanismes :

- Honeypot (champ invisible pour l'utilisateur, rempli par les bots)
- Verification de delai minimal de saisie (ex: refus si soumission trop rapide)
- Rate limiting sur la route /contact (limiter le nombre de soumissions par IP)
- Journalisation minimale des refus (sans stocker de donnees sensibles)

Le but est d'eviter une dependance a un service externe (reCAPTCHA) dans un premier temps.

---

## Taches a realiser

- [ ] Ajouter un champ honeypot dans le formulaire (non mappe)
- [ ] Bloquer la soumission si honeypot rempli
- [ ] Mettre en place une verification de temps minimal (timestamp en session ou champ cache)
- [ ] Configurer un RateLimiter Symfony pour la route /contact (par IP)
- [ ] Retourner un message generique en cas de blocage (ne pas aider le bot)
- [ ] Ajouter logs cote serveur pour les blocages (niveau info/warning)
- [ ] Tester manuellement : soumission normale / honeypot rempli / spam rapide / depassement limite
- [ ] Documenter la protection dans le README (principe + configuration)

---

## Criteres d’acceptation

- [ ] Une soumission legitime fonctionne sans friction
- [ ] Une soumission avec honeypot rempli est refusee
- [ ] Une soumission trop rapide est refusee
- [ ] Les soumissions repetitives depuis une meme IP sont limitees
- [ ] Le message d'erreur cote utilisateur reste generique
- [ ] Aucune donnee sensible n'est loggee ou exposee

---

## References

- Phase concernee : Phase 4 — Contact
- Stack : Symfony 7.1, Symfony Form/Validator, Symfony RateLimiter (si utilise)