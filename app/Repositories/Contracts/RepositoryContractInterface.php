<?php

namespace App\Repositories\Contracts;

interface RepositoryContractInterface
{
    public function createUser(array $data);
    public function createPost($id, array $data);
    public function getPost();
    public function deletePost($id);
    public function getOnePost($id);
    public function updatePost($id, array $data);
}