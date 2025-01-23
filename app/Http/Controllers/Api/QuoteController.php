<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get quotes
        $quotes = Quote::latest()->get();

        // Prepare response data
        $preparedData = [];
        foreach($quotes as $quote) {
            $preparedData[] = [
                'id' => $quote->id,
                'quote' => $quote->quote,
                'author' => $quote->author,
                'savedBy' => $quote->user->name,
                'savedAt' => $quote->created_at->format('d.m.Y H:i')
            ];
        }

        // Respond
        return response()->json([
            'status' => 'ok',
            'quotes' => $preparedData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO Remove this later, it's only for testing
        sleep(2);

        // Validate
        $fields = $request->validate([
            'author' => 'required',
            'quote' => 'required',
        ]);

        // Save
        Auth::user()->quotes()->create($fields);

        // Respond
        return response()->json([
            'status' => 'ok'
        ]);
    }

    /**
     * Display the specified resource.
     */
    /* public function show(Quote $quote)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     */
    /* public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    /* public function destroy(Quote $quote)
    {
        //
    } */
}
