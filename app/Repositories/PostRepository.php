<?php
namespace App\Repositories;

use App\Models\Post;
use App\Contracts\PostContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
//use Illuminate\Support\Str;

/**
 * Class PostRepository
 * @package App\Repositories
 */
class PostRepository extends BaseRepository implements PostContract
{
    /**
     * PostRepository constructor
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listPosts(string $order='id', string $sort='asc', array $columns=['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findPostById(int $id)
    {
        try {

            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return post | mixed
     */
    public function createPost(array $params)
    {
        try {

            $collection = collect($params);

            $is_required = $collection->has('is_required') ? 1 : 0;

            $merge = $collection->merge(compact('is_required'));

            $post = new Post($merge->all());

            $post->save();

           return $post;

        } catch (QueryException $exception) {

            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePost(array $params)
    {
        try {
            $post = $this->findPostById($params['id']);

            $collection = collect($params)->except('_token');

            $is_required = $collection->has('is_required') ? 1 : 0;

            $merge = $collection->merge(compact('is_required'));
            $post->update($merge->all());

            return $post;

        } catch (QueryException $exception) {

            throw new InvalidArgumentException($exception->getMessage());
        }

    }

    /**
     * @param $id
     * @return bool | mixed
     */
    public function deletePost($id)
    {
        $post = $this->findPostById($id);

        $post->delete();

        return $post;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findPostBySlug($slug)
    {

        $post = Post::with('topic')->where('slug', $slug)->first();

        return $post;

    }
}
