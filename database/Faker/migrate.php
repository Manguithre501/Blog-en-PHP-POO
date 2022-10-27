<?php
require_once('dbDelete.php');


$db->exec("CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    avatar VARCHAR(255) NOT NULL DEFAULT 'user.png' ,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

echo "Les tables USERS, ";


$db->exec("CREATE TABLE IF NOT EXISTS admins(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    avatar VARCHAR(255) NOT NULL DEFAULT 'avatars/user.png' ,
    password VARCHAR(255) NOT NULL,
    role ENUM('administrateur', 'moderateur'),
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

echo "ADMINS, ";

$db->exec("CREATE TABLE IF NOT EXISTS articles(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    admin_id INT DEFAULT NULL,
    categorie_id INT DEFAULT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NULL,
    status TINYINT NULL DEFAULT '0',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

echo "ARTICLES, ";


$db->exec("CREATE TABLE IF NOT EXISTS categories(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom_categorie VARCHAR(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

echo "CATEGORIES ";



$db->exec("CREATE TABLE IF NOT EXISTS comments(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    article_id INT DEFAULT NULL,
    user_id INT DEFAULT NULL,
    comment TEXT NOT NULL,
    commented_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    /* updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, */
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

echo "et COMMENTS sont tous créer avec succès !\n";