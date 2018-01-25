<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Service;
use App\Portfolio;
use App\Team;


class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $pages = Page::all();
        $portfolio = Portfolio::get(array('name', 'filter', 'images')); // можно выбрать что нам нужно
        $services = Service::all();
        $team = Team::take(3)->get(); // берет три сотрудника

        dd($team);

        return view('layouts.main');
    }
}
