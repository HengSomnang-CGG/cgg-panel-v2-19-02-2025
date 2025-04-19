<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DomainController extends Controller
{
    // use as api
    public function index()
    {
        $domain = Domain::all();
        return response()->json($domain);
    }

    // display domain page
    public function page()
    {
        return view('dashboard.domain');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Domain::query();
            return DataTables::of($data)->make(true);
        }
    }

    public function show($id)
    {
        $domain = Domain::find($id);

        if (!$domain) {
            return response()->json(['error' => 'Domain not found'], 404);
        }
        return response()->json($domain);
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain'=>'required',
        ]);
        $data = $request->all();
        Domain::create($data);
        return response()->json(['message' => 'Domain created successfully'], 201);
    }
    public function update(Request $request, $id)
    {
        $domain = Domain::find($id);

        if (!$domain) {
            return response()->json(['error' => 'Domain not found'], 404);
        }

        $request->validate([
            'domain'=>'required',
        ]);

        $data = $request->all();
        $domain->fill($data)->save();
        return response()->json(['message' => 'Domain updated successfully']);
    }
}
