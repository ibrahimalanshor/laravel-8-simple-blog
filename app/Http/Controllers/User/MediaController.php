<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;

use Auth;

class MediaController extends Controller
{
    // Get User Data
    public function user()
    {
        return Auth::user();
    }

    // Get User ID
    public function id()
    {
        return Auth::id();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = $this->user()->file()->orderBy('id', 'desc')->paginate(8);
        return view('user.media.index', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $file = $request->file;
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $fileName.'_'.time().'.'.$file->getClientOriginalExtension();

        Storage::putFileAs('public/images', $file, $fileName);

        Media::create([
            'user_id' => $this->id(),
            'file' => $fileName
        ]);

        return redirect('user/media')->with('success', 'Success Upload File');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = $this->user()->file()->findOrFail($id);
        $file->delete();

        return redirect('user/media')->with('success', 'Success Delete File');
    }

    // Save Image From CKEditor
    public function save(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->upload;
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName.'_'.time().'.'.$file->getClientOriginalExtension();

            Storage::putFileAs('public/images', $file, $fileName);

            Media::create([
                'user_id' => $this->id(),
                'file' => $fileName
            ]);
            
            $ckeditor = $request->CKEditorFuncNum;
            $url = asset('storage/images/'.$fileName);
            $msg = 'Image uploaded successfully';

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');

            return $response;
        } else {
            abort(404);
        }
    }
}
