<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;

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

        $localResults = Search::where('keyword', 'LIKE', '%' . $keyword . '%')->paginate($resultsPerPage, ['*'], 'page', $page);

        $googleResults = [];
        $googleTotal = 0;

        if ($keyword) {
            $client = new Client();
            $promises = [
                'google' => $client->getAsync('https://www.searchapi.io/api/v1/search', [
                    'query' => [
                        'api_key' => env('SEARCH_API_KEY'),
                        'engine' => 'google',
                        'q' => $keyword,
                        'page' => $page,
                    ],
                    'verify' => false,
                ]),
            ];

            // Use Utils::all() to handle multiple requests
            $responses = Utils::all($promises)->wait();

            if ($responses['google']->getStatusCode() === 200) {
                $data = json_decode($responses['google']->getBody()->getContents(), true);
                $googleResults = $data['organic_results'] ?? [];
                $googleTotal = $data['search_information']['total_results'] ?? 0;
            }
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
