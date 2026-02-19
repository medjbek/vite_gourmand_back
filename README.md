# Vite & Gourmand – Backend API (Laravel)

## Présentation

Ce dépôt contient l’API REST du projet Vite & Gourmand, développée avec Laravel 12.

L’API est responsable de :
- la logique métier
- l’accès aux données (MySQL, MongoDB)
- l’exposition des données au format JSON pour le front-end (Quasar).

---

## Liens du projet

- API – Local (Docker)  
  http://localhost:8000/api

- API – Production  
  https://medj-vite-gourmand.alwaysdata.net/api

---

## Technologies utilisées

- Laravel 12 (Framework PHP)
- PHP 8.4+
- MySQL
- Eloquent ORM
- Docker & Docker Compose
- AlwaysData (hébergement de production)

---

## Exemple d'endpoint principaux

Voici 2 exemples d'endpoints, qui correspondent à la récupération de menus.

- **GET `/api/menus`**  
  Retourne la liste complète des menus.

- **GET `/api/menus/{id}`**  
  Retourne le détail d’un menu (plats, images, régimes, allergènes, conditions, etc.).

---

## Format des réponses

Les réponses de l'API sont au format JSON

### Exemple de réponse

```json
{
  "data": {
    "id": 1,
    "title": "Menu Noël",
    "description": "...",
    "minimum_people": 6,
    "base_price": 22.5,
    "stock": 5,
    "conditions": "Commander 7 jours avant...",
    "theme": { "name": "Noël" },
    "diets": [{ "name": "Végétarien" }],
    "images": [{ "id": 10, "url": "..." }],
    "dishes": [
      {
        "id": 3,
        "type": "starter",
        "name": "Velouté",
        "description": "...",
        "allergens": [{ "name": "Lactose" }]
      }
    ]
  }
}
```

## Gestion des erreurs

L’API respecte les codes HTTP standards :

- **200** : requête réussie  
- **404** : ressource non trouvée  
- **500** : erreur interne du serveur  

Les erreurs sont gérées côté front via le statut HTTP afin d’afficher un message utilisateur approprié.

---

## Installation & lancement (Docker)

### Prérequis

- Docker
- Docker Compose

Aucune installation locale de PHP ou de base de données n’est nécessaire.

---

### Clonage du projet

```bash
git clone https://github.com/medjbek/vite_gourmand_back.git
cd vite_gourmand_back
```

### Configuration de l’environnement

Le fichier `.env` est spécifique à chaque environnement et n’est pas versionné pour des raisons de sécurité.

### Lancement des conteneurs

```bash
docker compose up -d --build
```

Les migrations sont exécutées automatiquement, et la clé de sécurité Laravel est générée. Si vous souhaitez des données de test, vous pouvez exécuter les seeders :

```bash
docker exec -it vite_gourmand_app bash
php artisan db:seed
```

### Lancement des conteneurs

L’API est accessible à l’adresse suivante :  
http://localhost:8000/api


