<?php require_once(dirname(dirname(__DIR__)) . '/vendor/autoload.php');


$faker = Faker\Factory::create('fr_FR');
$articles = [];
$users  = [];
$categories = [];
$comments = [];


$db->exec("SET FOREIGN_KEY_CHECKS = 0");


$db->exec("TRUNCATE TABLE users");
$db->exec("TRUNCATE TABLE admins");
$db->exec("TRUNCATE TABLE articles");
$db->exec("TRUNCATE TABLE categories");
$db->exec("TRUNCATE TABLE comments");
$db->exec("SET FOREIGN_KEY_CHECKS = 1");

echo "Les tables a été nettoyer avec succès !\n";

$hashPassword = null;

for ($i = 0; $i < 10; $i++) {
    /* $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT); */
    $hashPassword = password_hash('password', PASSWORD_BCRYPT);

    $db->exec("INSERT INTO users
                SET name  = '{$faker->userName}',
                email =  '{$faker->unique()->safeEmail()}',
                avatar = 'avatars/{$faker->numberBetween(1, 10)}.jpg',
                password = '{$hashPassword}',
                created_at = '{$faker->date} {$faker->time}'
    ");

    $users[] = $db->lastInsertId();
}
echo 'Les données des tables USERS, ';




/* $hashPassword = password_hash($faker->password, PASSWORD_BCRYPT); */
$hashPassword = password_hash('password', PASSWORD_BCRYPT);

$db->exec("INSERT INTO admins
                SET name  = 'manguithre',
                email  = 'manguithre@gmail.com',
                password = '{$hashPassword}',
                role = 'administrateur',
                created_at = '{$faker->date} {$faker->time}'
    ");
echo 'ADMINS, ';





for ($i = 0; $i < 21; $i++) {
    $db->exec("INSERT INTO articles
                SET admin_id = 1,
                categorie_id = '{$faker->numberBetween(1, 3)}',
                title  = '{$faker->sentence(10)}',
                content = '{$faker->paragraphs(rand(3, 5), true)}',
                image =  'articles/{$faker->numberBetween(1, 6)}.jpg',
                status = '{$faker->numberBetween(0, 1)}',
                created_at = '{$faker->date} {$faker->time}'
    ");

    $articles[] = $db->lastInsertId();
}
echo 'ARTICLES, ';

/** CATEGORIES ***** */
$db->exec("INSERT INTO categories
                SET nom_categorie  = 'Loisirs'
    ");
$db->exec("INSERT INTO categories
SET nom_categorie  = 'Sports'
");

$db->exec("INSERT INTO categories
                SET nom_categorie  = 'Musique'
    ");


echo 'CATEGORIES ';




for ($i = 0; $i < 100; $i++) {
    $db->exec("INSERT INTO comments
                SET article_id = '{$faker->numberBetween(1, 21)}',
                user_id = '{$faker->numberBetween(1, 10)}',
                comment = '{$faker->paragraphs(rand(3, 4), true)}',
                commented_at = '{$faker->date} {$faker->time}'
    ");

    $comments[] = $db->lastInsertId();
}
echo "et COMMENTS ont été ajoutés avec succès !\n";
