   
$(document).ready(function() {
   	console.log("Dashboard Ready") 

   	resumenGuias()
});

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
    	$("#dashboardTransito").text( data.guias.transito)
    	$("#dashboardEntregadas").text( data.guias.entregadas)
    	$("#dashboardCanceladas").text( data.guias.canceladas)	
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
