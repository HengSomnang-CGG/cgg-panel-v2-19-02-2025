<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Search;
use Illuminate\Http\Request;

class SearchBlogController extends Controller
{
    public function AllSearches()
    {
        $searches = Search::all();
        return response()->json($searches);
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // Validate the input keyword
        if (!$keyword) {
            return response()->json([
                'message' => 'No search keyword provided.'
            ], 400);
        }

        // Correct spelling and preprocess keyword
        $correctedKeyword = $this->correctSpelling($keyword);
        $searchTokens = $this->normalizeAndTokenize($correctedKeyword);

        // Check for date-like patterns
        $dateFilters = $this->extractDateFilters($correctedKeyword);

        // Fetch records and filter
        $allRecords = Search::get();
        $results = $allRecords->filter(function ($record) use ($searchTokens, $dateFilters) {
            $recordTokens = $this->normalizeAndTokenize($record->keyword);

            // Match keyword tokens
            foreach ($searchTokens as $searchToken) {
                foreach ($recordTokens as $recordToken) {
                    if (
                        stripos($recordToken, $searchToken) !== false || // Partial match
                        soundex($recordToken) === soundex($searchToken) || // Phonetic match
                        $this->isFuzzyMatch($recordToken, $searchToken) // Custom fuzzy match
                    ) {
                        return true;
                    }
                }
            }

            // Match date filters
            if (!empty($dateFilters)) {
                foreach ($dateFilters as $dateFilter) {
                    if (stripos($record->keyword, $dateFilter) !== false) {
                        return true;
                    }
                }
            }

            return false;
        });

        return response()->json([
            'keyword' => $correctedKeyword,
            'results' => $results->values()
        ]);
    }

    private function normalizeAndTokenize($text)
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9\s\-]/', '', $text); // Allow alphanumeric and hyphens
        return explode(' ', $text);
    }

    private function isFuzzyMatch($string1, $string2)
    {
        $distance = levenshtein($string1, $string2);
        $length = max(strlen($string1), strlen($string2));

        return ($length > 4 && $distance / $length <= 0.3) || $distance <= 2;
    }

    private function correctSpelling($keyword)
    {
        $dictionary = ['next js', 'laravel', 'vuejs', 'react', 'nuxt js']; // Add relevant terms
        $keyword = strtolower($keyword);

        $bestMatch = $keyword;
        $shortestDistance = PHP_INT_MAX;

        foreach ($dictionary as $word) {
            $distance = levenshtein($keyword, $word);
            if ($distance < $shortestDistance) {
                $shortestDistance = $distance;
                $bestMatch = $word;
            }
        }

        return $shortestDistance <= 2 ? $bestMatch : $keyword;
    }

    private function extractDateFilters($text)
    {
        // Match common date patterns (e.g., yyyy, mm-yyyy, mm/dd/yyyy, mm-dd-yyyy, etc.)
        preg_match_all('/\b(\d{4}|\d{1,2}[-\/]\d{4}|\d{1,2}[-\/]\d{1,2}[-\/]\d{4})\b/', $text, $matches);
        return $matches[0]; // Return all matched date patterns
    }

    // public function imageScrollPage(Request $request)
    // {
    //     $page = $request->input('page', 1);
    //     $perPage = $request->input('perPage', 10);
    //     $keyword = $request->input('keyword', '');

    //     $query = Search::query();

    //     if (!empty($keyword)) {
    //         $correctedKeyword = $this->correctSpelling($keyword);
    //         $searchTokens = $this->normalizeAndTokenize($correctedKeyword);
    //         $dateFilters = $this->extractDateFilters($correctedKeyword);

    //         $query = $query->get()->filter(function ($record) use ($searchTokens, $dateFilters) {
    //             $recordTokens = $this->normalizeAndTokenize($record->keyword);

    //             // Match keyword tokens
    //             foreach ($searchTokens as $searchToken) {
    //                 foreach ($recordTokens as $recordToken) {
    //                     if (
    //                         stripos($recordToken, $searchToken) !== false || // Partial match
    //                         soundex($recordToken) === soundex($searchToken) || // Phonetic match
    //                         $this->isFuzzyMatch($recordToken, $searchToken) // Custom fuzzy match
    //                     ) {
    //                         return true;
    //                     }
    //                 }
    //             }

    //             // Match date filters
    //             if (!empty($dateFilters)) {
    //                 foreach ($dateFilters as $dateFilter) {
    //                     if (stripos($record->keyword, $dateFilter) !== false) {
    //                         return true;
    //                     }
    //                 }
    //             }

    //             return false;
    //         });

    //         $data = $query->forPage($page, $perPage)->values();
    //     } else {
    //         $data = $query->paginate($perPage, ['*'], 'page', $page);
    //     }

    //     return response()->json($data);
    // }
}
