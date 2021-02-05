<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNavigationRequest;
use App\Http\Requests\UpdateNavigationRequest;
use App\Navigation;
use App\NavigationItem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index() {
        $navigations = Navigation::get();
        return view('admin.navigation.index', compact(['navigations']));
    }

    public function show(Navigation $navigation) {
        return view('admin.navigation.show', compact(['navigation']));
    }

    public function delete(Navigation $navigation) {
        $navigation->delete();
        return redirect()->route('admin.navigation.index');
    }

    public function create() {
        return view('admin.navigation.create');
    }

    public function store(StoreNavigationRequest $request) {

        $navigation = new Navigation();
        $navigation->name = $request->input('name');
        $navigation->save();

        return redirect()->route('admin.navigation.show', $navigation->id);
    }


    public function update(Navigation $navigation, UpdateNavigationRequest $request) {

        $navigation->name = $request->input('name');
        $navigation->save();

        $categories = $request->input('categories');

        $currentCategories = $navigation->categories->keyBy('id');

        $currentCategories->each(function($category) use($categories) {
            $updatedCat = $categories[$category->id];
            $category->order = $updatedCat['order'];
            $category->save();
        });

        return redirect()->route('admin.navigation.show', $navigation->id);
    }
}
