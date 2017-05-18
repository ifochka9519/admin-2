<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Job;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class JobController extends Controller {

	/**
	 * Display a listing of job
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $job = Job::all();

		return view('admin.job.index', compact('job'));
	}

    public function viewAll()
    {
        $jobs = Job::all();
        return view('work_page', compact('jobs'));
	}

	/**
	 * Show the form for creating a new job
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.job.create');
	}

	/**
	 * Store a newly created job in storage.
	 *
     * @param CreateJobRequest|Request $request
	 */
	public function store(CreateJobRequest $request)
	{
	    $job = new Job();
	    $job->title = $request['title'];
	    $job->money = $request['money'];
	    $job->description = $request['description'];
        if ($request->file('image') != null) {


            $imageName = str_random(30) . '.' .
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/img/work_page/', $imageName
            );

            $job->way = '/img/work_page/' . $imageName;

        }


        $job->save();

		return redirect()->route(config('quickadmin.route').'.job.index');
	}

	/**
	 * Show the form for editing the specified job.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$job = Job::find($id);
	    
	    
		return view('admin.job.edit', compact('job'));
	}

	/**
	 * Update the specified job in storage.
     * @param UpdateJobRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateJobRequest $request)
	{
		$job = Job::findOrFail($id);

        $request = $this->saveFiles($request);

		$job->update($request->all());

		return redirect()->route(config('quickadmin.route').'.job.index');
	}

	/**
	 * Remove the specified job from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Job::destroy($id);

		return redirect()->route(config('quickadmin.route').'.job.index');
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
            Job::destroy($toDelete);
        } else {
            Job::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.job.index');
    }

}
