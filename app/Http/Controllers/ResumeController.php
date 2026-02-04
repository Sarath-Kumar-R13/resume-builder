<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use PDF;

class ResumeController extends Controller
{
    //==============================================store data==========================================================//
    public function store(Request $request)
{
    //  Image upload
    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
    }

    // resume data collection  from my inputs
    $resumeData = [
        'personal' => [
            'name' => $request->name,
            'job_title' => $request->job_title,
            'short_description' => $request->short_description,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'github' => $request->github,
        ],

        'work_experience' => [
            'position' => $request->position,
            'company' => $request->company,
            'from' => $request->we_from_date,
            'to' => $request->we_to_date,
            'location' => $request->work_location,
        ],

        'projects' => [
            'title' => $request->project,
            'description' => $request->description,
        ],

        'skills' => $request->skill,

        'education' => [
            'course' => $request->course,
            'institution' => $request->institution,
            'from' => $request->edu_from_date,
            'to' => $request->edu_to_date,
        ],

        'languages' => $request->language,

        'achievements' => $request->achievements,

        'organisations' => [
            'name' => $request->organisations,
            'from' => $request->org_from_date,
            'to' => $request->org_to_date,
        ],

        'certifications' => $request->certifications
    ];

    // savr /update
    Resume::updateOrCreate(
        ['user_id' => auth()->id()],
        [
            'resume_data' => $resumeData,
            'image' => $imageName
        ]
    );

    return redirect()->route('resume.preview')
        ->with('success', 'Resume saved successfully');
}
// ===================================preview===============================================================//
    // public function preview(){
    // $resume = Resume::where('user_id', auth()->id())->first();

    // if (!$resume) {
    //     return redirect()->back()->with('error', 'No resume found');
    // }

    // return view('resume.preview', [
    //     'resume' => $resume,
    //     'data' => $resume->resume_data
    //     ]);
    // }
    public function preview($id){
        $resume=Resume::where('id',$id)->where('user_id',auth()->id())->firstorfail();
    }
//==================================================================PDF==============================================//
    public function downloadPdf(){
    $resume = Resume::where('user_id', auth()->id())->first();

    $pdf = PDF::loadView('resume.preview', [
        'resume' => $resume,
        'data' => $resume->resume_data
    ]);

    return $pdf->download('resume.pdf');
}
//======================================================================dashboard=====================================//
 public function dashboard(){
    $user=Auth::user();

    $resume=Resume::where('user_id',$user->id())->get();

    return view('dashboard',compact('user','resume'));
 }
 //==================================================================---create---=====================================//
//  public function create(){
//     return view('resume.create');
//  }
//  public function create(Request $request){
//     Resume::create([
//         'user_id'=>auth()->id(),
//         'title'=>$request->title,
//         'summary'=>$request->summary
//     ]);
//     return redirect()->route('dashboard');
//  }

}
