<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNavigationCategoryRequest;
use App\Http\Requests\UpdateNavigationCategoryRequest;
use App\NavigationCategory;
use App\Navigation;
use Illuminate\Http\Request;

class NavigationCategoryController extends Controller
{
    public function show(NavigationCategory $navigationCategory) {
        return view('admin.navigation-category.show', compact(['navigationCategory']));
    }

    public function update(NavigationCategory $navigationCategory, UpdateNavigationCategoryRequest $request) {

        $navigationCategory->name = $request->input('name');
        $navigationCategory->colour = $request->input('colour');
        $navigationCategory->save();

        $items = $request->input('items');

        $currentItems = $navigationCategory->navigationItems->keyBy('id');

        $currentItems->each(function($item) use($items) {
            $updatedItem = $items[$item->id];
            $item->name = $updatedItem['name'];
            $item->href = $updatedItem['href'];
            $item->order = $updatedItem['order'];
            $item->save();
        });

        return redirect()->route('admin.navigation-category.show', $navigationCategory->id);
    }

    public function create(Request $request) {
        $navigation = Navigation::find($request->input('navigation'));
        return view('admin.navigation-category.create', compact(['navigation']));
    }

    public function store(StoreNavigationCategoryRequest $request) {
        $navigationCategory = new NavigationCategory();
        $navigationCategory->name = $request->input('name');
        $navigationCategory->colour = $request->input('colour');
        $navigationCategory->order = $request->input('order');
        $navigationCategory->navigation()->associate($request->input('navigation'));
        $navigationCategory->save();

        return redirect()->route('admin.navigation-category.show', $navigationCategory->id);
    }

    public function delete(NavigationCategory $navigationCategory) {
        $navigation = $navigationCategory->navigation;
        $navigationCategory->delete();

        return redirect()->route('admin.navigation.show', $navigation->id);
    }
}
