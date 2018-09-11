<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Home;
use App\EventModel;
use MaddHatter\LaravelFullcalendar\Calendar;
use MaddHatter\LaravelFullcalendar\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $homes = $this->getHomes();
        return view('home')->with('homes', $homes);
    }

    public function getHomes()
    {
        $homes = Home::take(10)->get();
        return $homes;
    }

    public function addHome()
    {
        return view('home/add');
    }

    public function createHome(Request $request)
    {
        $params = $request->except(['_token']); // Fetch all Forms parmas witout _token

        $date = new \DateTime();
        $home = new Home();
        $home->owner = Auth::user()->id;
        $home->title = $params['title'];
        $home->address = $params['address'];
        $home->country = $params['country'];
        $home->city = $params['city'];
        $home->type = $params['type'];
        $home->type_bed = $params['type_bed'];
        $home->content = $params['content'];
        $home->slug = Str::slug($params['title'] . $date->format('dmYhis'));

        $home->save(); // Insert BDD
        return redirect()->route('/')->with('success', 'Your home was added');
    }

    public function detailsHome($slug)
    {
        $home = Home::where('slug', '=', $slug)->first(); //Fetch $home by slug

        $calendar = $this->getbooking($slug);
        return view('home/details', compact('calendar'))->with('home', $home);//->with('calendar', $bookings);
    }

    public function sortHome($type, $data)
    {
        $homes = Home::where($type, '=', $data)->get(); //Fetch home by data
        //return view('ticket/showTicket')->with('ticket', $ticket)->with('messages', $messages);
        //print_r($homes); die();
        return view('home/listHomes')->with('homes', $homes)->with('data', $data);
    }

    public function getbooking($slug)
    {
        $events = EventModel::where([['slug_home', '=', $slug], ['accepted', '=', 1]])->get();

        $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events); //add an array with addEvents
        return $calendar;
    }

    public function updateHome(Request $request, $slug)
    {
        $home = Home::where('slug', '=', $slug)->first(); //Fetch $home by slug

        if ($request->isMethod('post')) {
            $params = $request->except(['_token']);  // Fetch all Forms parmas witout _token

            $date = new \DateTime();
            $home = Home::where('slug', '=', $slug)->first(); //Fetch $home by slug
            $home->owner = Auth::user()->id;
            $home->title = $params['title'];
            $home->address = $params['address'];
            $home->country = $params['country'];
            $home->city = $params['city'];
            $home->type = $params['type'];
            $home->type_bed = $params['type_bed'];
            $home->content = $params['content'];
            $home->slug = Str::slug($params['title'] . $date->format('dmYhis'));

            $home->save(); // Update ticket by slug

            $calendar = $this->getbooking($slug);
            return view('home/details', compact('calendar'))->with('home', $home);
        }
        return view('home/add')->with('home', $home);
    }

    public function store(Request $request)
    {
$path = $request->file('image')->store('/');
echo $path;
    }

}
