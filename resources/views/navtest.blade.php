@extends('layouts.dash')
@section('content')
<style>
  .chart-container {
    position: relative;
    width: 100%;
    padding: 20px;
}

</style>
@php
$payment = App\Models\Paiement::select('created_at')->get();
$allyear=[];
foreach ($payment as $payments) {
  $date = new DateTime($payments->created_at);
          $year = $date->format('Y');
          $allyear[$year]=$year;
}
ksort($allyear);
@endphp
<div class="row">
  <div class="col-5 col-xs-12 ">
    <form action="/getYear" method="post" id="myForm">
      @csrf
      <select id="selectYear" class="form-select" aria-label="Default select example" name="annee">
        
          @foreach ($allyear as $year)
              <option value="{{ $year }}">{{ $year }}</option>
          @endforeach
      </select>
    </form>
  </div>
</div>

</div>
<script>
var intDate;
  var annee= document.getElementById('selectYear');
  inDate=parseInt(annee.options[annee.selectedIndex].value);

  annee.addEventListener('change', function() {
   var dates= annee.options[annee.selectedIndex].value;
    intDate=parseInt(dates);
    document.getElementById('myForm').submit();

   
  });

 
</script>

<div class="row g-3 my-2">
  
  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            @php
            $inscrits= App\Models\Inscription::count();
            @endphp
              <h3 class="fs-2">{{$inscrits}}</h3>
              <p class="fs-5  text-xs">les inscrits</p>
          </div>

          <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3  col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            @php
               $montant= App\Models\Paiement::sum('montant');
            @endphp
              <h3 class="fs-2">{{$montant}}DH</h3>
              <p class="fs-5">Revenus</p>
          </div>
          <i
              class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        @php
        $form= App\Models\Formations::count();
        @endphp
        
        <div>
              <h3 class="fs-2">{{$form}}</h3>
              <p class="fs-5">Formations</p>
          </div>
          <!--
          <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>-->
          <i class="fas fa-book-open fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          
        @php
        $us= App\Models\User::count();
        @endphp
        <div>
              <h3 class="fs-2">{{$us}}</h3>
              <p class="fs-5">User</p>
          </div>
          <!--
          <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        -->
          <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>
<div class="h-20   block"></div>
<div class="row p-0">
 
  <div class="col-12">
  
    <div class="chart-container" style="">
      <canvas id="new"></canvas>
      
  </div>
  </div>
  <div class="w-100 mb-3"></div>
  <div class="col-md-6 col-xs-12 "> 
    <div class="chart-container" style="">
    <canvas id="myLineChart"></canvas>
</div></div>
</div>
@php               
              
$user= App\Models\User::all();
$inscrits= App\Models\Inscription::all();


@endphp

  <div class="col-md-6  col-xs-12 text-danger  shadow-sm p-3 mb-5 bg-body rounded">
    <table class="table border-0  table-responsive">
        
            <tr>
                <td class="">User</td>
              
                <td>mail</td>
                <td>Etudiant inscrits</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            @foreach($user as $use)

            <tr>
                <td>{{$use->name}}</td>
                <td>{{$use->email}}</td>
                <td>
                    @foreach($use->inscrits as $inscrit)
                    <p>{{$inscrit->Nom." "}}{{$inscrit->Prenom}}</p>
                    @endforeach  
                </td>
                <td> 
                  <form action="/modif_user/{{$use->id}}" method="post">
                    @csrf
                   
                  <button type="submit" class="btn btn-success">Modifier</button>
                
                </form></td>
                <td>
                    <form action="/deleteUser/{{$use->id}}" method="post">
                          @csrf
                         
                        <button type="submit" class="btn btn-danger" style="background: #E62E36!important">Supprimer</button>
                      
                      </form></td>
                    </tr>

            @endforeach
    </table>
  
  </div>
  <div class="col-1"></div>

  <div class="col-md-12 col-xs-12 card shadow-sm p-3 mb-5 bg-body rounded">
    <table class="table" >
        <tr>
           <th scope="col"> Nom</th>
            <th scope="col">Module</th>
            <th scope="col">Type</th> 
            <th scope="col">Montant</th> 
            <th scope="col">Recu de virement</th> 
            <th scope="col">Date</th>   
          
        </tr>
  
        @forEach($inscrits as $ins)
          
        <tr class="">
           

            @forEach($ins->allformations as $user)
              <tr>  
                <td>{{$ins->Nom}}</td> 
                <td>{{$user->nom}}</td>
               
                 
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        <p>{{$pay->type}}</p>
                        @endif
                        @endforeach
                     </td>
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        @if($pay->montant==null)
                        <p>Null</p>
                        @endif
                        <p >{{$pay->montant}}</p>
                        @endif
                        @endforeach
                     </td>
                     <td>
                      @forEach($user->allpymentbyinscrit as $pay)
                      @if($pay->inscriptions_id===$ins->id)
                      @if($pay->recu!==null)
                     <p><a href="{{ Storage::url($pay->recu)}}" class="text-decoration-none text-secondary"> Recu</a><p>
                      @else
                      <p>Null</p>
                      @endif
                      @endif
                      @endforeach
                     </td>
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        <p>{{$pay->created_at}}</p>
                        @endif
                        @endforeach
                     </td>
                    </tr>
                   
            @endforeach
     
        </tr>
        @endforeach
    </table>
  </div>
</div>
<!-- Courbe !-->
@php
$paymentMonthAndYear = [];
$payment = App\Models\Paiement::select('created_at', 'montant')->get();


foreach ($payment as $payments) {
    $date = new DateTime($payments->created_at);
    $year = $date->format('Y');
    $month = $date->format('m');

    if (!isset($paymentMonthAndYear[$year])) {
        $paymentMonthAndYear[$year] = [];
    }

    if (!isset($paymentMonthAndYear[$year][$month])) {
        $paymentMonthAndYear[$year][$month] = 0;
    }

    $paymentMonthAndYear[$year][$month] += $payments->montant;
}
if(!isset($y)){
  $y=2023;
}
else {
  $y= intval($y);


}
@endphp
<script>
 
    const year =  inDate;
    console.log( inDate);
const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
const month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
@if(isset($paymentMonthAndYear[$y]))
const paymentDataForYear = {!! json_encode($paymentMonthAndYear[$y]) !!};

const paymentValues = [];

month.forEach((mont) => {
    const monthTotal = paymentDataForYear[mont] || 0;
    paymentValues.push(monthTotal);
});
var data = {
    labels: months,
    datasets: [{
       label: 'Paiements en ' + @json($y),
        data: paymentValues,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};

var config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
                
            }
        }
    }
};

var ctx = document.getElementById('myLineChart').getContext('2d');
var myLineChart = new Chart(ctx, config);
@endif

</script>


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
        $annee = date('Y', strtotime($inscription->created_at));
        if($annee==$y)
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
const ct = document.getElementById('new').getContext('2d');

new Chart(ct, {
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

@endsection