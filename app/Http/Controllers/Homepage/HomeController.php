<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise\Create;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function privacy()
    {
        return view('homepage.privacy');
    }

    public function notice()
    {
        return view('homepage.notice');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $page = (int) $request->input('page', 1);
        $resultsPerPage = 10;
        $promises = [];

        // Local DB fetch in a Promise with randomization
        $promises['local'] = Create::promiseFor(
            Search::where('website_name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('domain', 'LIKE', '%' . $keyword . '%')
                ->inRandomOrder() // Randomize the results
                ->paginate($resultsPerPage, ['*'], 'page', $page)
        );

        // Wait for both in parallel
        $responses = Utils::all($promises)->wait();

        // Extract local results
        $localResults = $responses['local'];

        // Check if no results are found
        if ($localResults->isEmpty()) {
            $localResults = Search::inRandomOrder() // Randomize fallback results
                ->paginate($resultsPerPage, ['*'], 'page', $page);
        }

        $totalResults = $localResults->total();

        return view('homepage.search', [
            'keyword' => $keyword,
            'localResults' => $localResults,
            'totalResults' => $totalResults,
            'currentPage' => $page,
            'resultsPerPage' => $resultsPerPage,
        ]);
    }
}
