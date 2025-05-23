<?php

namespace App\Http\Controllers;

use App\Exports\SearchExport;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SearchController extends Controller
{
    public function index()
    {
        return view('dashboard.datatable');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Search::query();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '
                   <a href="#" class="mx-3 edit-btn" data-bs-toggle="tooltip" data-bs-original-title="Edit Search" data-id="' . $row->id . '">
                    <i class="fas fa-user-edit text-secondary"></i>
                </a>
                <a href="#" class="delete-btn" data-bs-toggle="tooltip" data-bs-original-title="Delete" data-id="' . $row->id . '">
                    <i class="fas fa-trash text-danger"></i>
                </a>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show($id)
    {
        $search = Search::find($id);

        if (!$search) {
            return response()->json(['error' => 'Search not found'], 404);
        }

        return response()->json($search);
    }


    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required',
            'date' => 'required|date',
            'keyword' => 'required',
            'title' => 'required|max:255',
            'website_name' => 'required',
            'description' => 'required',
            'image_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();
        if ($request->hasFile('image_icon')) {
            $file = $request->file('image_icon');
            $uniqueName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads', $uniqueName, 'ftp');
            $data['image_icon'] = 'https://cdn.it-cg.group/xerum/uploads/' . $uniqueName;
        }

        Search::create(
            $data
        );
        return response()->json(['success' => 'Search added successfully!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'domain' => 'required',
            'date' => 'required|date',
            'keyword' => 'required',
            'title' => 'required|max:255',
            'website_name' => 'required',
            'description' => 'required',
            'image_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $search = Search::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image_icon')) {

            $file = $request->file('image_icon');
            $uniqueName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads', $uniqueName, 'ftp');
            $data['image_icon'] = 'https://cdn.it-cg.group/xerum/uploads/' . $uniqueName;
        }
        $search->update($data);

        return response()->json(['success' => 'Search updated successfully!']);
    }

    public function destroy($id)
    {
        $search = Search::findOrFail($id);

        // Delete the image_icon file from FTP if it exists
        if ($search->image_icon) {
            $filename = basename($search->image_icon);
            Storage::disk('ftp')->delete('uploads/' . $filename);
        }

        $search->delete();

        return response()->json(['success' => 'Search deleted successfully!']);
    }


    public function export()
    {
        return Excel::download(new SearchExport, 'searches.xlsx');
    }
}
