@php
$payments = DB::table('payments')
    ->select(DB::raw('MONTH(payment_date) as month'), DB::raw('SUM(amount) as total'))
    ->groupBy(DB::raw('MONTH(payment_date)'))
    ->get();

    $payments= App\Models\Paiements::select('MONTH(created_at) as month', 'SUM(montant) as total')-> ->groupBy('MONTH(created_at)')->get();

@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Graphique des paiements mensuels (Courbe)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var months = [];
        var totals = [];

        // Remplir les tableaux avec les données extraites de Laravel
        @foreach($payments as $payment)
            months.push('{{ \Carbon\Carbon::createFromDate(null, $payment->month)->format('F Y') }}');
            totals.push({{ $payment->total }});
        @endforeach

        var chart = new Chart(ctx, {
            type: 'line', // Utilisez 'line' pour un graphique en courbe
            data: {
                labels: months,
                datasets: [{
                    label: 'Montant payé par mois',
                    data: totals,
                    fill: false, // Ne pas remplir la zone sous la courbe
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
