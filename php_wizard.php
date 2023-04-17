
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Wizard Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" ></script >
	<style type="text/css">
	.step_2,.step_3,step_4 {
		display: none;
	}
	.progress-bar{
		background-color: #3adb76;
	}	
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-12">
				<h1><center>PHP Wizard</center></h1><br>
				<div class="progress">
							<div class="progress-bar bg-warning" role="progressbar" id="progressbar" style="width: 30%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">33.33 %</div>
						</div><br>
				<form role="form" id="multi_form_user">
					<div class="box-body">

						<div class="step_1">
                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label for="verticalnav-firstname-input">Name Of Applicant</label>
                                                <input type="text" class="form-control" id="verticalnav-firstname-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label for="verticalnav-lastname-input">Applicant's Gender (M/F)</label>
                                                <input type="text" class="form-control" id="verticalnav-lastname-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label for="verticalnav-phoneno-input">BL No.</label>
                                                <input type="text" class="form-control" id="verticalnav-phoneno-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label for="verticalnav-email-input">Cell No. 2</label>
                                                <input type="email" class="form-control" id="verticalnav-email-input">
                                            </div>
                                            <div class="mb-1">
                                                <label for="verticalnav-email-input">Cell No. 1</label>
                                                <input type="email" class="form-control" id="verticalnav-email-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label for="verticalnav-address-input">Plot No.</label>
                                                <input type="text" class="form-control" id="verticalnav-phoneno-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label for="verticalnav-address-input">Admin Post</label>
                                                <input type="text" class="form-control" id="verticalnav-phoneno-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label for="verticalnav-address-input">Locality</label>
                                                <input type="text" class="form-control" id="verticalnav-phoneno-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-1">
                                                <label for="verticalnav-address-input">Nearest School Or Well Known Landmark</label>
                                                <input type="text" class="form-control" id="verticalnav-phoneno-input">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>

							<div class="box-footer">
								<button type="button" id="next_1" class="btn btn-danger">Next</button>
							</div>
						</div>

						<div class="step_2">

                            <section>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-1">
                                                <p style="color:blue">Select ONE of the THREE:</p>
                                                <input type="radio" id="homeowner_no_tenant" name="hh_status" value="01">
                                                <label for="homeowner_no_tenant">Home Owner (No Tenant)</label><br>
                                                <input type="radio" id="resident_landlord" name="hh_status" value="02">
                                                <label for="resident_landlord">Resident Landlord</label><br>
                                                <input type="radio" id="absent_landlord" name="hh_status" value="03">
                                                <label for="absent_landlord">Absent Landlord</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-1">

                                                <p style="color:blue">Fill accordingly:</p>
                                                <input type="text" id="no_pple" name="no_pple" style="width:10%" disabled>
                                                <label for="no_pple"></label><br>

                                                <input type="text" id="no_pple" name="no_pple" style="width:10%">
                                                <label for="no_pple">No. Rooms Rented</label><br>

                                                <input type="text" id="no_pple" name="no_pple" style="width:10%">
                                                <label for="no_pple">No. Rooms Rented</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-1">

                                                <p style="color:blue">Current Toilet Type:</p>
                                                <input type="radio" id="homeowner_no_tenant" name="current_toilet_type" value="01">
                                                <label for="homeowner_no_tenant">Unlined Pit Latrine</label><br>

                                                <input type="radio" id="resident_landlord" name="current_toilet_type" value="02">
                                                <label for="resident_landlord">Semi-lined Pit Latrine</label><br>

                                                <input type="radio" id="absent_landlord" name="current_toilet_type" value="03">
                                                <label for="absent_landlord">Fully Lined Pit Latrine</label><br>

                                                <input type="radio" id="absent_landlord" name="current_toilet_type" value="04">
                                                <label for="absent_landlord">None</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-1">

                                                <p style="color:white">Current Toilet Type:</p>
                                                <input type="radio" id="homeowner_no_tenant" name="current_toilet_type" value="05">
                                                <label for="homeowner_no_tenant">VIP (Lined with vent pipe)</label><br>

                                                <input type="radio" id="resident_landlord" name="current_toilet_type" value="06">
                                                <label for="resident_landlord">Pour Flash + Septic Tank</label><br>

                                                <input type="radio" id="absent_landlord" name="current_toilet_type" value="07">
                                                <label for="absent_landlord">Flush Flush + Septic Tank</label><br>

                                                <input type="radio" id="absent_landlord" name="current_toilet_type" value="08">
                                                <label for="absent_landlord">Dont Know Type</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <input type="text" id="no_pple" name="no_pple" style="width:10%">
                                                <label for="no_pple">Total No Of people living at the premises</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="mb-1">
                                                <input type="text" id="no_pple" name="no_pple" style="width:8%">
                                                <label for="no_pple">Adult Males</label>

                                                <input type="text" id="no_pple" name="no_pple" style="width:8%">
                                                <label for="no_pple">Adult Females</label>

                                                <input type="text" id="no_pple" name="no_pple" style="width:8%">
                                                <label for="no_pple">Children Under 5 Years</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                
                            </section>

							<div class="box-footer">
								<button type="button" id="previous_2" class="btn btn-primary">Previous</button>
								<button type="button" id="next_2" class="btn btn-warning">Next</button>
							</div>
						</div>

                        

						<div class="step_4">

							<div class="form-group">
								<label for="name1">Password :-</label>
								<input type="text" class="form-control" id="password" name="password" placeholder="Password">
							</div><br>

							<div class="form-group">
								<label for="name1">Confirm Password :-</label>
								<input type="text" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
							</div><br>

							<div class="box-footer">
								<button type="button" id="previous_3" class="btn btn-success">Previous</button>
								<button type="button" id="save_input" class="btn btn-info">Submit</button>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).on('click','#next_1',function(){
		$('.step_2').show();
		$('.step_1').hide();
		$('#progressbar').css('width','65%');
		$('#progressbar').text('66.66 %');
	});
	$(document).on('click','#previous_2',function(){
		$('.step_1').show();
		$('.step_2').hide();
        $('.step_4').hide();
		$('#progressbar').css('width','30%');
		$('#progressbar').text('33.33 %');
	});
	$(document).on('click','#next_2',function(){
		$('.step_3').show();
		$('.step_2').hide();
        $('.step_4').hide();
		$('#progressbar').css('width','100%');
		$('#progressbar').text('100%');
	});
	$(document).on('click','#previous_3',function(){
		$('.step_3').hide();
		$('.step_2').show();
		$('#progressbar').css('width','65%');
		$('#progressbar').text('65%');
	});
    $(document).on('click','#next_3',function(){
		$('.step_4').show();
		$('.step_3').hide();
		$('#progressbar').css('width','100%');
		$('#progressbar').text('100%');
	});
</script>
?>