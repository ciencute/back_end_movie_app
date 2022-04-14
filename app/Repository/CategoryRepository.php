<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategory() {
        return Category::all();
    }
}
