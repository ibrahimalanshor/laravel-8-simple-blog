<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site;

class SettingController extends Controller
{
	public function index()
	{
		return view('admin.setting.index');
	}

	public function update(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'description' => 'required'
		]);

		Site::firstOrFail()->update($request->all());

		return redirect()->back()->with('success', 'Success Update Site');
	}
}
