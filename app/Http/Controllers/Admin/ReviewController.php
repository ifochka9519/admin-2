<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Review;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ReviewController extends Controller {

	/**
	 * Display a listing of review
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $review = Review::all();

		return view('admin.review.index', compact('review'));
	}

	/**
	 * Show the form for creating a new review
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.review.create');
	}

	/**
	 * Store a newly created review in storage.
	 *
     * @param CreateReviewRequest|Request $request
	 */
	public function store(CreateReviewRequest $request)
	{
	    $request = $this->saveFiles($request);
		Review::create($request->all());

		return redirect()->route(config('quickadmin.route').'.review.index');
	}

	/**
	 * Show the form for editing the specified review.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$review = Review::find($id);
	    
	    
		return view('admin.review.edit', compact('review'));
	}

	/**
	 * Update the specified review in storage.
     * @param UpdateReviewRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateReviewRequest $request)
	{
		$review = Review::findOrFail($id);

        $request = $this->saveFiles($request);

		$review->update($request->all());

		return redirect()->route(config('quickadmin.route').'.review.index');
	}

	/**
	 * Remove the specified review from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Review::destroy($id);

		return redirect()->route(config('quickadmin.route').'.review.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Review::destroy($toDelete);
        } else {
            Review::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.review.index');
    }

}
