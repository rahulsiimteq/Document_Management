<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use DB;

use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $patient = DB::table('patients')->select('MedicareNO')->get();

// dd($patient);
        return view('Patient.create')->with('patients',$patient);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $patient = new patient;
      $patient->patientName = $request->input('patientName');
      $patient->details = $request->input('details');
      $patient->author = $request->input('author');
      $patient->MedicareNO = $request->input('MedicareNo');
      $phpWord = new \PhpOffice\PhpWord\PhpWord();

      $section = $phpWord->addSection();
    	$section->addText($patient->patientName,
    	    array('name'=>'Tahoma', 'size'=>20, 'bold'=>true));
          $section->addText(  $patient->details,
        	    array('name'=>'Tahoma', 'size'=>16, 'bold'=>true,'align'=>"center"));

              $section->addText('Author By : '.$patient->author,
                  array('name'=>'Tahoma', 'size'=>16, 'bold'=>true,'align'=>"center"));

                $date = date('Y-m-d');
                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            	  $objWriter->save('Uploads/patients/'.$patient->MedicareNO.'/'.$date.$patient->patientName.'.docx');
                $patient->save();
              return redirect('/');
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
