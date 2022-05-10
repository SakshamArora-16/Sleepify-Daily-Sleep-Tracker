$(document).ready(function(){
    $.ajax({
      url: "http://localhost/Major Project/data.php",
      method: "GET",
      success: function(data) {
        console.log(data);
        var dat = [];
        var dur = [];
  
        for(var i in data) {
          dat.push(data[i].date);
          dur.push(data[i].duration);
        }
  
        var chartdata = {
          labels: dat,
          datasets : [
            {
              label: 'Duration',
              backgroundColor: 'gray',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: dur
            }
          ]
        };
  
        var ctx = $("#mycanvas");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });