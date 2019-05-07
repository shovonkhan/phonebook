<?php

namespace App\Http\Controllers;

use App\Chemical;
use App\ChemicalIssue;
use App\Manufacture;
use App\Yarn;
use App\YarnIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    public function ChemicalIssue()
    {
        $chemicalIssue = ChemicalIssue::all();
    	return view('issue.chemical.index', compact('chemicalIssue'));
    }


    public function ChemicalIssueCreate()
    {
    	$manufacture = Manufacture::all();
    	$chemicals = Chemical::all();
    	return view('issue.chemical.create', compact('manufacture','chemicals'));
    }

    public function ChemicalIssueInsert(Request $request){
        $validatedData = $request->validate([
        'date' => 'required',
        'department' => 'required',
        'lot_no' => 'required'
        ]);
        
        $chemicals = new ChemicalIssue;
        $chemicals->date = $request->date;
        $chemicals->bill = $request->bill;
        $chemicals->department = $request->department;
        $chemicals->lot_no = $request->lot_no;
        $chemicals->remarks = $request->remarks;
        $chemicals->status = $request->status;
        
        // $yarn=DB::table('yarn_issue')
                         // ->insert($chemicals);

        if ($chemicals->save()) {
            $id = $chemicals->id;
            foreach($request->productname as $key => $v)
            {
                $data = array('issue_id'=>$id,
                            'chemical_id'=>$v,
                            'qty'=>$request->qty [$key]
                        );
                DB::table('chemical_issue_details')
                         ->insert($data);
            }
        }
        return redirect(route('chemicalIssue'));
    }

    public function ChemicalIssueShow($id)
    {
        $chemicalIssue = DB::table('chemical_issues')
                    ->where('id',$id)
                    ->first();
        $chemicalIssueD = DB::table('chemical_issue_details')
                    ->join('chemicals','chemical_issue_details.chemical_id','chemicals.id')
                    ->select('chemical_issue_details.*','chemicals.name')
                    ->where('chemical_issue_details.issue_id',$id)
                    ->get();
        return view('issue.chemical.show', compact('chemicalIssue','chemicalIssueD'));
    }

    public function ChemicalIssueStatus(Request $request, $id)
    {
        $data=array();
        $data['status']=$request->status;
        $chemical_status = DB::table('chemical_issues')->where('id',$id)->update($data);
        return redirect()->back();
    }


    public function YarnIssue()
    {
        $yarnIssue = YarnIssue::all();
    	return view('issue.yarn.index', compact('yarnIssue'));
    }


    public function YarnIssueCreate()
    {
    	$manufacture = Manufacture::all();
    	$yarns = Yarn::all();
    	return view('issue.yarn.create', compact('manufacture','yarns'));
    }

    public function YarnIssueInsert(Request $request){
        $validatedData = $request->validate([
        'date' => 'required',
        'department' => 'required',
        'lot_no' => 'required'
        ]);
        
        $yarns = new YarnIssue;
        $yarns->date = $request->date;
        $yarns->bill = $request->bill;
        $yarns->department = $request->department;
        $yarns->lot_no = $request->lot_no;
        $yarns->remarks = $request->remarks;
        $yarns->status = $request->status;
        
        // $yarn=DB::table('yarn_issue')
                         // ->insert($yarns);

        if ($yarns->save()) {
            $id = $yarns->id;
            foreach($request->productname as $key => $v)
            {
                $data = array('issue_id'=>$id,
                            'yarn_id'=>$v,
                            'manufacture'=>$request->manufacture [$key],
                            'qty'=>$request->qty [$key]
                        );
                DB::table('yarn_issue_details')
                         ->insert($data);
            }
        }
        return redirect(route('yarnIssue'));
    }

    public function YarnIssueShow($id)
    {
        $yarnIssue = DB::table('yarn_issues')
                    ->where('id',$id)
                    ->first();
        $yarnIssueD = DB::table('yarn_issue_details')
                    ->join('yarns','yarn_issue_details.yarn_id','yarns.id')
                    ->select('yarn_issue_details.*','yarns.yarn_name')
                    ->where('yarn_issue_details.issue_id',$id)
                    ->get();
        return view('issue.yarn.show', compact('yarnIssue','yarnIssueD'));
    }

    public function YarnIssueStatus(Request $request, $id)
    {
        $data=array();
        $data['status']=$request->status;
        $yarn_status = DB::table('yarn_issues')->where('id',$id)->update($data);
        return redirect()->back();
    }

    public function YarnIssueDelete($id)
    {
        
    }
}
