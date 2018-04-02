$(document).ready(function(){
// Jquery selector for new patient Chart
	var cnpt = $("#newPatients");
	
	var data = {
		labels: [],
		datasets: [{
			label: 'Patient Frequency',
			data: [],
			fill: false,
			backgroundColor: 'rgba(0, 113, 252, 0.1)',
			borderColor: 'rgba(0, 113, 252, 0.1)'
		}]
	};

			
	
	var pchart = new Chart(cnpt, {
		type: 'line',
		data: data,
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'No. of Patients for the last 30 days'
			},
			scales: {
				xAxes: [{
					type: 'time',
					time: {
						displayFormats: {
							'millisecond': 'MMM DD',
        	    			'second': 'MMM DD',
        	    			'minute': 'MMM DD',
        	    			'hour': 'MMM DD',
        	    			'day': 'MMM DD',
        	    			'week': 'MMM DD',
        	    			'month': 'MMM DD',
        	    			'quarter': 'MMM DD',
        	    			'year': 'MMM DD',
						}
					}
				}]
			}
		}
	});

	load_patient_freq();
			

	// Use Ajax to Populate Data
	function load_patient_freq() {
		$.ajax({
			url: "getPatientFreq",
			method: "GET",
			success: function (output) {
				console.log(output);
				output.forEach(function(item){
					data.labels.push(item.date);
					data.datasets[0].data.push(item.freq);
				});

				pchart.update();
			},
			error: function (error){
				alert(JSON.stringify(error));
			}	
		});
	}
});