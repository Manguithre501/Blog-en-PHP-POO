<?php

namespace App\Models;

use App\Models\Model;



class Article extends Model
{
    public static function articles_admins_relations($nb = null)
    {
        $limite = is_null($nb) ? '' : 'LIMIT ' . $nb;
        return parent::prepare("SELECT *
        ,a.id article_id,
        a.created_at date_pub,
        adm.id admin_id 
        FROM articles a 
        LEFT JOIN admins adm 
        ON a.admin_id = adm.id
        LEFT JOIN categories c
        ON a.categorie_id = c.id
        ORDER BY a.id DESC $limite");
    }

    public static function similary(int $categorie_id, int $article_id)
    {
        return parent::prepare('SELECT * FROM articles WHERE NOT id = ? AND categorie_id = ? ORDER BY id DESC', [$article_id, $categorie_id]);
    }
}
