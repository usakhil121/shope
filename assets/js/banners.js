var requestSent = false;

function reply_click(id) {
	$("#" + id).submit(function (event) {
        
    
		event.preventDefault();
		var result = true;
		$("." + id + "Input").css("border", "1px solid #d6d6d6");
		$(".select2").css("border", "1px solid #d6d6d6");
		$("." + id + "Input").each(function () {
			var textValues = $(this).val();
			var textnames = $(this).attr("id");
			if (textValues == "") {
				$("#" + textnames).css("border", "1px solid red");
				result = false;
			}
		});


		

		if (result == true) {
			if (id == "createBannerForm") {
				var geturl = "savebanner";
				var imgurl = "../../assets/images/loader.gif";
			} else {
				var geturl = "../updatebanner";
				var imgurl = "../assets/images/loader.gif";
			}
			

			if (!requestSent) {
                
				requestSent = true;
				$.ajax({
					url: geturl,
					method: "POST",
					data: $("#" + id).serialize(),
					beforeSend: function () {
						$("#messageModal").modal("show");
						$("#messageBody").html(
							"<img src='" + imgurl + "' class='loaderImg'>"
						);
					},
					success: function (data) {
                        alert('success');
						if (id == "createBannerForm") {
								$("#messageBody").html(
									"<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Saved</p>"
								);
                                setTimeout(function(){
                                    window.location = "banner";
                                 }, 1000);
						} else {

								$("#messageBody").html(
									"<p style='color:red;font-size:14px;text-align:center'>The Email already exists! Please provide another email ID</p>"
								);
								requestSent = false;
						}
					},
				});
			}
		}
	});
}


$(document).ready(function () {
    var baseUrl = window.location.origin+"/SparrowNew/admin/";
    // var baseUrl = document.getElementById(baseUrl);
    $('#bannersmanage').DataTable(
        {
            processing: true,
            serverSide: true,
            bInfo: true,
            bLengthChange: true,
            serverMethod: "post",
            ajax: {
              url: "getallBanners",
            },
        
            columns: [
              {
                data: "bannerName",
              },
              {
                data: "bannerImage",
                "render": function (data) {
                    
                    return '<img style="max-width:100px;" src="' + baseUrl + 'uploads/images/banners/' + data + '" />';

                }  ,
              },
              {
                data: function (row, type, set) {
                  if (row.bannerActive == "1") {
                    var checked = "checked=checked";
                  } else {
                    var checked = "";
                  }
                  return (
                    '&nbsp;<a href="updatebanner/' +
                    row.bannerId +
                    '"><i class="fa fa-edit small"></i></a>' +
                    '&nbsp;<a onclick="deletebanner(' +
                    row.bannerId +
                    ')" href=""><i class="fa fa-trash small"></i></a>' 
                  );
                },
              },
            ],
          }

    );
	// $("#bannersmanage").DataTable();
    $("#bannerImage").change(function () {
        //alert("Hello.. uploading...");
        var fd = new FormData();
        var formname = $("form").attr("name"); 
        if(formname == "bannerupdateForm"){
            var geturl = "../uploadbannerimage";
        var imgurl = "../../assets/images/loader.gif";
        } else {
            var geturl = "uploadbannerimage";
        var imgurl = "../../assets/images/loader.gif";
        }
        var files = $("#bannerImage")[0].files;
        fd.append("file", files[0]);

        var reader = new FileReader();
        // reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
        

        $.ajax({
            url: geturl,
            type: "post",
            data: fd,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#messageModal").modal("show");
                $("#messageBody").html("<img src='" + imgurl + "' class='loaderImg'>");
            },
            success: function (response) {
                if (response != 0) {
                    $("#bannerImageVal").val(response);
                    setTimeout(function () {
                        $("#messageModal").modal("hide");
                    }, 1000);
                } else {
                    alert("file not uploaded");
                }
            },
        });
    });

    

	
	//studentFile
});

function loadsavedData(id) {
	isLoading = false;
	$.ajax({
		url: "loadsavedData",
		method: "POST",
		data: { primeId: id },
		// dataType: "json",
		beforeSend: function () {
			$("#messageModal").modal("show");
			$("#messageBody").html(
				"<img src='../images/loader.gif' class='loaderImg'>"
			);
		},
		success: function (data) {
			$("#updateFormdiv").html(data);

			setTimeout(function () {
				$("#messageModal").modal("hide");
			}, 1000);
		},
	});
}
function changestatus(id){
	var geturl = "changestatus";
	// requestSent = true;
	var imgurl = "../assets/images/loader.gif";
					$.ajax({
						url: geturl,
						method: "POST",
						data: ({studentId: id}),
						beforeSend: function () {
							$("#messageModal").modal("show");
							$("#messageBody").html(
								"<img src='" + imgurl + "' class='loaderImg'>"
							);
						},
						success: function (data) {
							$("#messageBody").html(
								"<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Updated</p>"
							);
							requestSent = false;
							setTimeout(function(){
								window.location = "manage";
							 }, 1000);
							
						},
					});
	}
	function changespstatus(id){
		var geturl = "changespstatus";
		// requestSent = true;
		var imgurl = "../assets/images/loader.gif";
						$.ajax({
							url: geturl,
							method: "POST",
							data: ({ssId: id}),
							beforeSend: function () {
								$("#messageModal").modal("show");
								$("#messageBody").html(
									"<img src='" + imgurl + "' class='loaderImg'>"
								);
							},
							success: function (data) {
								$("#messageBody").html(
									"<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Updated</p>"
								);
								requestSent = false;
								setTimeout(function(){
									window.location = "sponsor";
								 }, 1000);
								
							},
						});
		}
	function deletebanner(id){
		var result = confirm("Want to delete?");
if (result) {

		var geturl = "deletebanner";
		// requestSent = true;
		var imgurl = "../assets/images/loader.gif";
						$.ajax({
							url: geturl,
							method: "POST",
							data: ({bannerId: id}),
							beforeSend: function () {
								$("#messageModal").modal("show");
								$("#messageBody").html(
									"<img src='" + imgurl + "' class='loaderImg'>"
								);
							},
							success: function (data) {
								$("#messageBody").html(
									"<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Deleted</p>"
								);
								requestSent = false;
								setTimeout(function(){
									window.location = "banner";
								 }, 1000);
								
							},
						});
		}
	}
	
