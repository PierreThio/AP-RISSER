




function chart(scoreSlam, scoreSisr){
    const ctx = document.getElementById('chart'); 
    new Chart (ctx, {
    type: 'bar',
    data: {
      labels: ['SISR', 'SLAM'],
      datasets: [{
        label: 'Nombre de points',
          data: [scoreSlam, scoreSisr],
          backgroundColor: [ '#FFAC2F'],
          color: '#FFFF',
         borderWidth: 1,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero : true
        }
      }
    }
  });
}




   
