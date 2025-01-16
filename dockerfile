FROM php:8.3.10-fpm-alpine

# Set default UID and GID, which can be overridden at build time
ARG UID=1000
ARG GID=1000
ENV UID=${UID} \
    GID=${GID}

# Create a new user and group with the specified UID and GID
RUN addgroup -g ${GID} --system omni && \
    adduser -G omni --system -D -s /bin/sh -u ${UID} omni

# Install dependencies, PHP extensions, and Composer
RUN apk update && apk add --no-cache \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    libpq-dev \
    openssl \
    unzip \
    curl \
    bash && \

    # pcntl is required for laravel reverb (websocket)
    docker-php-ext-install pdo pdo_pgsql pcntl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory and copy application files
WORKDIR /app
COPY ./src /app

# Ensure the user has permissions to the app directory
RUN chown -R omni:omni /app

# Switch to the non-root user
USER omni
