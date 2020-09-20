<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth;

class ProfileController extends Controller
{
	public function index()
	{
		$profile = Auth::user()->profile;
		return view('user.profile.index', ['profile' => $profile]);
	}

	public function update(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'birthday' => 'required|date',
			'gender' => 'required',
			'address' => 'required|string|max:255',
			'bio' => 'required|string',
			'file' => 'image'
		]);

		$data = [];

		if ($request->hasFile('file')) {
			$file = $request->file;

			$fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$fileName = $fileName.'_'.time().'.'.$file->getClientOriginalExtension();

			Storage::putFileAs('public/images', $file, $fileName);

			$data['photo'] = $fileName;
		}

		$request->merge($data);

		$user = Auth::user();
		$user->profile()->update($request->except('name', '_token', '_method', 'file'));
		$user->update($request->only('name'));

		return redirect()->back()->with('success', 'Success Update Profile');
	}
}
