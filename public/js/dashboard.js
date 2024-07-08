 $(document).ready(function() {
   	console.log("Dashboard Ready") 

   	if ($('#myChart').length) {
        console.log("Inicializar myChart")
        resumenGuias()
        var table = null;  
    }

    if ($('#myChart3').length) {
        console.log("Inicializar myChart2")
        graficaUsoLtdAjax()
        
    }
   	
});

function graficaUsoLtdAjax(){
    $.ajax({
        url: route('api.dashboard.graficaUsoLtd'),
        type: 'GET',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        
    }).done(function( response) {
    	console.log( "graficaUsoLtdAjax done" );
    	var data = response.data
    	console.log(data)
    	
    	graficaLtdUso(data)

    }).fail( function( data,jqXHR, textStatus, errorThrown ) { 
    	console.error( "graficaUsoLtdAjax fail" );
    	console.log( textStatus );

    }).always(function() {
        console.log( "graficaUsoLtdAjax always" );
    });
}

function graficaLtdUso(data){

	var ejeXLabels = Object.keys(data.leyenda) ;

	var dataSetltdsMensual = Object.keys(data.dataSet);
		
	var ltdsMensual = [];
	dataSetltdsMensual.forEach(function(ltd) {

	    console.log(ltd)
	    console.log(data.dataSet[ltd]);

	    cantidaGuias = []
	    for (const [key, value] of Object.entries(data.dataSet[ltd])) {
		  //console.log(value);
		  cantidaGuias.push(value) ;
		}
	    ;
	    //fin 
	    
	    colores= configurarColoresPorLtd(ltd)
	    var setLtd = {
			label : ltd, 
			data : cantidaGuias,
            backgroundColor:colores['backDefault'],
            borderColor: colores['boderDefault'],
            borderWidth: 2
		}

		ltdsMensual.push(setLtd);

	});

	new Chart("myChart3", {
	  type: "bar",
	  data: {
	    labels: ejeXLabels,
	    datasets: ltdsMensual,
		},
	  options: {
	    legend: {display: false},
	    title: {
	      display: true,
	     
	    },
	    scales: {
	      y: {
	        beginAtZero: true
	      }
	    }
	  }
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
	//const ctx = document.getElementById('myChart').getContext('2d');
	const myChart = new Chart("myChart", {
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
	            borderWidth: 1,
	            cutout: '40%',
	            
	        }

	        ]
	    },
	    options: {
	    	maintainAspectRatio: false,
	        plugins: {
		      datalabels: {
		        formatter: (value) => {
		          return value + '%';
		        },
		      },
		    },

	    }
	});	
}

function configurarColoresPorLtd(ltd){

	var colores = []
	switch (ltd) {
	  case "FEDEX":
	    colores['backDefault'] =  [
		      'rgba(77, 20, 140, 0.4)',
		      'rgba(77, 20, 140, 0.4)',
		      'rgba(77, 20, 140, 0.4)',
		      
		    ];
		    
		colores['boderDefault'] = [
		      'rgb(77, 20, 140)',
		      'rgb(77, 20, 140)',
		      'rgb(77, 20, 140)',
		      
		    ];
	    break;
	  case "DHL":
	    colores['backDefault'] =  [
	     'rgba(255, 204, 0, 0.4)',
	      'rgba(255, 204, 0, 0.4)',
	      'rgba(255, 204, 0, 0.4)',
	      
	    ];

    
		colores['boderDefault'] = [
			'rgb(255, 204, 0)',
			'rgb(255, 204, 0)',
			'rgb(255, 204, 0)',
		];

	    break;

	  case "ESTAFETA":
	    
	    colores['backDefault'] =  [
		      'rgba(192, 13, 13, 0.4)',
		      'rgba(192, 13, 13, 0.4)',
		      'rgba(192, 13, 13, 0.4)',
		      
		    ];
		    
		colores['boderDefault'] = [
		      'rgb(192, 13, 13)',
		      'rgb(192, 13, 13)',
		      'rgb(192, 13, 13)',
		      
		    ];

	    break;
	  default:
	  	var barColors = ["red", "red","red"];
		var barColors1 = ["green", "green","green"];
	  	colores['backDefault'] = barColors;
		colores['boderDefault'] = barColors1;
	    
	    break;
	}

	return colores;
}
