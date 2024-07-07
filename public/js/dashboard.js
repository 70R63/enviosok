 $(document).ready(function() {
   	console.log("Dashboard Ready") 

   	if ($('#myChart').length) {
        console.log("Inicializar myChart")
        resumenGuias()
        var table = null;  
    }

    if ($('#myChart2').length) {
        console.log("Inicializar myChart2")
        graficaLtdMensual()
        
    }
   	
});


function graficaLtdMensual(){
	var chartDataLtdMensual =  {
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

	var chartOptionsLtdMensual =  {
			scales: {
	            y: {
	                beginAtZero: true
	            }
	        },
	        plugins: {
	            legend: {
	                display: true,
	                
	            }
	        }
	    }

	const ctx2 = document.getElementById('myChart2').getContext('2d');

	const myChart2 = new Chart(ctx2, {
	    type: 'bar',
	    data: chartDataLtdMensual,
	    options : chartOptionsLtdMensual
	    
	});
}
 


function resumenGuias(){
    $.ajax({

        url: route('api.dashboard.resumenGuias'),
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        
    }).done(function( response) {
    	console.log( "done" );
    	var data = response.data
    	console.log(data)
    	
    	$("#dashboardCreadas").text( data.guias.creadas)
    	$("#dashboardRecolectadas").text( data.guias.recolectadas)	
    	$("#dashboardTransito").text( data.guias.transito)
    	$("#dashboardEntregadas").text( data.guias.entregadas)
    	$("#dashboardPromedio").text( data.saldo.promedio)
    	$("#dashboardActual").text( data.saldo.actual)

    	graficaTotal(data.graficasTotales)

    }).fail( function( data,jqXHR, textStatus, errorThrown ) { 
    	console.error( "fail" );
    	console.log( textStatus );

    }).always(function() {
        console.log( "resumenGuias always" );
    });
}

function graficaTotal(dataGraficos){
	const ctx = document.getElementById('myChart').getContext('2d');
	const myChart = new Chart(ctx, {
	    type: 'doughnut',
	    data: {
	        labels: dataGraficos.ejex,
	        datasets: [{
	            
	            data: dataGraficos.contador,
	            backgroundColor: [
	            	'rgb(255, 99, 132)',
				    'rgb(54, 162, 235)',
				    'rgb(255, 205, 86)'
	            ],
	            borderWidth: 1
	            , hoverOffset: 4
	        }

	        ]
	    },
	    options: {
	        scales: {
	            y: {
	                beginAtZero: true
	            }
	        }
	    }
	});	
}


