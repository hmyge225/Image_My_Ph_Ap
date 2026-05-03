FROM php:8.3.16-apache

# Activer le module de réécriture d'URL pour le .htaccess
RUN a2enmod rewrite

# Installer l'extension mysqli pour ta connexion à la BDD
RUN docker-php-ext-install mysqli

# (Optionnel) Si tu as besoin de PDO plus tard
RUN docker-php-ext-install pdo pdo_mysql