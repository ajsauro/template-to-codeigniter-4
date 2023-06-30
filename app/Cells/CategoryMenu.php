<?php

namespace App\Cells;

use App\Models\Category as ModelsCategory;

class CategoryMenu
{
    public function render(string $view)
    {
        $category = new ModelsCategory();
        $categories = $category->select('name, slug')->findAll();

        return view("partials/cells/{$view}", ['categories' => $categories]);
    }
}
