<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-white rounded shadow">Total Masuk:<br> <strong>Rp{{ number_format($totalMasuk) }}</strong></div>
        <div class="p-4 bg-white rounded shadow">Total Keluar:<br> <strong>Rp{{ number_format($totalKeluar) }}</strong></div>
        <div class="p-4 bg-white rounded shadow">Saldo Akhir:<br> <strong>Rp{{ number_format($saldo) }}</strong></div>
        <div class="p-4 bg-white rounded shadow">Jumlah Siswa:<br> <strong>{{ $jumlahSiswa }}</strong></div>
    </div>

    <div class="flex gap-4 mb-6">
        <a href="{{ route('students.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Siswa</a>
        <a href="{{ route('transactions.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Transaksi</a>
        <a href="{{ route('reports.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Laporan</a>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-2">Grafik Kas Masuk / Keluar</h2>
        <canvas id="kasChart" height="100"></canvas>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('kasChart').getContext('2d');

            const labels = @json(array_keys($chartData->toArray()));
            const dataMasuk = @json(array_values($chartData->pluck('in')->toArray()));
            const dataKeluar = @json(array_values($chartData->pluck('out')->toArray()));

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Kas Masuk',
                            data: dataMasuk,
                            borderColor: 'green',
                            backgroundColor: 'rgba(0,128,0,0.1)',
                            fill: true,
                        },
                        {
                            label: 'Kas Keluar',
                            data: dataKeluar,
                            borderColor: 'red',
                            backgroundColor: 'rgba(255,0,0,0.1)',
                            fill: true,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    @endpush
</div>
