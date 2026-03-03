#!/usr/bin/env bash
set -euo pipefail

: "${GITHUB_TOKEN:?Missing GITHUB_TOKEN}"
: "${OWNER:?Missing OWNER}"
: "${REPO:?Missing REPO}"

API="https://api.github.com/repos/${OWNER}/${REPO}/labels"
AUTH_HEADER="Authorization: Bearer ${GITHUB_TOKEN}"
ACCEPT_HEADER="Accept: application/vnd.github+json"
VERSION_HEADER="X-GitHub-Api-Version: 2022-11-28"
CONTENT_HEADER="Content-Type: application/json"

json_payload () {
  # IMPORTANT: ensure_ascii=True => JSON 100% ASCII, evite les soucis d'encodage Git Bash/Windows
  python - <<'PY' "$1" "$2" "$3"
import json, sys
name, color, desc = sys.argv[1], sys.argv[2], sys.argv[3]
print(json.dumps({"name": name, "color": color, "description": desc}, ensure_ascii=True))
PY
}

label_exists () {
  local name="$1"
  local code
  code=$(curl -sS -o /dev/null -w "%{http_code}" \
    -H "$AUTH_HEADER" -H "$ACCEPT_HEADER" -H "$VERSION_HEADER" \
    "${API}/${name}")
  [[ "$code" == "200" ]]
}

create_or_update_label () {
  local name="$1"
  local color="$2"
  local desc="$3"
  local payload response body code

  payload="$(json_payload "$name" "$color" "$desc")"

  if label_exists "$name"; then
    echo "UPDATE: $name"
    response=$(curl -sS -w "\n%{http_code}" -X PATCH \
      -H "$AUTH_HEADER" -H "$ACCEPT_HEADER" -H "$VERSION_HEADER" -H "$CONTENT_HEADER" \
      "${API}/${name}" \
      -d "$payload")
    body=$(echo "$response" | sed '$d')
    code=$(echo "$response" | tail -n 1)
    if [[ "$code" != "200" ]]; then
      echo "Erreur ($code) UPDATE label: $name"
      echo "$body"
      exit 1
    fi
  else
    echo "CREATE: $name"
    response=$(curl -sS -w "\n%{http_code}" -X POST \
      -H "$AUTH_HEADER" -H "$ACCEPT_HEADER" -H "$VERSION_HEADER" -H "$CONTENT_HEADER" \
      "$API" \
      -d "$payload")
    body=$(echo "$response" | sed '$d')
    code=$(echo "$response" | tail -n 1)
    if [[ "$code" != "201" ]]; then
      echo "Erreur ($code) CREATE label: $name"
      echo "$body"
      echo "Payload envoye:"
      echo "$payload"
      exit 1
    fi
  fi
}

# -------------------------
# Labels generiques (type)
# -------------------------
create_or_update_label "feature"       "1D76DB" "Nouvelle fonctionnalite"
create_or_update_label "bug"           "D73A4A" "Signalement d'un bug"
create_or_update_label "documentation" "0075CA" "Documentation ou mise a jour doc"
create_or_update_label "refactor"      "FBCA04" "Refactorisation du code"
create_or_update_label "test"          "5319E7" "Ajout ou modification de tests"
create_or_update_label "security"      "B60205" "Securite (correctif ou durcissement)"
create_or_update_label "chore"         "E1E4E8" "Tache technique (outillage, menage)"
create_or_update_label "ci"            "0E8A16" "CI/CD (pipeline, qualite, checks)"
create_or_update_label "good first issue" "7057FF" "Issue accessible pour demarrer"

# -------------------------
# Labels domaines / layers
# -------------------------
create_or_update_label "frontend"      "C5DEF5" "Interface utilisateur (UI)"
create_or_update_label "backend"       "5319E7" "Logique serveur"
create_or_update_label "database"      "006B75" "Base de donnees (schema, requetes, migrations)"
create_or_update_label "api"           "2B7489" "API (routes, format, contrats)"
create_or_update_label "ux"            "F9D0C4" "Experience utilisateur"
create_or_update_label "a11y"          "0B6E4F" "Accessibilite (a11y)"
create_or_update_label "seo"           "BFDADC" "Referencement (SEO)"

# -------------------------
# Labels stack projet
# -------------------------
create_or_update_label "symfony"       "000000" "Symfony (framework, config, services)"
create_or_update_label "twig"          "C1D9A2" "Twig (templates)"
create_or_update_label "doctrine"      "FC6A31" "Doctrine ORM (entites, repositories)"
create_or_update_label "mailer"        "D4C5F9" "Symfony Mailer (emails)"
create_or_update_label "mailpit"       "8A2BE2" "Mailpit (SMTP dev)"
create_or_update_label "docker"        "2496ED" "Docker (compose, images, reseau)"
create_or_update_label "mysql"         "4479A1" "MySQL (donnees, index, perf)"
create_or_update_label "phpmyadmin"    "6C78AF" "phpMyAdmin (administration BDD)"
create_or_update_label "nginx"         "009639" "Nginx (reverse proxy, conf)"
create_or_update_label "php"           "777BB4" "PHP (runtime, extensions, config)"

# -------------------------
# Labels fonctionnalites portfolio
# -------------------------
create_or_update_label "home"          "C2E0C6" "Page d'accueil"
create_or_update_label "projects"      "C2E0C6" "Liste des projets"
create_or_update_label "project-detail" "C2E0C6" "Page detail projet"
create_or_update_label "contact"       "C2E0C6" "Page contact"
create_or_update_label "admin"         "E99695" "Back-office (admin)"
create_or_update_label "auth"          "F9D0C4" "Authentification / autorisations"
create_or_update_label "validation"    "F1E05A" "Validation des entrees"
create_or_update_label "upload"        "A2EEEF" "Upload fichiers / images"
create_or_update_label "logging"       "D1D5DA" "Logs et observabilite"

# -------------------------
# Labels phases (roadmap)
# -------------------------
create_or_update_label "phase-0-init"     "BFDADC" "Phase 0 - Initialisation (repo, outillage, base Symfony)"
create_or_update_label "phase-1-docker"   "D4C5F9" "Phase 1 - Stack Docker (php, nginx, mysql, mailpit)"
create_or_update_label "phase-2-layout"   "C2E0C6" "Phase 2 - Layout Twig (header, nav, footer, base)"
create_or_update_label "phase-3-content"  "FCE2C0" "Phase 3 - Contenu (pages, donnees projets, templates)"
create_or_update_label "phase-4-contact"  "F9C2C2" "Phase 4 - Formulaire contact (validation, mailer, mailpit)"
create_or_update_label "phase-5-admin"    "E99695" "Phase 5 - Admin (CRUD projets, securite)"
create_or_update_label "phase-6-quality"  "E1E4E8" "Phase 6 - Qualite (tests, lint, perf, a11y, seo)"
create_or_update_label "phase-7-delivery" "F0FFF4" "Phase 7 - Livrables (README, deploy, documentation)"

echo "OK: labels crees / mis a jour."