FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions including PostgreSQL support
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Add a flag.txt file to the etc directory
RUN echo "Flag{dockerfile}" > /etc/flag.txt

# Get the flag.txt file
RUN cat /etc/flag.txt

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY ./src /var/www/html

# Expose port 80
EXPOSE 80