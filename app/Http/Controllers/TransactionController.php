<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Student;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('student')->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $students = Student::all();
        return view('transactions.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|in:masuk,keluar',
            'category' => 'nullable|string|max:100',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
        ]);

        $transaction = Transaction::create($request->all());

        // Update saldo siswa
        $student = $transaction->student;
        $transaction->type === 'masuk'
            ? $student->increment('total_saldo', $transaction->amount)
            : $student->decrement('total_saldo', $transaction->amount);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }
}
