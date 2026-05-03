-- 1. Créer l'utilisateur (s'il n'existe pas déjà)
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';

-- 2. Accorder les privilèges
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%' WITH GRANT OPTION;

-- 3. Appliquer
FLUSH PRIVILEGES;