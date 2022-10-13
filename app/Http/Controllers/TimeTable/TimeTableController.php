<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;

use function PHPSTORM_META\type;
use function Termwind\style;

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
            'timeTables' => $timeTables,
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

        if ($request->date == null) {

            TimeTable::paginate(10);

            return redirect()->route('timetables.index')
                ->with('error', "Selecione a data desejada");
        }

        if ($request->date === $request->date) {
            return redirect()->route('timetables.index')
                ->with('error', "Data já existente!");
        }

        if ($request->date) {

            $timeTable = new TimeTable();
            $timeTable->user_id = Auth::user()->id;
            $timeTable->date = $request->date;
            $timeTable->save();

            TimeTable::paginate(10);

            return redirect()->route('timetables.index')
                ->with('success', "Data adicionada!");
        }
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
     *$timeTable->date = $request->date;
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $entrance_1 = TimeTable::findOrFail($id);
        $entrance_1->entrance_1 = Carbon::now()->format("H:i");
        $entrance_1->save();

        return redirect()->route('timetables.index')
            ->with('success', "Entrada adicionada!");
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
