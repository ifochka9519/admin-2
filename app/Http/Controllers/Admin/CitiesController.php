<?php

namespace App\Http\Controllers\Admin;

use App\Districts;
use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Cities;
use App\Http\Requests\CreateCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;
use Illuminate\Http\Request;


class CitiesController extends Controller
{

    /**
     * Display a listing of cities
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cities = Cities::all();

        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new cities
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $districts = Districts::pluck('name', 'id');
        return view('admin.cities.create', compact('districts'));
    }

    /**
     * Store a newly created cities in storage.
     *
     * @param CreateCitiesRequest|Request $request
     */
    public function store(CreateCitiesRequest $request)
    {
        $city = new Cities();
        $city->name = $request['name'];
        $city->districts_id = $request['districts_id'];

        $district = Districts::find($request['districts_id']);

        $city->district($district);
        $city->save();


        return redirect()->route(config('quickadmin.route') . '.cities.index');
    }

    /**
     * Show the form for editing the specified cities.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cities = Cities::find($id);


        return view('admin.cities.edit', compact('cities'));
    }

    /**
     * Update the specified cities in storage.
     * @param UpdateCitiesRequest|Request $request
     *
     * @param  int $id
     */
    public function update($id, UpdateCitiesRequest $request)
    {
        $cities = Cities::findOrFail($id);


        $cities->update($request->all());

        return redirect()->route(config('quickadmin.route') . '.cities.index');
    }

    /**
     * Remove the specified cities from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        Cities::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.cities.index');
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
            Cities::destroy($toDelete);
        } else {
            Cities::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route') . '.cities.index');
    }


    public function makeList(Request $request)
    {
        $district = Districts::where('name', $request['district'])->get();
        $cities = $district[0]->cities;
        return response(json_encode($cities));

    }


    public function addNewCity(Request $request)
    {
        $city = new Cities();
        $city->name = $request['city'];

        $district = Districts::where('name', $request['district'])->get();
        $district_id = $district[0]->id;

        $city->districts_id = $district_id;

        $city->district($district_id);

        $city->save();
    }
}
