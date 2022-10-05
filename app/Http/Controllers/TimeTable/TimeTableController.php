<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function index(Request $request)
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
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_timeTable = [
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'entrance_1' => $request->entrance_1,
            'exit_1' => $request->exit_1,
            'entrance_2' => $request->entrance_2,
            'exit_2' => $request->exit_2,
        ];

        if ($request->date == null) {

            $timeTables = TimeTable::paginate(10);

            return view('admin.timetables.index', [
                'timeTables' => $timeTables,                
            ]);
        }                

        $timeTable = new TimeTable($new_timeTable);        
        $timeTable->save();

        $timeTables = TimeTable::paginate(10);

        return view('admin.timetables.index', [
            'timeTables' => $timeTables
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request)
    {
        $timeTable = TimeTable::find($request->id);
        $timeTable->entrance_1 = $request->entrance_1;
        $timeTable->update(); 

         $timeTables = TimeTable::paginate(10);

        return view('admin.timetables.index', [
            'timeTables' => $timeTables
        ]);         
       
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
