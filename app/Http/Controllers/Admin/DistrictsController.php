<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Regions;
use Redirect;
use Schema;
use App\Districts;
use App\Http\Requests\CreateDistrictsRequest;
use App\Http\Requests\UpdateDistrictsRequest;
use Illuminate\Http\Request;


class DistrictsController extends Controller
{

    /**
     * Display a listing of districts
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $districts = Districts::all();

        return view('admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new districts
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $regions = Regions::pluck('name', 'id');

        return view('admin.districts.create', compact('regions'));
    }

    /**
     * Store a newly created districts in storage.
     *
     * @param CreateDistrictsRequest|Request $request
     */
    public function store(CreateDistrictsRequest $request)
    {
        $district =new Districts();
        $district->name = $request['name'];
        $region = $request['region_id'];
        $district->region_id = $region->id;
        $district->save();



        return redirect()->route(config('quickadmin.route') . '.districts.index');
    }

    /**
     * Show the form for editing the specified districts.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $districts = Districts::find($id);


        return view('admin.districts.edit', compact('districts'));
    }

    /**
     * Update the specified districts in storage.
     * @param UpdateDistrictsRequest|Request $request
     *
     * @param  int $id
     */
    public function update($id, UpdateDistrictsRequest $request)
    {
        $districts = Districts::findOrFail($id);
        $districts->name = $request['name'];
        $region = $request['region_id'];
        $districts->region_id = $region->id;

        $districts->update();

        return redirect()->route(config('quickadmin.route') . '.districts.index');
    }

    /**
     * Remove the specified districts from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        Districts::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.districts.index');
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
            Districts::destroy($toDelete);
        } else {
            Districts::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route') . '.districts.index');
    }

    public function makeList(Request $request)
    {
        $region = Regions::find($request['region']);
        $districts = $region->districts;
        return response(json_encode($districts));

    }

    public function addNewDistrict(Request $request)
    {
        $district = new Districts();
        $district->name = $request['district'];

        $region = $request['region'];

        $district->regions_id = $region;

        $district->region($region);

        $district->save();
    }

}
