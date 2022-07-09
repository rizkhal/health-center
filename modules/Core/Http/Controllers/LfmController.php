<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class LfmController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $file = $request->file('file');
            $path = "photos/shares";

            $uploadedFile = Storage::disk('public')->put($path, $file);

            return response()->json([
                'file' => $uploadedFile
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed when uploading image'
            ]);
        }
    }
}
