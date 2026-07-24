# 🎓 BDE Events Management

Application web développée avec **Laravel** permettant à un Bureau des Étudiants (BDE) de gérer les événements et aux étudiants de réserver leur place et de consulter leurs billets.

---

# 📖 Description

Cette application permet aux administrateurs du BDE de créer et gérer les événements étudiants, tandis que les étudiants peuvent consulter les événements disponibles, réserver une place et accéder à leurs billets numériques.

Le projet a été réalisé dans le cadre d'un brief de développement web.

---

# ✨ Fonctionnalités

## 👨‍💼 Administrateur (BDE)

- Authentification
- Création d'événements
- Modification d'événements
- Suppression d'événements
- Liste des événements
- Suivi des réservations
- Affichage du nombre de places restantes
- Accès sécurisé via Middleware `IsAdmin`

---

## 👨‍🎓 Étudiant

- Inscription / Connexion
- Consultation des événements
- Réservation d'un événement
- Consultation de l'espace **Mes Billets**
- Génération automatique d'un ticket avec un code unique

---

# 🔐 Sécurité

- Authentification Laravel
- Middleware personnalisé **IsAdmin**
- Protection des routes `/admin/*`
- Empêche une double réservation pour le même événement
- Vérification de la capacité maximale avant chaque réservation

---

# 🛠️ Technologies utilisées

- Laravel
- PHP
- MySQL
- Blade
- Bootstrap
- HTML
- CSS
- JavaScript
- Git & GitHub

---

# 🗄️ Base de données

Le projet est composé principalement des tables suivantes :

- users
- events
- reservations
- tickets

### Relations

- Un utilisateur peut effectuer plusieurs réservations.
- Un événement possède plusieurs réservations.
- Une réservation génère un seul ticket.

---

# 📂 Structure du projet

```
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/
database/
resources/
routes/
```

---

# 🚀 Installation

### Cloner le projet

```bash
git clone https://github.com/votre-username/bde-events.git
```

### Accéder au dossier

```bash
cd bde-events
```

### Installer les dépendances

```bash
composer install
```

### Copier le fichier d'environnement

```bash
cp .env.example .env
```

### Générer la clé

```bash
php artisan key:generate
```

### Configurer la base de données

Modifier le fichier **.env**

```env
DB_DATABASE=bde_events
DB_USERNAME=root
DB_PASSWORD=
```

### Exécuter les migrations

```bash
php artisan migrate
```

### Lancer le serveur

```bash
php artisan serve
```

---

# 📌 Règles métier

- Seul un administrateur peut gérer les événements.
- Un étudiant ne peut réserver qu'une seule fois le même événement.
- Impossible de réserver un événement complet.
- Chaque ticket possède un code unique.
- Les places restantes sont calculées automatiquement.

---

# 👥 Rôles

## Admin

- Gestion des événements
- Consultation des réservations
- Tableau de bord

## Étudiant

- Réserver un événement
- Consulter ses billets

---

# 📸 Captures d'écran

Ajouter ici :

- Dashboard Admin
- Liste des événements
- Formulaire de création
- Réservation
- Mes billets

---

# 📊 Diagrammes

Le dépôt contient :

- Diagramme UML (Use Case)
![Capture d'écran 2026-07-20 113851.png](../Capture%20d'écran%202026-07-20%20113851.png)
- Diagramme de classes
- ![diagramme de class 1-2.png](../diagramme%20de%20class%201-2.png)
- ERD (Entity Relationship Diagram)
![diagramme ERD1.png](../diagramme%20ERD1.png)
---

# 📁 Livrables

- ✅ GitHub
- ✅ JIRA
- ✅ Canva
- ✅ README
- ✅ Diagrammes UML
- ✅ ERD

---

# 📄 Auteur

**Othmane Hamadellah**

Développeur Web Full Stack

---

# 📜 Licence

Projet réalisé dans le cadre d'un brief pédagogique.
