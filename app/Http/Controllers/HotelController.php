<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Services\HotelContactService;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends Controller
{
    public function __construct(protected HotelContactService $hotelContact)
    {}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::with('hotelContacts')->get();

        return response()->json($hotels, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HotelRequest  $request
     */
    public function store(HotelRequest $request)
    {
        //TODO: Create service to store hotel.
        //TODO: Add try catch error handling.
        //TODO: Add unit test for hotel contacts.

        $hotel = new Hotel;
        $hotel->user_id = auth()->user()->id;
        $hotel->name = $request->name;
        $hotel->total_rooms = $request->total_rooms;
        $hotel->available_rooms = $request->available_rooms;
        $hotel->country_id = $request->country_id;
        $hotel->state_id = $request->state_id;
        $hotel->city_id = $request->city_id;
        $hotel->location = $request->location;
        $hotel->postcode = $request->postcode;
        $hotel->save();

        foreach ($request->contacts as $contact) {
            $this->hotelContact->store([
                'hotel_id' => $hotel->id,
                'email' => $contact['email'],
                'phone' => $contact['phone']
            ]);
        }

        return response()->json([
            'message' => 'Hotel created successfully!',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\HotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
