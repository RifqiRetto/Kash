<?php
namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class StudentReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::with('transactions')->get()->map(function ($student) {
            $kasMasuk = $student->transactions->where('type', 'masuk')->sum('amount');
            $kasKeluar = $student->transactions->where('type', 'keluar')->sum('amount');
            $saldo = $kasMasuk - $kasKeluar;
            $lastKas = optional($student->transactions->sortByDesc('created_at')->first())->created_at;

            return [
                'NIS' => $student->nis,
                'Nama' => $student->name,
                'Kas Masuk' => $kasMasuk,
                'Kas Keluar' => $kasKeluar,
                'Saldo' => $saldo,
                'Terakhir Kas' => optional($lastKas)->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Kas Masuk', 'Kas Keluar', 'Saldo', 'Terakhir Kas'];
    }
}
