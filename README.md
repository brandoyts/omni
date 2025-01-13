# laravel-docker-file

Host your laravel app using this dockerfile

# Overview

This setup includes two key configuration files:

1. **Dockerfile**

   - Builds a custom PHP environment with all necessary dependencies required for the application.
   - Includes tools, libraries, and extensions like `pdo`, `pdo_pgsql`, and Composer.

2. **docker-compose.yaml**
   - Defines the services for the application:
     - **App Tier**: Runs the PHP-based application.
     - **DB Tier**: Configures a PostgreSQL database.
   - Specifies networking, ports, volumes, and environment variables for seamless communication between containers.

# Running the Setup

## Prerequisites

1. Install **Docker** and **Docker Compose**.
   - Follow the [Docker Installation Guide](https://docs.docker.com/get-docker/) for your platform.
   - Follow the [Docker Compose Installation Guide](https://docs.docker.com/compose/install/) if Docker Compose isn't bundled with Docker.

---

## Steps to Build and Start the Services

1. Build and start the services:
   ```bash
   docker compose up
   ```
