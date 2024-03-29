<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\LoadOrder;

class ComparisonController extends Controller
{
	public function index(): View
	{

		$loadOrders = LoadOrder::whereIsPrivate(false)->with('author:id,name,is_verified')->orderBy('created_at', 'desc')->get();

		return view('compare')->with('loadOrders', $loadOrders);
	}

	public function post(Request $request): RedirectResponse
	{

		$request->validate([
			'list1' => 'required',
			'list2' => 'required',
		]);

		return redirect("/compare/" . $request['list1'] . "/" . $request['list2']);
	}

	public function results($list1, $list2)
	{
		$list1 = LoadOrder::where('slug', $list1)->first();
		$list2 = LoadOrder::where('slug', $list2)->first();

		$results = $this->compareLists($list1, $list2);

		return view('compare-results')->with('results', $results)->with('list1', $list1)->with('list2', $list2);
	}

	private function compareLists($list1, $list2)
	{
		$results = [
			'files' => [],
			'contents' => []
		];

		$list1Files = $list1->files;
		$list2Files = $list2->files;

		$list1FilesCleanName = [];
		$list2FilesCleanName = [];



		foreach ($list1Files as $list1File) {
			$file1 = explode('-', strtolower($list1File->name));
			array_push($list1FilesCleanName, $file1[1]);
		}

		foreach ($list2Files as $list2File) {
			$file2 = explode('-', strtolower($list2File->name));
			array_push($list2FilesCleanName, $file2[1]);
		}

		$missingFiles = array_diff($list2FilesCleanName, $list1FilesCleanName);
		$addedFiles = array_diff($list1FilesCleanName, $list2FilesCleanName);

		array_push($results['files'], ['missing' => $missingFiles, 'added' => $addedFiles]);

		foreach ($list1Files as $list1File) {
			$file1 = explode('-', strtolower($list1File->name));

			foreach ($list2Files as $list2File) {
				$file2 = explode('-', strtolower($list2File->name));
				// We're working with the same file name
				if ($file1[1] == $file2[1]) {

					// Check that the hashes aren't the same, else the file is the same
					if ($file1[0] != $file2[0]) {
						$diff = $this->compareFiles(strtolower($list1File->name), strtolower($list2File->name));

						array_push($results['contents'], ['filename' => $file1[1], 'missing' => $diff['missing'], 'added' => $diff['added'], 'class' => 'bg-danger']);
					} else {
						array_push($results['contents'], ['filename' => $file1[1], 'missing' => [], 'added' => [], 'class' => 'bg-success']);
					}
				}
			}
		}

		// dd($results, $list1FilesCleanName, $list2FilesCleanName, $missingFiles, $addedFiles);
		return $results;
	}

	private function compareFiles($file1, $file2)
	{
		$file1 = array_map('trim', explode("\n", trim(str_replace('*', '', \Storage::get('uploads/' . strtolower($file1))))));
		$file2 = array_map('trim', explode("\n", trim(str_replace('*', '', \Storage::get('uploads/' . strtolower($file2))))));

		$missing = array_diff($file2, $file1);
		$added = array_diff($file1, $file2);



		return ['missing' => $missing, 'added' => $added];
	}
}
