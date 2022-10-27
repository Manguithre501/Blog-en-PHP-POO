<?php
global $db;

$db->exec("SET FOREIGN_KEY_CHECKS = 0");
$db->exec("DROP TABLE IF EXISTS users");
$db->exec("DROP TABLE IF EXISTS admins");
$db->exec("DROP TABLE IF EXISTS articles");
$db->exec("DROP TABLE IF EXISTS categories");
$db->exec("DROP TABLE IF EXISTS comments");
$db->exec("SET FOREIGN_KEY_CHECKS = 1");


echo "Les tables sont supprimée avec succès !\n";
