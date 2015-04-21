<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AwardsController extends Controller {

    public function index()
    {
        return view('awards/index');
    }

    public function show($courseid, $userid)
    {
        // $ara = array("courseid" => $courseid, "userid" => $userid);
        // echo $courseid;
        // echo '<br>';
        // echo $aa = \App\User::find($userid);
        // echo '<br>';
        // echo $aa->courses->where('id', (int)$courseid);
        // echo '<br>';
        // echo \App\User::find((int)$userid)->courses->where('id', (int)$courseid);
        // echo '<br>';
        $user = \App\User::find((int)$userid);
        $course = \App\Course::find((int)$courseid);
        $template = $course->template;
        $st = json_decode($template->settings);

        $pdf = new \FPDI("L", "mm", "A4");
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();

        //Set the source PDF file
        $pagecount = $pdf->setSourceFile($template->path);

        //Import the first page of the file
        $tpl = $pdf->importPage(1);

        //Use this page as template
        $pdf->useTemplate($tpl);
        // set font
        $pdf->SetFont('times', 'B', 20);

        // $pdf->AddPage('P', 'A4');
        // $pdf->Cell(0, 0, 'A4 PORTRAIT', 1, 1, 'C');

        // $pdf->AddPage('L', 'A4');
        $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
        $pdf->Text(10, 140, $course->title);
        $pdf->Text(10, 180, $user->ad . $user->soyad);
        $pdf->Output('hello_world.pdf');
    }
}


//         $award = \App\Course::find(1);
//         $template = $award->template;
//         // echo $template->settings;
//         $settings = json_decode($template->settings);

//         $pdf = new \FPDI("L", "mm", "A4");
//         $pdf->SetPrintHeader(false);
//         $pdf->SetPrintFooter(false);
//         $pdf->AddPage();

//         //Set the source PDF file
//         $pagecount = $pdf->setSourceFile($template->path);

//         //Import the first page of the file
//         $tpl = $pdf->importPage(1);

//         //Use this page as template
//         $pdf->useTemplate($tpl);

//         // set font
// $pdf->SetFont('times', 'B', 20);

// // $pdf->AddPage('P', 'A4');
// // $pdf->Cell(0, 0, 'A4 PORTRAIT', 1, 1, 'C');

// // $pdf->AddPage('L', 'A4');
//         $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//         $pdf->Text(10, 140, $award->title);
//         $pdf->Output('hello_world.pdf');