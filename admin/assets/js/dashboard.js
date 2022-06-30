
	var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Monday", "Tuesday", "Wednesday",  "Thursday", "Friday",  "Saturday", "Sunday"],
    datasets: [{
      backgroundColor: [
        "#9fa8da",
        "#95dfd7",
        "#a0c2f9",
        "#cd93d7",
        "#f48eb1",
        "#b3b6fb",
        "#d9e7fd"
      ],
      data: [2000, 2200, 2343, 2500, 2000, 1000, 800]
    }]
  }
});

 new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ["Monday", "Tuesday", "Wednesday",  "Thursday", "Friday",  "Saturday", "Sunday"],
    datasets: [{ 
        data: [2000,2200,2500,3500,2300,2000,1500],
        label: "Trafic",
        borderColor: "#4285f4",
        fill: false
      }
    ]
  },
});

  new Chart(document.getElementById("bubble-chart"), {
    type: 'bubble',
    data: {
      labels: "Africa",
      datasets: [
        {
          label: ["Jhon"],
          backgroundColor: "#ff6384",
          borderColor: "#ff6384",
          data: [{
            x: 3.2,
            y: 7.0,
            r: 10
          }]
        }, {
          label: ["Peter"],
          backgroundColor: "#44e4ee",
          borderColor: "#44e4ee",
          data: [{
            x: 5.0,
            y: 7.0,
            r: 10
          }]
        }, {
          label: ["Donals"],
          backgroundColor: "#62088a",
          borderColor: "#62088a",
          data: [{
            x: 6.8,
            y: 7.0,
            r: 10
          }]
        }
      ]
    },
});
