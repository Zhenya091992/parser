<?php

namespace App\Http\Controllers;

use App\Helpers\HelperParser;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class MainController extends Controller
{
    public function index()
    {
        return view('Main.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $dataOfCategory = HelperParser::run($category->url, $category->components_category->all());

        return view('Main.show', ['category' => $category, 'dataOfCategory' => $dataOfCategory]);
    }
}
