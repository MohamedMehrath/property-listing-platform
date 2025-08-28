# 02: Project Workflow and Backlog

This document provides a high-level workflow for building the Minimum Viable Product (MVP) and the initial configuration needed to run the new application.

---

## 1. MVP Task Dependency Graph

This graph illustrates the logical order of operations for developing the core features of the application. Work should generally proceed from left to right, respecting the dependencies shown by the arrows.

```mermaid
graph TD
    A[Project Setup & Scaffolding] --> B(Database Schema Design);
    B --> C(User Authentication System);
    C --> D(API: Property Management);
    D --> E(UI: Agent Admin Panel for CRUD);
    B --> F(API: Public Property Listings);
    F --> G(UI: Public Property Search & View);
    D -- "Data Source" --> G;
    C -- "Protects" --> E
```

| ID | Task | Description |
| :--- | :--- | :--- |
| **A** | **Project Setup & Scaffolding** | Initialize the Next.js application, set up version control, and establish the basic project structure. |
| **B** | **Database Schema Design** | Define and create the new, normalized tables in PostgreSQL for users, properties, offices, etc., using an ORM like Prisma. |
| **C** | **User Authentication System** | Implement secure login/logout for agents and admins using NextAuth.js. |
| **D** | **API: Property Management** | Create the backend API endpoints for Creating, Reading, Updating, and Deleting (CRUD) property listings. |
| **E** | **UI: Agent Admin Panel** | Build the password-protected frontend interface where authenticated agents can manage their property listings. |
| **F** | **API: Public Property Listings** | Create the public-facing API endpoints to fetch and search property listings for display. |
| **G** | **UI: Public Property Search & View** | Build the public website pages where users can browse, search for, and view the details of property listings. |

---

## 2. Configuration Management (`.env.example`)

This section contains the draft content for the `.env.example` file. This file lists all the necessary environment variables for the new application to run. A developer would copy this to a `.env` file and fill in the actual secrets.

```
# .env.example

# PostgreSQL Database Connection
# The connection string for your PostgreSQL database.
DATABASE_URL="postgresql://user:password@host:port/database?sslmode=require"

# NextAuth.js Configuration
# A random string used to hash tokens, sign cookies, and generate cryptographic keys.
# You can generate a suitable secret on the command line via: openssl rand -base64 32
NEXTAUTH_SECRET="YOUR_RANDOM_SECRET_STRING_HERE"
NEXTAUTH_URL="http://localhost:3000"

# Add provider credentials here if you use OAuth, e.g., Google, GitHub.
# GITHUB_ID=
# GITHUB_SECRET=

# Cloud Storage for property images (e.g., AWS S3 or Cloudflare R2)
# For R2, you may also need to set S3_ENDPOINT.
S3_ACCESS_KEY_ID="YOUR_S3_ACCESS_KEY"
S3_SECRET_ACCESS_KEY="YOUR_S3_SECRET_ACCESS_KEY"
S3_REGION="YOUR_S3_REGION"
S3_BUCKET_NAME="YOUR_S3_BUCKET_NAME"

# The public URL of the application.
# This is used in various places like generating absolute URLs for emails.
NEXT_PUBLIC_APP_URL="http://localhost:3000"
```
