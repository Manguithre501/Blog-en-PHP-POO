<?php

namespace App\Models;

use App\Models\Model;

class Comment extends Model
{

    public static function comments($id)
    {
        return parent::prepare('SELECT * FROM comments c LEFT JOIN articles a ON c.article_id = a.id LEFT JOIN users u On c.user_id = u.id WHERE c.article_id = ? ORDER BY commented_at DESC', [$id]);
    }

    public static function nb_responses($id)
    {


        /* foreach ($topics as $topic) {
            $tab[] = $topic->id;
        }
        $ids = implode(', ', $tab);
        $req = parent::prepare("SELECT COUNT(*) FROM responses WHERE topic_id IN ($ids)", [$ids]);
        dd($req); */


        return (int) (parent::prepare("SELECT count(id) as nb_resp FROM responses WHERE topic_id = ?", [$id]))->nb_resp;
    }
}
