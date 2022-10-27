<?php

namespace App\Http\Controllers;

use App\Helpers\Auth;
use App\Helpers\Mot;
use App\Models\Article;
use App\Models\Comment;

class BlogController extends Controller
{

    public function index()
    {
        $articles = Article::articles_admins_relations();
        return $this->view('Blogs.index', compact('articles'));
    }

    public function show(int $id)
    {
        $article = Article::findOrFail($id);
        $similaires = Article::similary((int) $article->categorie_id, (int) $article->id);
        $comments = Comment::comments($id);
        return $this->view('Blogs.single', compact('article', 'similaires', 'comments'));
    }

    /*

    public function searchResult()
    {
        return $this->view('articles.searchResult');
    } */

    public function allComments($id)
    {
        $comments = Comment::comments($id);

        foreach ($comments as $comment) { ?>
            <div class="comments-list-item">
                <div class="comment-item">
                    <div class="comment-item-userpic">
                        <img src="<?= Mot::firstChars($comment->name)  ?>" alt="" class="image-cover">
                    </div>
                    <div class="comment-item-name"><?= ucfirst($comment->name) ?></div>
                    <div class="comment-item-date"><?= date(
                                                        "d.m.Y, H:i",
                                                        strtotime($comment->commented_at)
                                                    ) ?>

                    </div>

                    <div class="comment-item-text">
                        <?= nl2br($comment->comment) ?>
                    </div>
                    <?php if (!empty(Auth::user()) && $comment->user_id === Auth::user()->id) { ?>
                        <div class="reply-link">
                            <a href="#">Modifier</a> | <a href="#">Supprimer</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php  }
    }

    public function commentStore()
    {
        $data = $this->json();


        $tabs = [
            'article_id' => $data['article_id'],
            'user_id' => Auth::user()->id,
            'comment' => $data['comment']

        ];

        Comment::create($tabs);


        ?>
        Commentaire<?= count(Comment::comments($data['article_id'])) > 1 ? 's' : ''  ?><span class="comments-count"><?= count(Comment::comments($data['article_id'])) ?></span>
<?php

        /* echo json_encode($nb_coms); */
    }
}
