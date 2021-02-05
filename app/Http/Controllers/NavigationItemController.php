<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNavigationItemRequest;
use App\Http\Requests\UpdateNavigationItemRequest;
use App\NavigationCategory;
use App\NavigationItem;
use Illuminate\Http\Request;

class NavigationItemController extends Controller
{
    public function show(NavigationItem $navigationItem) {
        return view('admin.navigation-item.show', compact(['navigationItem']));
    }

    public function create(Request $request) {
        $navigationCategory = NavigationCategory::find($request->input('navigation_category'));
        return view('admin.navigation-item.create', compact(['navigationCategory']));
    }

    public function store(StoreNavigationItemRequest $request) {
        $navigationItem = new NavigationItem();
        $navigationItem->name = $request->input('name');
        $navigationItem->href = $request->input('href');
        $navigationItem->order = $request->input('order');
        $navigationItem->navigationCategory()->associate($request->input('navigation_category'));
        $navigationItem->save();

        return redirect()->route('admin.navigation-item.show', $navigationItem->id);
    }

    public function update(NavigationItem $navigationItem, UpdateNavigationItemRequest $request) {

        $navigationItem->name = $request->input('name');
        $navigationItem->href = $request->input('href');
        $navigationItem->order = $request->input('order');
        $navigationItem->save();

        return redirect()->route('admin.navigation-item.show', $navigationItem->id);
    }

    public function delete(NavigationItem $navigationItem) {
        $navigationCategory = $navigationItem->navigationCategory;
        $navigationItem->delete();

        return redirect()->route('admin.navigation-category.show', $navigationCategory->id);
    }
}
