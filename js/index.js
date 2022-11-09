window.onload = (function(){
	var submitBtn = document.getElementById('submitBtn');
	var commentField = document.getElementById('commentField');

	submitBtn.onclick = function(){
		checkReport();
	}

	commentField.addEventListener("keypress", function(event) {
		// If the user presses the "Enter" key on the keyboard
		if (event.key === "Enter") {
		  // Cancel the default action, if needed
		  event.preventDefault();
		  // Trigger the button element with a click
		  submitBtn.click();
		}
	  });

	function checkReport(){
		var text = commentField.value;
		if (text.replace(/\s/g,'') == null || text.replace(/\s/g,'') == ''){
			alert('Report Field is Blank!');
		}else{
			if(confirm('Are you sure you want to submit this feedback?')){
				sendReport(text);
			}
		}
	}

	function sendReport(txt){
		console.log(txt)
		$.ajax({
			url: "https://ramnav.westeurope.cloudapp.azure.com/php/send_report.php",
			data: {report: txt},
			success: function(result){
				alert(result);
				window.location.replace("https://ramnav.westeurope.cloudapp.azure.com");
			}
		})
	}
})