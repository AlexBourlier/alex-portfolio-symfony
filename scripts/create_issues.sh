#!/usr/bin/env bash
set -euo pipefail

# --- Pré-requis ---
command -v gh >/dev/null 2>&1 || { echo "Erreur: gh n'est pas installe."; exit 1; }

# Vérifie l'auth GitHub
if ! gh auth status >/dev/null 2>&1; then
  echo "Erreur: tu n'es pas connecte a GitHub CLI. Lance: gh auth login"
  exit 1
fi

# Vérifie qu'on est dans un repo avec remote GitHub
if ! gh repo view >/dev/null 2>&1; then
  echo "Erreur: ce dossier ne semble pas etre un repo GitHub (ou remote manquant)."
  echo "Verifie avec: git remote -v"
  exit 1
fi

SEED_DIR=".github/issue-seed"
if [ ! -d "$SEED_DIR" ]; then
  echo "Erreur: dossier introuvable: $SEED_DIR"
  exit 1
fi

# --- Helper ---
create_issue () {
  local title="$1"
  local file="$2"
  local labels="$3"

  if [ ! -f "$file" ]; then
    echo "Erreur: fichier introuvable: $file"
    exit 1
  fi

  echo "Creation: $title"
  gh issue create \
    --title "$title" \
    --body-file "$file" \
    --label "$labels" >/dev/null

  echo "OK: $title"
}

# -----------------------------------
# PHASE 0 — INIT (Symfony + Repo)
# -----------------------------------

create_issue "Phase 0 — Initialiser le projet Symfony 7.1 (webapp) + Git" \
  "$SEED_DIR/000-init-symfony-webapp.md" \
  "feature,symfony,phase-0-init"

create_issue "Phase 0 — Mettre en place la structure Twig (base layout)" \
  "$SEED_DIR/001-init-twig-layout.md" \
  "feature,twig,frontend,phase-0-init"

create_issue "Phase 0 — Mettre en place les conventions (README minimal, .editorconfig, .gitignore)" \
  "$SEED_DIR/002-init-conventions.md" \
  "documentation,chore,phase-0-init"

# -----------------------------------
# PHASE 1 — DOCKER STACK
# -----------------------------------

create_issue "Phase 1 — Ajouter le stack Docker (PHP-FPM + Nginx + MySQL + phpMyAdmin + Mailpit)" \
  "$SEED_DIR/010-docker-stack.md" \
  "feature,docker,nginx,php,mysql,phpmyadmin,mailpit,phase-1-docker"

create_issue "Phase 1 — Configurer DATABASE_URL et verifier connexion Doctrine" \
  "$SEED_DIR/011-docker-doctrine-db-connection.md" \
  "feature,database,doctrine,backend,phase-1-docker"

create_issue "Phase 1 — Configurer Mailer DSN pour Mailpit et valider l'envoi" \
  "$SEED_DIR/012-docker-mailer-mailpit.md" \
  "feature,mailer,mailpit,backend,phase-1-docker"

# -----------------------------------
# PHASE 2 — LAYOUT & NAVIGATION
# -----------------------------------

create_issue "Phase 2 — Implementer le layout global (header/main/footer) et navigation" \
  "$SEED_DIR/020-layout-global-navigation.md" \
  "feature,twig,frontend,phase-2-layout"

create_issue "Phase 2 — Mettre en place le design system minimal (typographie, composants de base)" \
  "$SEED_DIR/021-layout-design-system.md" \
  "feature,frontend,phase-2-layout"

create_issue "Phase 2 — Accessibilite de base (structure semantique, focus, titres)" \
  "$SEED_DIR/022-layout-a11y-basics.md" \
  "feature,a11y,frontend,phase-2-layout"

# -----------------------------------
# PHASE 3 — CONTENU (pages portfolio)
# -----------------------------------

create_issue "Phase 3 — Page Accueil (presentation + CTA + projets mis en avant)" \
  "$SEED_DIR/030-content-home.md" \
  "feature,home,frontend,twig,phase-3-content"

create_issue "Phase 3 — Page Projets (liste filtrable + tags)" \
  "$SEED_DIR/031-content-projects-list.md" \
  "feature,projects,frontend,twig,phase-3-content"

create_issue "Phase 3 — Page Detail projet (slug, sections, liens GitHub/demo)" \
  "$SEED_DIR/032-content-project-detail.md" \
  "feature,project-detail,backend,twig,phase-3-content"

create_issue "Phase 3 — Page A propos (parcours, competences, liens)" \
  "$SEED_DIR/033-content-about.md" \
  "feature,frontend,twig,phase-3-content"

# -----------------------------------
# PHASE 4 — CONTACT (Form + Mailer)
# -----------------------------------

create_issue "Phase 4 — Page Contact + FormType (validation serveur)" \
  "$SEED_DIR/040-contact-form.md" \
  "feature,contact,validation,backend,frontend,phase-4-contact"

create_issue "Phase 4 — Envoi d'email via Symfony Mailer (Mailpit) + message flash" \
  "$SEED_DIR/041-contact-mailer.md" \
  "feature,mailer,mailpit,backend,phase-4-contact"

create_issue "Phase 4 — Anti-spam basique (honeypot + rate limiting ou temporisation)" \
  "$SEED_DIR/042-contact-antispam.md" \
  "feature,security,backend,phase-4-contact"

# -----------------------------------
# PHASE 5 — ADMIN (optionnel mais tres demonstratif)
# -----------------------------------

create_issue "Phase 5 — Mettre en place authentification et roles (ROLE_ADMIN)" \
  "$SEED_DIR/050-admin-auth-roles.md" \
  "feature,auth,security,backend,phase-5-admin"

create_issue "Phase 5 — CRUD Projets (admin) + upload images (optionnel)" \
  "$SEED_DIR/051-admin-crud-projects.md" \
  "feature,admin,backend,database,doctrine,upload,phase-5-admin"

create_issue "Phase 5 — Protections routes admin (access_control, voters si besoin)" \
  "$SEED_DIR/052-admin-security.md" \
  "feature,admin,security,backend,phase-5-admin"

# -----------------------------------
# PHASE 6 — QUALITE (tests, lint, perf, seo)
# -----------------------------------

create_issue "Phase 6 — Ajouter PHPStan et corriger les erreurs (niveau adapte)" \
  "$SEED_DIR/060-quality-phpstan.md" \
  "feature,refactor,backend,phase-6-quality"

create_issue "Phase 6 — Ajouter PHPUnit (tests basiques services/controllers)" \
  "$SEED_DIR/061-quality-phpunit.md" \
  "feature,test,backend,phase-6-quality"

create_issue "Phase 6 — Qualite front: HTML semantique, responsive, check a11y" \
  "$SEED_DIR/062-quality-frontend-a11y.md" \
  "feature,a11y,frontend,phase-6-quality"

create_issue "Phase 6 — SEO minimal (meta description, titres, sitemap/robots optionnel)" \
  "$SEED_DIR/063-quality-seo.md" \
  "feature,seo,frontend,phase-6-quality"

# -----------------------------------
# PHASE 7 — LIVRABLES (doc, deploy)
# -----------------------------------

create_issue "Phase 7 — Rediger README complet (install, docker, usage, conventions)" \
  "$SEED_DIR/070-delivery-readme.md" \
  "documentation,phase-7-delivery"

create_issue "Phase 7 — Ajouter guide de deploiement (variables d'env, build, checklist)" \
  "$SEED_DIR/071-delivery-deploy.md" \
  "documentation,ci,phase-7-delivery"

create_issue "Phase 7 — Preparations release (screenshots, liens, verifications finales)" \
  "$SEED_DIR/072-delivery-release-check.md" \
  "chore,phase-7-delivery"

echo "Toutes les issues ont ete creees."