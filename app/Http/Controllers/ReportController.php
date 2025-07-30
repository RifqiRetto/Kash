<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Laporan sederhana per siswa
        $reports = Student::select('students.*')
            ->withSum(['transactions as kas_masuk' => function ($q) {
                $q->where('type', 'masuk');
            }], 'amount')
            ->withSum(['transactions as kas_keluar' => function ($q) {
                $q->where('type', 'keluar');
            }], 'amount')
            ->get();

        return view('reports.index', compact('reports'));
    }
}
