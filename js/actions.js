
$(document).ready( function () {
	
    $('#table_id').DataTable();
	$('#table_id2').DataTable();
	 
	$(".addBPPre" ).click(function() {
		var id = $(this).data('id');
		var Name = $(this).data('name');
		
		$(".ID").val(id);
		$(".Name").val(Name);
	}); 
	
	$(".addWeightPre" ).click(function() {
		var id = $(this).data('id');
		var Name = $(this).data('name');
		
		$(".ID").val(id);
		$(".Name").val(Name);
	}); 
	
	$(".addLMPPre" ).click(function() {
		var id = $(this).data('id');
		var Name = $(this).data('name');
		
		$(".ID").val(id);
		$(".Name").val(Name);
	});
	
	$(".addWeight" ).click(function() {
		var id = $(this).data('id');
		var Name = $(this).data('name');
		
		$(".ID").val(id);
		$(".Name").val(Name);
	}); 
	$(".addImmu" ).click(function() {
		var id = $(this).data('id');
		var Name = $(this).data('name');
		
		$(".ID").val(id);
		$(".Name").val(Name);
	});
	
	$(".ViewImmunization" ).click(function() {
		var InfantID = $(this).data('result');
		 window.location.href='viewimmunization.php?InfantID='+InfantID;
	}); 
	$(".ViewWeight" ).click(function() {
		var InfantID = $(this).data('result');
		 window.location.href='viewweight.php?InfantID='+InfantID;
	});
	
	
	$(".ViewWeightPre" ).click(function() {
		var PrenatalID = $(this).data('result');
		 window.location.href='viewweightprenatal.php?PrenatalID='+PrenatalID;
	});
	
	$(".ViewLMPPre" ).click(function() {
		var PrenatalID = $(this).data('result');
		 window.location.href='viewlmpprenatal.php?PrenatalID='+PrenatalID;
	});
	$(".ViewBPPre" ).click(function() {
		var PrenatalID = $(this).data('result');
		 window.location.href='viewbpprenatal.php?PrenatalID='+PrenatalID;
	});
	
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
	
	$(".EditInfantWeight" ).click(function() {
		
		var id 			= $(this).data('id');
		var age			= $(this).data('age');	
		var weight		= $(this).data('weight')	;	
		var weightstatus= $(this).data('weightstatus');
		var month		= $(this).data('month');		
		var year		= $(this).data('year');	
		var infantid		= $(this).data('infantid');	
		
		$(".ID").val(id);
		$(".InfantID").val(infantid);
		$(".Age").val(age);
		$(".Weight").val(weight);
		$(".WeightStatus").val(weightstatus);
		$(".Month").val(month);
		$(".Year").val(year);  
	});
	
	$(".EditInfantImmu" ).click(function() {
		
		var id 			= $(this).data('id');
		var date		= $(this).data('date');	
		var immu		= $(this).data('immu') 	
		var infantid	= $(this).data('infantid');	
		
		$(".ID").val(id);
		$(".InfantID").val(infantid);
		$(".Date").val(date);
		$(".Immunization").val(immu); 
	});
	
	$(".EditPrenatalWeight" ).click(function() {
		
		var id 			 = $(this).data('id'); 
		var weight		 = $(this).data('weight')	;	
		var weightstatus = $(this).data('weightstatus');
		var date		 = $(this).data('date'); 
		var prenatalid	 = $(this).data('prenatalid');	
		
		$(".ID").val(id);
		$(".PrenatalID").val(prenatalid); 
		$(".Weight").val(weight);
		$(".WeightStatus").val(weightstatus);
		$(".Date").val(date); 
	});
	
	$(".EditPrenatalLMP" ).click(function() {
		
		var id 			 = $(this).data('id'); 
		var time		 = $(this).data('time')	; 
		var date		 = $(this).data('date'); 
		var prenatalid	 = $(this).data('prenatalid');	
		
		$(".ID").val(id);
		$(".PrenatalID").val(prenatalid); 
		$(".Time").val(time); 
		$(".Date").val(date); 
	});
	
	$(".EditPrenatalBP" ).click(function() {
		
		var id 			 = $(this).data('id'); 
		var bp		     = $(this).data('bp')	; 
		var bpstatus	 = $(this).data('bpstatus')	; 
		var date		 = $(this).data('date'); 
		var prenatalid	 = $(this).data('prenatalid');	
		
		$(".ID").val(id);
		$(".PrenatalID").val(prenatalid); 
		$(".BP").val(bp); 
		$(".BPStatus").val(bpstatus);  
		$(".Date").val(date); 
	});
}); 