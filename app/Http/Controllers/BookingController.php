<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all()->map(function ($booking) {
            return [
                'title' => $booking->meeting_room,
                'start' => $booking->booking_date . 'T' . $booking->booking_time,
                'end' => $booking->booking_date . 'T' . $booking->end_time,
                'description' => $booking->department_name .
                    "<br>Bilik: " . $booking->meeting_room .
                    "<br>Mula: " . $booking->booking_time .
                    "<br>Hingga: " . $booking->end_time,
            ];
        });

        return view('home', compact('bookings'));
    }

    public function showAll()
    {
        $rooms = ['Dewan Mesyuarat', 'Gerakan', 'Seroja', 'Bunga Tanjung', 'Bakawali', 'Ixora', 'Tekoma', 'Orkid', 'Anggerik', 'Bunga Raya'];
        return view('/rooms/meeting_rooms', compact('rooms'));
    }

    public function show($room)
    {
        $bookings = Booking::where('meeting_room', $room)
            ->orderBy('booking_date', 'asc')
            ->orderBy('booking_time', 'asc')
            ->orderBy('end_time', 'asc')
            ->get();

        return view('/rooms/meeting_room', compact('bookings', 'room'));
    }

    public function create($room)
    {
        return view('/bookings/booking', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'meeting_room' => [
                'required',
                'string',
                Rule::unique('bookings')->where(function ($query) use ($request) {
                    return $query->where('booking_date', $request->booking_date)
                        ->where('booking_time', $request->booking_time)
                        ->where('end_time', $request->end_time);
                }),
            ],
        ], [
            'meeting_room.unique' => 'Bilik ini telah penuh pada tarikh dan masa ini. Sila cari tarikh dan masa lain.',

        ]);

        $data = $request->except('_token');

        Booking::create($data);
        return redirect()->route('meeting.rooms')->with('success', 'Tempahan berjaya dibuat.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('/bookings/update', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required',
            'meeting_room' => 'required',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',

        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('meeting.rooms')->with('updated', 'Tempahan berjaya diubah.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('meeting.rooms')->with('deleted', 'Tempahan berjaya dibuang.');
    }
}
