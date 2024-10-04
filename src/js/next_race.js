// URL of the API endpoint
const apiUrl = 'https://api.jolpi.ca/ergast/f1/2024/races'; // Sample API

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
    
    const races = data.MRData.RaceTable.Races; // Extract races from the JSON

    races.forEach(race => {
        // Create a div for each race
        const raceDiv = document.createElement('div');
        raceDiv.className = 'race';

        // Create an HTML structure for each race
        raceDiv.innerHTML = `
            <h3><a href="${race.url}" target="_blank">${race.raceName}</a></h3>
            <p><strong>Circuit:</strong> ${race.Circuit.circuitName}</p>
            <p><strong>Location:</strong> ${race.Circuit.Location.locality}, ${race.Circuit.Location.country}</p>
            <p><strong>Race Date:</strong> ${race.date} at ${race.time}</p>
            <p><strong>First Practice:</strong> ${race.FirstPractice.date} at ${race.FirstPractice.time}</p>
            <p><strong>Qualifying:</strong> ${race.Qualifying.date} at ${race.Qualifying.time}</p>
            `;

        // Append the race div to the container
        container.appendChild(raceDiv);

});
}

fetchData();