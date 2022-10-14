<?php

namespace App\Http\Controllers\TimeTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\Facades\Validator;

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
        $data = $request->only([
            'date',
        ]);

        $validator = Validator::make($data, [
            'date' => ['required', 'unique:time_tables']
        ]);

        if ($validator->fails()) {
            return redirect()->route('timetables.index')
                ->withErrors($validator);
        }

        $timeTable = new TimeTable();
        $timeTable->user_id = Auth::user()->id;
        $timeTable->date = $request->date;
        $timeTable->save();

        TimeTable::paginate(10);

        return redirect()->route('timetables.index')
            ->with('success', "Data adicionada!");
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
    public function entrance_1($id)
    {
        $entrance_1 = TimeTable::findOrFail($id);
        $entrance_1->entrance_1 = Carbon::now()->format("H:i");
        $entrance_1->save();

        return redirect()->route('timetables.index')
            ->with('success', "Entrada registrada");       
    }

    public function exit_1($id){
        $exit_1 = TimeTable::findOrFail($id);
        $exit_1->exit_1 = Carbon::now()->format("H:i");        
        $exit_1->save();

        return redirect()->route('timetables.index')
            ->with('success', "Saída registrada");
    }

    public function entrance_2($id){
        $entrance_2 = TimeTable::findOrFail($id);
        $entrance_2->entrance_2 = Carbon::now()->format("H:i");        
        $entrance_2->save();

        return redirect()->route('timetables.index')
            ->with('success', "Volta do Almoço Registrada");
    }

    public function exit_2($id){
        $exit_2 = TimeTable::findOrFail($id);
        $exit_2->exit_2 = Carbon::now()->format("H:i");        
        $exit_2->save();

        return redirect()->route('timetables.index')
            ->with('success', "Fim do expediente registrado");
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
