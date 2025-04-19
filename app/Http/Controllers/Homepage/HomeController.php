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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $page = (int) $request->input('page', 1);
        $resultsPerPage = 10;

        $client = new Client();
        $promises = [];

        if ($keyword) {
            // Cache key
            $cacheKey = "google_search_{$keyword}_page_{$page}";

            // Check if cached response exists
            if (Cache::has($cacheKey)) {
                $cached = Cache::get($cacheKey);
                $promises['google'] = Create::promiseFor(new Response(200, [], $cached));
            } else {
                // Async Google API call
                $promises['google'] = $client->getAsync('https://www.searchapi.io/api/v1/search', [
                    'query' => [
                        'api_key' => env('SEARCH_API_KEY'),
                        'engine' => 'google',
                        'q' => $keyword,
                        'page' => $page,
                        'num' => 10,
                    ],
                    'verify' => false,
                ]);
            }
        }

        // Local DB fetch in a Promise
        $promises['local'] = Create::promiseFor(
            Search::where('keyword', 'LIKE', '%' . $keyword . '%')->paginate($resultsPerPage, ['*'], 'page', $page)
        );

        // Wait for both in parallel
        $responses = Utils::all($promises)->wait();

        // Extract local results
        $localResults = $responses['local'];
        $googleResults = [];
        $googleTotal = 0;

        if (isset($responses['google']) && $responses['google']->getStatusCode() === 200) {
            $googleBody = $responses['google']->getBody()->getContents();
            Cache::put($cacheKey, $googleBody, now()->addMinutes(30));

            $data = json_decode($googleBody, true);
            $googleResults = $data['organic_results'] ?? [];
            $googleTotal = $data['search_information']['total_results'] ?? 0;
        }

        $totalResults = $localResults->total() + $googleTotal;

        return view('homepage.search', [
            'keyword' => $keyword,
            'localResults' => $localResults,
            'googleResults' => $googleResults,
            'totalResults' => $totalResults,
            'currentPage' => $page,
            'resultsPerPage' => $resultsPerPage,
        ]);
    }
}
