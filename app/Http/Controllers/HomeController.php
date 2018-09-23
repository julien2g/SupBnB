<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Home;
use App\EventModel;
use App\Img;
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
        $imgs = Img::all();
        return view('home')->with('homes', $homes)->with('imgs', $imgs);
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
        $img = Img::where('slug_home', '=', $slug)->first();
        $imgs = Img::where('slug_home', '=', $slug)->get();

        $calendar = $this->getbooking($slug);
        return view('home/details', compact('calendar'))->with('home', $home)->with('img', $img)->with('imgs', $imgs);
    }

    public function sortHome($type, $data)
    {
        $homes = Home::where($type, '=', $data)->get(); //Fetch home by data
        $imgs = Img::all();

        return view('home/listHomes')->with('homes', $homes)->with('data', $data)->with('imgs', $imgs);
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

            $home->save(); // Update ticket by slug

            $img = Img::where('slug_home', '=', $slug)->first();
            $imgs = Img::where('slug_home', '=', $slug)->get();

            $calendar = $this->getbooking($slug);
            return view('home/details', compact('calendar'))->with('home', $home)->with('img', $img)->with('imgs', $imgs);
        }
        return view('home/add')->with('home', $home);
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('/public');
        $params = $request->except(['_token']);  // Fetch all Forms parmas witout _token
        $img = new Img();
        $img->slug_home = $params['slug'];
        $img->title = str_replace('public', 'storage', $path);
        $img->save();
        //echo asset('/storage/a.png');

return redirect()->route('/')->with('success', 'Your picture was added');

        //
        //echo $path;
        //echo $img;
    }

}
