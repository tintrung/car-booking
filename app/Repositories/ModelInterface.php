<?php

namespace App\Repositories;

interface ModelInterface
{
    public function create(array $data);

    public function all();

    public function get(int $id);

    public function update(int $id, array $data);

    public function delete(int $data);
}
