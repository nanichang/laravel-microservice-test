<?php
namespace App\Repositories\Article;
use App\Repositories\Article\ArticleContract;
use App\Models\Article;
class EloquentArticleRepository implements ArticleContract {
    public function getAll(){
        return Article::orderBy('id', 'desc')->paginate(10);
    }

    public function create($request) {
        $article = new Article();
        $article->title = $request->title;
        $article->short_description = $request->short_description;
        $article->full_text = $request->full_text;
        $article->tags = $request->tags;
        $article->save();
        return $article;
    }

    public function findById($article_id) {
        return Article::findOrFail($article_id);
    }
    
    public function findByIdWithComments($article_id) {
        return Article::with('comments')->findOrFail($article_id);
    }
    
    public function likeCounter($article_id) {
        $article = $this->findById($article_id);
        $article->increment('likes_counter');
        $article->save();
        return $article;
    }
    
    public function viewCounter($article_id) {
        $article = $this->findById($article_id);
        $article->increment('views_counter');
        $article->save();
        return $article;
    }

}
