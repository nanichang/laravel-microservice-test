<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Article\ArticleContract;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    protected $repo;
    public function __construct(ArticleContract $articleContract) {
        $this->repo = $articleContract;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/articles",
     *     @OA\Response(response="200", description="Display a listing of articles.")
     *      
     * )
     */
    public function index() {
        $articles = $this->repo->getAll();
        
        return response()->json([
            'data' => $articles,
            'message' => 'Articles fetched successfully'
        ], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/articles/{article_id}",
     *     @OA\Response(response="200", description="Fetch an Article.")
     * )
     */
    public function findById($article_id) {
        $article = $this->repo->findById($article_id);
        return response()->json([
            'data' => $article,
            'message' => 'Article fetched successfully'
        ], 200);
    }
    

    /**
     * @OA\Get(
     *     path="/api/v1/articles/{article_id}/comment",
     *     @OA\Response(response="200", description="Fetch an Article with its corresponding comments.")
     * )
     */
    public function getArticleWithComments($article_id) {
        $article = $this->repo->findByIdWithComments($article_id);
        return response()->json([
            'data' => $article,
            'message' => 'Article fetched successfully'
        ], 200);
    }


    /**
     * @OA\Get(
     *     path="/api/v1/articles/{article_id}/like",
     *     @OA\Response(response="200", description="Like an Article.")
     * )
     */
    public function likeArticle($article_id) {
        $article = $this->repo->likeCounter($article_id);
        return response()->json([
            'message' => 'Article liked successfully',
            'data' => $article
        ], 201);
    }
    
    /**
     * @OA\Get(
     *     path="/api/v1/articles/{article_id}/view",
     *     @OA\Response(
     *          response="200", 
     *          description="update article view counts."
     *      )
     * )
     */
    public function viewArticle($article_id) {
        $article = $this->repo->viewCounter($article_id);
        return response()->json([
            'message' => 'Article viewed successfully',
            'data' => $article
        ], 201);
    }

}
