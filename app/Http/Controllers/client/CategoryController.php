<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;

class CategoryController extends  Controller
{
    protected $repo ;
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->repo = $categoryRepository;
    }

    /**
     * get all Categories
     * @authenticated
     */

    public function getAllCategory() {
        return $this->repo->getAllCategory();
    }
}
