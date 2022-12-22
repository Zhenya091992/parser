<?php

namespace App\Http\Controllers;

use App\Classes\Crawler\CustomCrawlObserver;
use App\Classes\Crawler\ExtendsChildUrlCrawlProfile;
use App\Exceptions\CustomCrawlObserverException;
use App\Helpers\HelperParser;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\View;
use Spatie\Crawler\Crawler;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('Category.index', ['category' => $category]);
    }

    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nameCategory' => 'required',
            'url' => 'required|url',
            'param' => 'required',
            'value' => 'required',
        ]);

        $category = Category::make([
            'user_id' => Auth::user()->id,
            'name_category' => $validated['nameCategory'],
            'url' => $validated['url'],
            'components_category' => array_combine($validated['param'], $validated['value']),
        ]);

        ini_set('max_execution_time', 600);

        try {
            Crawler::create()
                ->ignoreRobots()
                ->setCrawlObserver(new CustomCrawlObserver($category))
                ->setCrawlProfile(new ExtendsChildUrlCrawlProfile($validated['url']))
                ->startCrawling($validated['url']);
        } catch (CustomCrawlObserverException $err) {
            return Redirect::back()->withErrors(['msg' => $err->getMessage()])->withInput();
        }


        return redirect(route('Category.index'));
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('Category.show', ['category' => $category, 'data' => $category->unitData]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('Category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->param;
        $value = $request->value;
        $category = Category::find($id);
        $category->name_category = $request->nameCategory;
        $category->url = $request->url;
        $category->components_category = array_combine($param, $value);
        $category->save();

        return redirect(route('Category.index'));

    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect(route('Category.index'));
    }
}
