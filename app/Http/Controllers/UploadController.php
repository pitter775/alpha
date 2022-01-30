<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
    // public function store(StoreProjectRequest $request)
    // {
    //     $project = Project::create($request->all());

    //     foreach ($request->input('document', []) as $file) {
    //         $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
    //     }

    //     return redirect()->route('projects.index');
    // }
}
