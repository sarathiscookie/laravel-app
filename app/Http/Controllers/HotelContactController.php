<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\HotelContactService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HotelContactController extends Controller
{
    public function __construct(protected HotelContactService $hotelContactService)
    {}

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function index(Hotel $hotel)
    {
        $hotelContacts = $hotel->hotelContacts;

        return response()->json($hotelContacts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function store(Request $request, Hotel $hotel)
    {
        $hotelContacts = $hotel->hotelContacts()->create($request->all());

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
     * @param int  $id
     */
    public function update(Request $request, $id)
    {
        $hotelContact = $this->hotelContactService->find($id);

        $hotelContact->update([
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return response()->json([
            'message' => 'Contacts updated successfully',
            'hotelContact' => $hotelContact
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->hotelContactService->delete($id);

        return response()->json([
            'message' => 'Contacts deleted successfully!'
        ], Response::HTTP_NO_CONTENT);
    }
}
