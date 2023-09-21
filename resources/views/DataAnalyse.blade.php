
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
   
   
    <title>Document</title>
</head>
<body>
    
        <canvas id="new"></canvas>

    </div>
    



@php
$data = [];
$formations = App\Models\Formations::all();

foreach ($formations as $formationn) {
    $formationData = [
        'label' => $formationn->nom, // Utilisez un attribut de la formation pour le nom
        'data' => [], // Tableau pour stocker le nombre d'inscrits par mois
    ];

    $inscritsParMois = array_fill(0, 12, 0); // Initialisez le tableau avec des zéros pour les 12 mois

    foreach ($formationn->allinscrit as $inscription) {
        $mois = date('n', strtotime($inscription->created_at)); // Extrait le mois (1-12)
        $inscritsParMois[$mois - 1]++; // Soustrayez 1 car les mois sont de 1 à 12, mais les indices de tableau sont de 0 à 11
    }

    $formationData['data'] = $inscritsParMois;
    $data[] = $formationData;
}

@endphp
<script>
    var data = @json($data);
</script>

<script>
  const ctx = document.getElementById('new').getContext('2d');

new Chart(ctx, {
  type: 'bar', // Vous pouvez utiliser un graphique à barres pour représenter les données par mois
  data: {
    labels: [
      'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
      'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ],
    datasets: data,
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        beginAtZero: true,
      },
      y: {
        beginAtZero: true,
      },
    },
  },
});
</script>
</body>




</html>
