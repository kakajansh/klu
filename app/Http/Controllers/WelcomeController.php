<?php namespace App\Http\Controllers;

// use \FPDF;
// use \FPDI;
use \TCPDF;

class WelcomeController extends Controller {

    public function __construct()
    {
        $this->loadAndAuthorizeResource();
    }

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function bassahypa()
	{
		return view('bassahypa');
	}

	public function pdf()
	{
		$award = \App\Course::find(1);
		$template = $award->template;
		// echo $template->settings;
		$settings = json_decode($template->settings);

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
	    $pdf->Text(10, 140, $award->title);
	    $pdf->Output('hello_world.pdf');
	}

	public function multi()
	{
		$awards = \App\Template::all()->toArray();
		$pdf = new \FPDI("L", "mm", "A4");
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);

		foreach ($awards as $award => $aw) {
			$pdf->AddPage();

			$pagecount = $pdf->setSourceFile('templates/deneme.pdf');
			$tpl = $pdf->importPage(1);
			$pdf->useTemplate($tpl);
			$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
		}

	    $pdf->Output('hello_world.pdf');

	}

}
