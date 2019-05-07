<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyConsumption;
use App\Chemical;

class DailyConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumptions = DailyConsumption::all();
        return view('daily_consumption.index', compact('consumptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chemicals = Chemical::all();
        return view('daily_consumption.create', compact('chemicals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'lot_no' => 'required',
            'color' => 'required',
            'buyer' => 'required',
            'total_yarn' => 'required',
            'yarn_count' => 'required',
            'wp_length' => 'required',
            'yarn_weight' => 'required',
            't_stop_mark' => 'required',
            'dyeing_length' => 'required',
            'indigo' => 'required',
            'hydrose' => 'required',
            's_black' => 'required',
            'caustic' => 'required',
            'sodium' => 'required',
            'acid' => 'required',
            'agent' => 'required',
            'trilon' => 'required',
            'setamol' => 'required',
            'premasol' => 'required',
            'glucose' => 'required',
            'l_black' => 'required',
            'modifide_starch' => 'required',
            'apple_starch' => 'required',
            't_size' => 'required',
            'uni_soft' => 'required',
            'pva' => 'required',
            'wax' => 'required',
            'cms' => 'required',
            'shift_officer' => 'required',
            'shift_oparetor' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'total_shift' => 'required',
            'total_time' => 'required',
            'remark' => 'required'
        ]);

        $chemical = new DailyConsumption;
        $chemical->date = $request->date;
        $chemical->lot_no = $request->lot_no;
        $chemical->color = $request->color;
        $chemical->buyer = $request->buyer;
        $chemical->total_yarn = $request->total_yarn;
        $chemical->yarn_count = $request->yarn_count;
        $chemical->wp_length = $request->wp_length;
        $chemical->yarn_weight = $request->yarn_weight;
        $chemical->t_stop_mark = $request->t_stop_mark;
        $chemical->dyeing_length = $request->dyeing_length;
        $chemical->indigo = $request->indigo;
        $chemical->hydrose = $request->hydrose;
        $chemical->s_black = $request->s_black;
        $chemical->caustic = $request->caustic;
        $chemical->sodium = $request->sodium;
        $chemical->acid = $request->acid;
        $chemical->agent = $request->agent;
        $chemical->trilon = $request->trilon;
        $chemical->setamol = $request->setamol;
        $chemical->premasol = $request->premasol;
        $chemical->glucose = $request->glucose;
        $chemical->l_black = $request->l_black;
        $chemical->modifide_starch = $request->modifide_starch;
        $chemical->apple_starch = $request->apple_starch;
        $chemical->t_size = $request->t_size;
        $chemical->uni_soft = $request->uni_soft;
        $chemical->pva = $request->pva;
        $chemical->wax = $request->wax;
        $chemical->cms = $request->cms;
        $chemical->shift_officer = $request->shift_officer;
        $chemical->shift_oparetor = $request->shift_oparetor;
        $chemical->start_time = $request->start_time;
        $chemical->end_time = $request->end_time;
        $chemical->total_shift = $request->total_shift;
        $chemical->total_time = $request->total_time;
        $chemical->remark = $request->remark;
        $chemical->save();

        return redirect(route('consumption.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumption = DailyConsumption::find($id);
        return view('daily_consumption.show', compact('consumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumption = DailyConsumption::where('id',$id)->first();
        return view('daily_consumption.edit', compact('consumption'));
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
        $this->validate($request,[
            'date' => 'required',
            'lot_no' => 'required',
            'color' => 'required',
            'buyer' => 'required',
            'total_yarn' => 'required',
            'yarn_count' => 'required',
            'wp_length' => 'required',
            'yarn_weight' => 'required',
            't_stop_mark' => 'required',
            'dyeing_length' => 'required',
            'indigo' => 'required',
            'hydrose' => 'required',
            's_black' => 'required',
            'caustic' => 'required',
            'sodium' => 'required',
            'acid' => 'required',
            'agent' => 'required',
            'trilon' => 'required',
            'setamol' => 'required',
            'premasol' => 'required',
            'glucose' => 'required',
            'l_black' => 'required',
            'modifide_starch' => 'required',
            'apple_starch' => 'required',
            't_size' => 'required',
            'uni_soft' => 'required',
            'pva' => 'required',
            'wax' => 'required',
            'cms' => 'required',
            'shift_officer' => 'required',
            'shift_oparetor' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'total_shift' => 'required',
            'total_time' => 'required',
            'remark' => 'required'
        ]);

        $chemical = DailyConsumption::find($id);
        $chemical->date = $request->date;
        $chemical->lot_no = $request->lot_no;
        $chemical->color = $request->color;
        $chemical->buyer = $request->buyer;
        $chemical->total_yarn = $request->total_yarn;
        $chemical->yarn_count = $request->yarn_count;
        $chemical->wp_length = $request->wp_length;
        $chemical->yarn_weight = $request->yarn_weight;
        $chemical->t_stop_mark = $request->t_stop_mark;
        $chemical->dyeing_length = $request->dyeing_length;
        $chemical->indigo = $request->indigo;
        $chemical->hydrose = $request->hydrose;
        $chemical->s_black = $request->s_black;
        $chemical->caustic = $request->caustic;
        $chemical->sodium = $request->sodium;
        $chemical->acid = $request->acid;
        $chemical->agent = $request->agent;
        $chemical->trilon = $request->trilon;
        $chemical->setamol = $request->setamol;
        $chemical->premasol = $request->premasol;
        $chemical->glucose = $request->glucose;
        $chemical->l_black = $request->l_black;
        $chemical->modifide_starch = $request->modifide_starch;
        $chemical->apple_starch = $request->apple_starch;
        $chemical->t_size = $request->t_size;
        $chemical->uni_soft = $request->uni_soft;
        $chemical->pva = $request->pva;
        $chemical->wax = $request->wax;
        $chemical->cms = $request->cms;
        $chemical->shift_officer = $request->shift_officer;
        $chemical->shift_oparetor = $request->shift_oparetor;
        $chemical->start_time = $request->start_time;
        $chemical->end_time = $request->end_time;
        $chemical->total_shift = $request->total_shift;
        $chemical->total_time = $request->total_time;
        $chemical->remark = $request->remark;
        $chemical->save();

        return redirect(route('consumption.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DailyConsumption::where('id',$id)->delete();
        return redirect()->back();
    }
}
