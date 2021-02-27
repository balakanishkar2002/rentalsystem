$(document).ready(function() {
	//init Tabs
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	//mail-list-carousel
	$('.mail-list-carousel').carousel({
		interval: 0
	});

	//hide-block
	$('.hide-devices').click(function() {
		$('.tabs .tab-content').toggle('slow', function() {
			if($('.hide-block').text() == 'Hide'){
				$('.hide-block').text('Show');
			} else {
				$('.hide-block').text('Hide');
				$('.hide-devices').toggleClass('devices-close');
			};
		});

	});

    //validate Communication Interval on manage/storeupdate/ when form submit
    $('#store-form').submit(function(){
        var communicationInterval = $("#Facility_communicationInterval option:selected").text();
        var meterInterval = $("#Facility_meterInterval option:selected").text();
        if(parseInt(meterInterval) > parseInt(communicationInterval)){
            $('#Facility_communicationInterval_em_').html('Communication Interval can\'t be less then Meter interval').show();
            $('#Facility_communicationInterval').addClass('error');
            return false;
        }
    });

    //validate Communication Interval on manage/storeupdate/ when change Communication Interval value
    $('#Facility_communicationInterval, #Facility_meterInterval').change(function(){
        var communicationInterval = $("#Facility_communicationInterval option:selected").text();
        var meterInterval = $("#Facility_meterInterval option:selected").text();
        if(parseInt(meterInterval) <= parseInt(communicationInterval)){
            $('#Facility_communicationInterval_em_').html('').hide();
            $('#Facility_communicationInterval').removeClass('error');
        }
    });
});