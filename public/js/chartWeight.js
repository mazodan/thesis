$(document).ready(function(){
	var cwt = $("#wDist");

	var data = {
		labels: [],
		datasets: [{
			label: 'Patient Weight',
			data: [],
			fill: true,
			backgroundColor: 'rgba(0, 113, 252, 0.1)',
			borderColor: 'rgba(255, 0, 0, 0.1)'
		}]
	};

	var wchart = new Chart(cwt, {
		type: 'line',
		data: data,
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Distribution of Patients Weight'
			},
			scales: {
                    xAxes: [{
                        display: true,
                        type: 'linear',
                        position: 'bottom',
                        scaleLabel: {
                            display: true,
                            labelString: 'weight (kg)',
                            fontStyle: 'bold'
                        },
                        ticks: {
                        	callback: function(value, index, values) {
                                return parseFloat(value).toFixed(2);
                            },
                            autoSkip: true,
                            stepSize: 10
                        }
                    }],
                    yAxes: [{
                    	
                        display: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return parseFloat(value).toFixed(2);
                            },
                            autoSkip: true,
                             maxTicksLimit: 10,
                             stepSize: 1
                        }
                    }]
                }
		}
	});

	load_patient_weight();

	// Use Ajax to Populate Data
	function load_patient_weight() {
		$.ajax({
			url: "getPatientWeight",
			method: "GET",
			success: function (output) {
				output.forEach(function(item){
					var obj = {
						x: item.weight,
						y: item.freq
					};
					data.datasets[0].data.push(obj);
				});

				wchart.update();
			},
			error: function (error){
				alert(JSON.stringify(error));
			}
		});
	}
});