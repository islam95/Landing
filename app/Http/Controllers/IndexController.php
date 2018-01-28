<?php

namespace App\Http\Controllers;

use App\Page;

use App\Team;
use App\Service;
use App\Portfolio;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class IndexController extends Controller
{
    public function execute(Request $request)
    {
        // Checking if POST is used, meaning contact send form
        if ($request->isMethod('post')){

            $validation_messages = [
                'required' => "Please, fill in the field :attribute.",
                'email' => "Please, enter a valid email address in :attribute.",
            ];
            // Validate contact form
            $this->validate($request, [
                'name'      => 'required|max:255',
                'email'     => 'required|email',
                'message'   => 'required'
             ], $validation_messages);

            // Store input data in the variable
            $data = $request->all();

            // Sending mail
            $mail = Mail::send('emails.contact', ['data'=>$data], function($message) use ($data) {
                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email'], $data['name']);
                $message->to($mail_admin)->subject('Message from contact form of the website');
            });

            if ($mail){
                // redirecting to home page with a message stored in a session
                return redirect()->route('home')->with('status', 'Email is sent');
            }

        }

        $pages = Page::all();
        $portfolio = Portfolio::get(array('name', 'filter', 'images')); // можно выбрать что нам нужно
        $services = Service::all();
        $team = Team::take(3)->get(); // берет три сотрудника

        $tags = DB::table('portfolio')->distinct()->orderBy('filter', 'desc')->lists('filter');

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
            'tags'      => $tags,
        ));

    }
}
