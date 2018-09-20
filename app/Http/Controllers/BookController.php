<?php

namespace App\Http\Controllers;

use App\EventModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Home;
use App\Booking;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function addBook(Request $request)
    {

        $params = $request->except(['_token']); // Fetch all Forms parmas witout _token
        $booking = new EventModel();
        $booking->id_booker = Auth::user()->id;
        $booking->title = Auth::user()->name;
        $booking->start = $params['start'];
        $booking->end = $params['end'];
        $booking->slug_home = $params['slug_home'];
        $booking->id_owner = $params['id_owner'];

        $booking->save(); // Insert BDD
        return redirect()->back();
    }

    public function bookingFetch()
    {
        $reservations = EventModel::where('id_owner', '=', Auth::user()->id)->get();

        $homes_r = array();
        $owners_r = array();
        foreach ($reservations as $reservation) {

            $home_r = Home::where('slug', '=', $reservation->slug_home)->first(); //Fetch $home by slug
            array_push($homes_r, $home_r);
            $owner_r = User::where('id', '=', $reservation->id_booker)->first();
            array_push($owners_r, $owner_r);

        }

        $homes = array();
        $owners = array();
        $bookings = EventModel::where('id_booker', '=', Auth::user()->id)->get();
        foreach ($bookings as $booking) {

            $home = Home::where('slug', '=', $booking->slug_home)->first(); //Fetch $home by slug
            array_push($homes, $home);
            $owner = User::where('id', '=', $booking->id_owner)->first();
            array_push($owners, $owner);

        }

        return view('booking/myBookings')->with('bookings', $bookings)->with('homes', $homes)->with('owners', $owners)->with('reservations', $reservations)->with('homes_r', $homes_r)->with('owners_r', $owners_r);
    }

    public function acceptBooking($id)
    {
        $booking = EventModel::find($id);
        $booking->accepted = 1;
        $booking->save();
        return redirect()->back();

    }

    public function refusedBooking($id)
    {
        $booking = EventModel::find($id);
        $booking->accepted = 2;
        $booking->save();
        return redirect()->back();

    }

}
