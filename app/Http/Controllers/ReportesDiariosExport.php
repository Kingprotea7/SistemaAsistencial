<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

class ReportesDiariosExport extends Controller
{
    protected $reportesDiarios;

    public function __construct($reportesDiarios)
    {
        $this->reportesDiarios = $reportesDiarios;
    }

    public function collection()
    {
        return $this->reportesDiarios;
    }
}
