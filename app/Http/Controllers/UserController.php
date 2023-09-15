<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
	{
		return view('user.profile');
	}

	public function api_tokens(Request $request)
	{
		$request->validate([
			'token_name' => 'required'
		]);

		$abilities = [];

		if ($request->create) {
			array_push($abilities, 'create');
		}

		if ($request->read) {
			array_push($abilities, 'read');
		}

		if ($request->update) {
			array_push($abilities, 'update');
		}

		if ($request->delete) {
			array_push($abilities, 'delete');
		}

		$token = $request->user()->createToken($request->token_name, $abilities);

		flash("Token created. Copy this to a secure location as it will not be shown again: <code>" . $token->plainTextToken . "</code>")->success()->important();
		return back();
	}

	public function delete_api_token($tokenId)
	{
		auth()->user()->tokens()->where('id', $tokenId)->delete();
		return back();
	}

	public function destroy()
	{
		$name = auth()->user()->name;
		try {
			flash('Account <b>' . $name . '</b> and all its lists successfully deleted!')->success()->important();
			auth()->user()->delete();
			return redirect('/');
		} catch (\Throwable $th) {
			flash('Something went wrong with account deletion. Please <a href="https://github.com/phinocio/loadorderlibrary/issues/new">make a Github issue</a> and let Phin know.')->error()->important();
			return redirect()->back();
		}
	}
}
