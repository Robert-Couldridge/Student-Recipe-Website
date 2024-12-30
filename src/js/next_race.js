// URL of the API endpoint
const apiUrl = 'https://api.jolpi.ca/ergast/f1/2024/races'; // F1 Calendar API

// Function to fetch data from the API
async function fetchData() {
        const response = await fetch(apiUrl); // Fetch data from the API
        if (!response.ok){
            throw new Error('Response status: ', response.status);
        }
        const data = await response.json();   // Convert response to JSON
        displayData(data);                    // Call the function to display data
}

function displayData(data){
    const container = document.getElementById('next-race');
    container.className = 'container-fluid'

    const races = data.MRData.RaceTable.Races; // Extract races from the JSON

    let racecount = 0;
    let raceRow; 

    races.forEach(race => {


        if (racecount % 3 === 0) {
            raceRow = document.createElement('div');
            raceRow.className = 'row';
        }

        // Create a div for each race
        const raceDiv = document.createElement('div');
        raceDiv.className = 'col-md-4';

        // Create a card for each race
        const raceCard = document.createElement('div');
        raceCard.className = 'race-card';

        // Create an HTML structure for each race
        raceCard.innerHTML = `
            <h3><a href="${race.url}" target="_blank">${race.raceName}</a></h3>
            <p><strong>Circuit:</strong> ${race.Circuit.circuitName}</p>
            <p><strong>Location:</strong> ${race.Circuit.Location.locality}, ${race.Circuit.Location.country}</p>
            <p><strong>Race Date:</strong> ${race.date} at ${race.time}</p>
            <p><strong>Qualifying:</strong> ${race.Qualifying.date} at ${race.Qualifying.time}</p>
            `;
        
        // Append the race card to the race div
        raceDiv.append(raceCard);

        // Append the race div to the container
        raceRow.appendChild(raceDiv);
        racecount++;

        if (racecount % 3 === 2) {
            container.appendChild(raceRow);
        }

});
}

fetchData();