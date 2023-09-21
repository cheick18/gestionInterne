
/*<label for="selectYear">Choisir une année :</label>
<select id="selectYear">
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <!-- Ajoutez ici d'autres années disponibles -->
</select>
<button id="updateChartButton">Mettre à jour le graphique</button>
*/

// Écoutez le clic sur le bouton de mise à jour
document.getElementById('updateChartButton').addEventListener('click', () => {
    const selectedYear = document.getElementById('selectYear').value;

    // Étape 1 : Collecte des données pour l'année sélectionnée
    const formations = getAllFormations(); // Récupérez toutes les formations depuis votre backend

    // Étape 2 : Traitement des données
    const data = [];

    formations.forEach((formation) => {
        const formationData = {
            label: formation.nom,
            data: [],
        };

        const inscriptions = getInscriptionsForFormation(formation.id);

        const inscritsParMois = Array(12).fill(0);

        inscriptions.forEach((inscription) => {
            const dateInscription = new Date(inscription.date);
            const mois = dateInscription.getMonth();
            const annee = dateInscription.getFullYear(); // Obtenez l'année de l'inscription

            if (annee == selectedYear) {
                inscritsParMois[mois]++;
            }
        });

        formationData.data = inscritsParMois;
        data.push(formationData);
    });

    // Étape 3 : Mise à jour du graphique en utilisant Chart.js
    const ctx = document.getElementById('myChart').getContext('2d');

    if (window.myChart) {
        // Détruisez l'instance précédente du graphique si elle existe
        window.myChart.destroy();
    }

    window.myChart = new Chart(ctx, {
        type: 'bar',
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
});
