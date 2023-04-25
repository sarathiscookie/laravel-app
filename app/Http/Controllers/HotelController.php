<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Services\HotelContactService;
use App\Services\HotelService;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends Controller
{
    public function __construct(protected HotelContactService $hotelContactService, protected HotelService $hotelService)
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
     * Store a newly created resource in hotel and hotel contacts storage.
     *
     * @param  \App\Http\Requests\HotelRequest  $request
     */
    public function store(HotelRequest $request)
    {
        $hotel = $this->hotelService->store([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'total_rooms' => $request->total_rooms,
            'available_rooms' => $request->available_rooms,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'location' => $request->location,
            'postcode' => $request->postcode
        ]);

        if ($request->contacts) {
            foreach ($request->contacts as $contact) {
                $this->hotelContactService->store([
                    'hotel_id' => $hotel->id,
                    'email' => $contact['email'],
                    'phone' => $contact['phone']
                ]);
            }
        }

        return response()->json([
            'message' => 'Hotel created successfully!',
            'hotel' => $hotel
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
        $hotel->fill($request->post())->save();

        return response()->json([
            'message' => 'Hotel updated successfully',
            'hotel' => $hotel
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json([
            'message' => 'Hotel deleted successfully!'
        ], Response::HTTP_NO_CONTENT);
    }
}
