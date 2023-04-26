<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelContact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HotelContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function index(Hotel $hotel)
    {
        $hotelContacts = HotelContact::where(['hotel_id' => $hotel->id])->get();

        return response()->json($hotelContacts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function store(Request $request, Hotel $hotel)
    {
        $request['hotel_id'] = $hotel->id;

        $hotelContacts = HotelContact::create($request->all());

        return response()->json([
            'message' => 'Contacts created successfully!',
            'hotelContacts' => $hotelContacts
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
     * @param  \App\Models\HotelContact  $hotelContact
     */
    public function update(Request $request, HotelContact $hotelContact)
    {
        $hotelContact->fill($request->post())->save();

        return response()->json([
            'message' => 'Contacts updated successfully',
            'hotelContact' => $hotelContact
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelContact  $hotelContact
     */
    public function destroy(HotelContact $hotelContact)
    {
        $hotelContact->delete();

        return response()->json([
            'message' => 'Contacts deleted successfully!'
        ], Response::HTTP_NO_CONTENT);
    }
}
