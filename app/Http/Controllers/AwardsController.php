<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AwardsController extends Controller {

    public function __construct()
    {
        $this->loadAndAuthorizeResource();
    }

    public function index()
    {
        return view('awards/index');
    }

    public function show($courseid, $userid)
    {
        $user = \App\User::where(['ogrno' => $userid])->first();
        $course = \App\Course::findBySlug($courseid);
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

        // set style for barcode
        $style = array(
            'border' => true,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        // QR CODE
        $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 20, 155, 30, 30, $style, 'N');

        // TITLE
        $pdf->SetFont('helvetica', 'B', 30);
        $pdf->setXY(50, 20);
        $pdf->Cell(200, 10, $course->title, 1, 1, 'C');

        // AD SOYAD
        $pdf->SetFont('courier', 'B', 20);
        $pdf->setXY($st->name_left, $st->name_top);
        $pdf->Cell($st->name_width, $st->name_height, $user->ad . " " . $user->soyad, 1, 1, 'C');

        $pdf->Output('hello_world.pdf');
    }

    public function multi($courseid)
    {
        $course = \App\Course::find($courseid);
        $template = $course->template;
        $st = json_decode($template->settings);

        $pdf = new \FPDI("L", "mm", "A4");
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        foreach ($course->users as $user) {
            $pdf->AddPage();

            $pagecount = $pdf->setSourceFile($template->path);
            $tpl = $pdf->importPage(1);
            $pdf->useTemplate($tpl);

            // AD SOYAD
            $pdf->SetFont('courier', 'B', 20);
            $pdf->setXY($st->name_left, $st->name_top);
            $pdf->Cell($st->name_width, $st->name_height, $user->ad . " " . $user->soyad, 1, 1, 'C');
        }

        $pdf->Output('hello_world.pdf');
    }
}