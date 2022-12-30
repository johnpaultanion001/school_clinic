<div class="card shadow">
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h2 class="m-0 font-weight-bold text-primary">Assestment</h2>
          
      </div>
      <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="graph_assestment"></canvas>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body row">
        <div class="col-md-4">
            Category A <br>
            - Jan <br>
            - Mar <br>
            - May <br>
            - June <br>
        </div>
        <div class="col-md-4">
            Category B <br>
            - Feb <br>
            - April <br>
            - July <br>
            - Aug <br>
        </div>
        <div class="col-md-4">
            Category C <br>
            - Sept <br>
            - Oct <br>
            - Nov <br>
            - Dec <br>
        </div>

        <div class="col-md-12 mt-5">
            Category A <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
        <div class="col-md-12 mt-5">
            Category B <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
        <div class="col-md-12 mt-5">
            Category C <br>
            * Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  <br>
            
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script> 

$(function(){
      //GETTING DATA FROM THE CONTROLLER
      var data = JSON.parse(`<?php echo $data; ?>`);
      var graph_id = $("#graph_assestment");
      
      //DATA
      var graph_data = {
        labels: data.label,
        datasets: [
          {
            label: "TOTAL APPOINTMENT FOR THIS MONTH:",
            data: data.data,
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
            },
      };
 
      var selling_chart = new Chart(graph_id, {
        type: "line",
        data: graph_data,
        options: options
      });
 
  });
 

</script>




