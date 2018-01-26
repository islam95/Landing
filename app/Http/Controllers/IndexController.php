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

        $menu = array();

        // Pages /home and /about us with section IDs home and aboutUs
        foreach ($pages as $page){
            $item = array('title'=>$page->name, 'alias'=>$page->alias);
            array_push($menu, $item);
        }

        // page Services with section id service
        $item = array('title'=>'Services', 'alias'=>'service');
        array_push($menu, $item);

        // page Portfolio with section id Portfolio
        $item = array('title'=>'Portfolio', 'alias'=>'Portfolio');
        array_push($menu, $item);

        // page Team with section id team
        $item = array('title'=>'Team', 'alias'=>'team');
        array_push($menu, $item);

        // page Contact with section id contact
        $item = array('title'=>'Contact', 'alias'=>'contact');
        array_push($menu, $item);

        return view('front.index', array(
            'menu'      => $menu,
            'pages'     => $pages,
            'team'      => $team,
            'services'  => $services,
            'portfolio' => $portfolio,
        ));

    }
}
