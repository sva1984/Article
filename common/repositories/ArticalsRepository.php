<?php

namespace common\repositories;

interface StorageInterface
{
    /**
     * @return array
     */
    public function load();

    /**
     * @param array
     */
    public function save(array $items);
    /**
     * @param int
     */
    public function delete($id);

}​;
