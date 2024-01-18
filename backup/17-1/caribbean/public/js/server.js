// server.js
const express = require('express');
const app = express();

// Replace this with your database connection and setup
const performanceDataFromDatabase = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec'],
  datasets: [
    {
      label: 'Business Performance',
      backgroundColor: 'rgba(54, 162, 235, 0.6)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 2,
      fill: true,
      data: [10, 15, 20, 18, 22, 17, 25], // Replace with your actual performance data for each month from the database
    },
  ],
};

// API endpoint to fetch the performance data
app.get('/api/performance', (req, res) => {
  // Replace this with your database query to fetch the actual data from the database
  // For example:
  // YourDatabaseModel.find({}).then((data) => res.json(data));
  res.json(performanceDataFromDatabase);
});

// Start the server
const port = 3000; // Replace with your desired port number
app.listen(port, () => console.log(`Server is running on http://localhost:${port}`));
