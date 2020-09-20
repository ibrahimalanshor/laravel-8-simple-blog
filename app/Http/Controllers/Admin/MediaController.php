<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Media::orderBy('id', 'desc')->paginate(8);
        return view('admin.media.index', ['files' => $files]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Media::findOrFail($id);
        $file->delete();

        return redirect('admin/media')->with('success', 'Success Delete File');
    }

}
