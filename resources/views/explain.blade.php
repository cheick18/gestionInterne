// Supposons que vous ayez récupéré les données de paiement de votre base de données
const paymentsData = [
    { date: '2023-01-15', amount: 100 },
    { date: '2023-02-20', amount: 150 },
    { date: '2023-02-25', amount: 75 },
    // ... d'autres paiements ...
];

// Organisez les paiements par mois et par année
const paymentsByMonthAndYear = {};

paymentsData.forEach(payment => {
    const date = new Date(payment.date);
    const year = date.getFullYear();
    const month = date.getMonth();

    if (!paymentsByMonthAndYear[year]) {
        paymentsByMonthAndYear[year] = {};
    }

    if (!paymentsByMonthAndYear[year][month]) {
        paymentsByMonthAndYear[year][month] = 0;
    }

    paymentsByMonthAndYear[year][month] += payment.amount;
});

// Maintenant, vous avez les paiements regroupés par mois et par année
console.log(paymentsByMonthAndYear);

// Créez les données pour le graphique en courbes
const year = 2023; // Année spécifique pour laquelle vous souhaitez afficher les données
const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

const paymentDataForYear = paymentsByMonthAndYear[year];
const paymentValues = [];

months.forEach((month, index) => {
    const monthTotal = paymentDataForYear[index] || 0;
    paymentValues.push(monthTotal);
});

// Maintenant, vous pouvez utiliser ces données pour créer le graphique en courbes
var data = {
    labels: months,
    datasets: [{
        label: 'Paiements en ' + year,
        data: paymentValues,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};

// Configuration du graphique
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

// Création du graphique
var ctx = document.getElementById('myLineChart').getContext('2d');
var myLineChart = new Chart(ctx, config);
