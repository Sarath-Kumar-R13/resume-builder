<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use PDF;

class ResumeController extends Controller
{
    public function store(Request $request)
{
    // 1️⃣ Image upload
    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
    }

    // 2️⃣ Collect resume data (EXACTLY from your inputs)
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

    // 3️⃣ Save or update resume
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
    public function preview(){
    $resume = Resume::where('user_id', auth()->id())->first();

    if (!$resume) {
        return redirect()->back()->with('error', 'No resume found');
    }

    return view('resume.preview', [
        'resume' => $resume,
        'data' => $resume->resume_data
        ]);
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

}
