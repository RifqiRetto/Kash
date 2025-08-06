<?php
namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentReportExport implements FromCollection, WithHeadings, WithEvents
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
                // nanti day dama bulan nya diganti yah rifqi masa depan
            ];
        });
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Kas Masuk', 'Kas Keluar', 'Saldo', 'Terakhir Kas'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Insert judul dan tanggal di atas heading
                $sheet->insertNewRowBefore(1, 3); // Sisipkan 3 baris di atas
                $sheet->mergeCells('A1:F1');
                $sheet->mergeCells('A2:F2');

                $sheet->setCellValue('A1', 'Laporan Kas Siswa');
                $sheet->setCellValue('A2', 'Diunduh pada: ' . now()->format('d-m-Y H:i:s'));

                // Optional: Style
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A2')->getFont()->setItalic(true)->getColor()->setARGB('FF555555');
                $sheet->getStyle('A1:A2')->getAlignment()->setHorizontal('center');
            },
        ];
    }
}
