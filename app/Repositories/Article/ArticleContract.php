<?php
namespace App\Repositories\Article;
interface ArticleContract {
    public function getAll();
    public function create($request);
    public function findById($article_id);
    public function findByIdWithComments($article_id);
    public function likeCounter($article_id);
    public function viewCounter($article_id);
}
