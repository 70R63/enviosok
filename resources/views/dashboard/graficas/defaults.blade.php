
<canvas id="myChart2" class="ht-400-f"></canvas>
<script>
var chartData =  {
        labels: ['Marzo', 'Abril', 'Mayo'],
        datasets: [{

            label: 'Fedex',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
               
                
            ],
            borderWidth: 1
        },
        {
            label: 'Estafeta',
            data: [19, 3, 5],
            backgroundColor: [
                
                'rgba(54, 162, 235, 0.2)',
                
            ],
            borderColor: [
                
                'rgba(54, 162, 235, 1)',
               
            ],
            borderWidth: 1
        }
        ,
        {
            label: 'Redpack',
            data: [3, 5, 2],
            backgroundColor: [
                
                'rgba(255, 206, 86, 0.2)',
             
            ],
            borderColor: [
                
                'rgba(255, 206, 86, 1)',
                
            ],
            borderWidth: 1
        }
        ,
        {
            label: 'DHL',
            data: [5, 2, 3],
            backgroundColor: [
                
                
                'rgba(75, 192, 192, 0.2)',
               
            ],
            borderColor: [
                
                'rgba(75, 192, 192, 1)',
               
            ],
            borderWidth: 1
        }]
    };

var chartOptions =  {
        plugins: {
            legend: {
                display: true,
                
            }
        }
    }

const ctx2 = document.getElementById('myChart2').getContext('2d');

const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: chartData,
    optiions : chartOptions
    
});
</script>    
