$(".transfer-form").submit(function (event) {
	event.preventDefault();
	var form_data = $(".transfer-form").serialize();

	formsubmit(form_data);

	function formsubmit(form_data) {
		$.ajax({
			url: "xf.php",
			type: "post",
			data: form_data
		}).done(function (response) {
			if (response.includes("success")) {
				response = "success";
			}
			if (response == "success") {
				$(".transfer-form").slideToggle();
				$(".transfer-success").slideToggle();
				setTimeout(function () {
					console.log("hoi");
					window.location = "./user.php";
				}, 3000);
			}
		});
	}
});
