<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use App\Plugins\RandomQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get quotes
        $quotes = Quote::with('user')->latest()->paginate(4);

        // Respond
        return response()->json([
            'status' => 'ok',
            'quotes' => QuoteResource::collection($quotes),
            'totalPages' => $quotes->lastPage(),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function my()
    {
        // Get quotes
        $quotes = Auth::user()->quotes()->with('user')->latest()->paginate(4);

        // Respond
        return response()->json([
            'status' => 'ok',
            'quotes' => QuoteResource::collection($quotes),
            'totalPages' => $quotes->lastPage(),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function source(string $source)
    {
        // Get quotes
        $quotes = Quote::where('source', $source)->with('user')->latest()->paginate(4);

        // Respond
        return response()->json([
            'status' => 'ok',
            'quotes' => QuoteResource::collection($quotes),
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
            'text' => 'required',
            'author' => 'required',
            'source' => 'required'
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
    public function destroy(Quote $quote)
    {
        Gate::authorize('delete', $quote);

        $quote->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }

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
