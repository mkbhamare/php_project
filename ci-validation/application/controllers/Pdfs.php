<?php

class Pdfs extends CI_Controller
{
// construct
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('admin/adminModel');
    }

    public function index() {
        $data['page'] = 'export-pdf';
        $data['title'] = 'Export PDF data | Web Preparations';
        $data['mobiledata'] = $this->adminModel->mobileList();
        // load view file for output
        $this->load->view('header');
        $this->load->view('pdf/pdf', $data);
        $this->load->view('footer');
    }
    
// for generate pdf
    public function save_pdf()
    { 
        //load mPDF library
        $this->load->library('m_pdf'); 
        //now pass the data//
        $data['mobiledata'] = $this->adminModel->mobileList();
        $html=$this->load->view('pdf/pdf',$data, true); //load the pdf.php by passing our data and get all data in $html varriable.
        $pdfFilePath ="webpreparations-".time().".pdf";     
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        // apply external css
        $pdf->WriteHTML($stylesheet,1);
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
        exit;
    }
}
?>