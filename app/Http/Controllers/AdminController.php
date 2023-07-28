<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Models\Backup;
use App\Models\File;
use App\Models\LoadOrder;
use App\Models\User;
use Storage;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware(IsAdmin::class);
	}

	public function stats()
	{
		$userStats = [];
		$listStats = [];
		$fileStats = [];

		$users = User::query()->select(['id', 'is_admin', 'email', 'is_verified', 'created_at'])->with(['lists:id,user_id'])->latest('created_at')->get();
		$lists = LoadOrder::query()->select(['id', 'is_private', 'user_id'])->get();
		$files = File::query()->select(['id', 'size_in_bytes'])->get();
		$filesInLists = File::with('lists:id')->has('lists')->get()->count();
		$orphanedFiles = File::doesntHave('lists')->get()->count();
		$tmpFiles = \Storage::disk('tmp')->allFiles();

		$fileSize = 0;

		foreach ($files as $file) {
			$fileSize += $file->size_in_bytes;
		}

		$tmpSize = 0;

		foreach ($tmpFiles as $file) {
			$tmpSize += \Storage::disk('tmp')->size($file);
		}

		$userStats[] = [
			"name" => "Users",
			"value" => count($users)
		];

		$userStats[] = [
			"name" => "Admins",
			"value" => count($users->filter(function ($value, $key) {
				return $value->is_admin === 1;
			}))
		];

		$userStats[] = [
			"name" => "Verified Authors",
			"value" => count($users->filter(function ($value, $key) {
				return $value->is_verified === 1;
			}))
		];

		$userStats[] = [
			"name" => "Last Registered",
			"value" => \Carbon\Carbon::createFromDate($users[0]->created_at)->diffForHumans()
		];

		$userStats[] = [
			"name" => "Without Email",
			"value" => count($users->filter(function ($value, $key) {
				return $value->email === null;
			}))
		];

		$userStats[] = [
			"name" => "Without List",
			"value" => count($users->filter(function ($value, $key) {
				return count($value->lists) === 0;
			}))
		];

		$listStats[] = [
			"name" => "Lists",
			"value" => count($lists)
		];

		$listStats[] = [
			"name" => "Private Lists",
			"value" => count($lists->filter(function ($value, $key) {
				return $value->is_private === 1;
			}))
		];

		if (count($lists) > 0) {
			$listStats[] = [
				"name" => "Percent Private",
				"value" => number_format(((count($lists->filter(function ($value, $key) {
					return $value->is_private === 1;
				})) / count($lists)) * 100), 2, '.', '') . "%"
			];
		} else {
			$listStats[] = [
				"name" => "Percent Private",
				"value" => "0%"
			];
		}

		$listStats[] = [
			"name" => "Anonymous Lists",
			"value" => count($lists->filter(function ($value, $key) {
				return $value->user_id == null;
			}))
		];

		if (count($lists) > 0) {
			$listStats[] = [
				"name" => "Percent Anonymous",
				"value" => number_format(((count($lists->filter(function ($value, $key) {
					return $value->user_id === null;
				})) / count($lists)) * 100), 2, '.', '') . "%"
			];
		} else {
			$listStats[] = [
				"name" => "Percent Anonymous",
				"value" => "0%"
			];
		}

		$fileStats[] = [
			"name" => "Files",
			"value" => count($files)
		];

		$fileStats[] = [
			"name" => "Files In Lists",
			"value" => $filesInLists
		];

		$fileStats[] = [
			"name" => "Orphaned Files",
			"value" => $orphanedFiles
		];

		$fileStats[] = [
			"name" => "Total File Size",
			"value" => number_format($fileSize / 1000000, 2, '.', '') // Divide by 1 million to get it into MB.
		];

		$fileStats[] = [
			"name" => "Tmp Size",
			"value" => number_format($tmpSize / 1000000, 2, '.', '') // Divide by 1 million to get it into MB.
		];

		return view('admin.stats')->with(['userStats' => $userStats, 'listStats' => $listStats, 'fileStats' => $fileStats]);
	}

	public function users()
	{

		$users = User::select('id', 'name', 'email', 'is_verified', 'created_at')->withCount('lists')->get();
		return view('admin.users')->with(['users' => $users]);
	}

	public function backups()
	{
		$backups = Backup::orderBy('created_at', 'desc')->get();
		return view('admin.backups')->with(['backups' => $backups]);
	}

	public function verify(User $user)
	{
		$user->is_verified = !$user->is_verified;
		$user->save();

		return redirect()->back();
	}

	public function serverStats()
	{
		return \File::get(resource_path('static/report.html'));
	}
}
