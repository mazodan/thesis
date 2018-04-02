$(document).ready(function(){
	var cage = $("#ageDist");

	var data = {
		labels: [],
		datasets: [{
			label: 'Patient Age',
			data: [],
			fill: true,
			backgroundColor: 'rgba(0, 113, 252, 0.1)',
			borderColor: 'rgba(255, 0, 0, 0.1)'
		}]
	};

	var achart = new Chart(cage, {
		type: 'line',
		data: data,
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Distribution of Patients age'
			},
			scales: {
                    xAxes: [{
                        display: true,
                        type: 'linear',
                        position: 'bottom',
                        scaleLabel: {
                            display: true,
                            labelString: 'age',
                            fontStyle: 'bold'
                        },
                        ticks: {
                            autoSkip: true,
                            stepSize: 1
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

	load_patient_age();

	// Use Ajax to Populate Data
	function load_patient_age() {
		$.ajax({
			url: "getPatientAge",
			method: "GET",
			success: function (output) {
				output.forEach(function(item){
					var obj = {
						x: item.age,
						y: item.freq
					};

					data.datasets[0].data.push(obj);
				});

				achart.update();
			},
			error: function (error){
				alert(JSON.stringify(error));
			}
		});
	}
});