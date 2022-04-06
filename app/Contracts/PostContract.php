<?php
namespace App\Contracts;

/**
 * Interface PostContract
 * @package \App\Contracts
 */

interface PostContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listPosts(string $order='id', string $sort='asc', array $columns=['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findPostById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createPost(array $params);

    /**
     * @params array $params
     * @return mixed
     */
    public function updatePost(array $params);

    /**
     * @params $id
     * @return bool
     */
    public function deletePost($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findPostBySlug($slug);
}
