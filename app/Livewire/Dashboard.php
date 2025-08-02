<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Student;

class Dashboard extends Component
{
    public $totalMasuk = 0;
    public $totalKeluar = 0;
    public $saldo = 0;
    public $jumlahSiswa = 0;

    public function mount()
    {
        $this->totalMasuk = Transaction::where('type', 'masuk')->sum('amount');
        $this->totalKeluar = Transaction::where('type', 'keluar')->sum('amount');
        $this->saldo = $this->totalMasuk - $this->totalKeluar;
        $this->jumlahSiswa = Student::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
