<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategory() {
        return cache()->remember('all-category', 60*60*24 , function ()  {
            return Category::all();
        });
//        return Category::all();
    }
}
