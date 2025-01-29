<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Plugins\RandomQuote;
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
        $quotes = Quote::latest()->paginate(4);

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
            'quotes' => $preparedData,
            'totalPages' => $quotes->lastPage(),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function my()
    {
        // Get quotes
        $quotes = Auth::user()->quotes()->latest()->paginate(4);

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
            'quotes' => $preparedData,
            'totalPages' => $quotes->lastPage(),
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

    /**
     * Get random quote
     */
    public function random(Request $request, RandomQuote $randomQuote)
    {
        // TODO Remove this later, it's only for testing
        sleep(2);

        return response()->json([
            'status' => 'ok',
            'data' => $randomQuote->get($request->query('source')),
        ]);
    }
}
