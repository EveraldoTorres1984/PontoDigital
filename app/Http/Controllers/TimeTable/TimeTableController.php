<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use Carbon\Carbon;

class TimeTableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeTables = TimeTable::paginate(10);

        return view('admin.timetables.index', [
            'timeTables' => $timeTables
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrance_1 = Carbon::now();
        echo $entrance_1->toDateTimeString();
        return view('admin.timetables.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'entrance_1',
            'exit_2',
            'entrance_2',
            'exit_2'
        ]);

        $timeTable = new TimeTable;
        $timeTable->entrance_1 = $data['entrance_1'];
        $timeTable->exit_1 = $data['exit_1'];
        $timeTable->entrance_2 = $data['entrance_2'];
        $timeTable->exit_2 = $data['exit_2'];
        $timeTable->save();

        return redirect()->route('timetables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
