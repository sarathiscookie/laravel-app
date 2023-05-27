<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\Hotel;
use App\Services\RoomTypeService;
use Symfony\Component\HttpFoundation\Response;

class RoomTypeController extends Controller
{
    public function __construct(protected RoomTypeService $roomTypeService)
    {}

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Hotel  $hotel
     */
    public function index(Hotel $hotel)
    {
        $roomTypes = $hotel->roomTypes;

        return response()->json($roomTypes, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomTypeRequest $request, Hotel $hotel)
    {
        $roomType = $hotel->roomTypes()->create($request->all());

        return response()->json([
            'message' => 'Room type created successfully!',
            'roomType' => $roomType
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomTypeRequest $request, string $id)
    {
        $roomType = $this->roomTypeService->find($id);

        $roomType->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Room type updated successfully',
            'roomType' => $roomType
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roomTypeService->delete($id);

        return response()->json([
            'message' => 'Room type deleted successfully!'
        ], Response::HTTP_NO_CONTENT);
    }
}
