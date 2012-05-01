;jQuery(function($) {
	
	
////////////////////Detail Form
	
	if( $('#ComplexTableField_Popup_DetailForm_RedirectionType_Internal').is(':checked'))
	{
		//hide external input
		$('#ExternalURL').hide();
	}
	else if ( $('#ComplexTableField_Popup_DetailForm_RedirectionType_External').is(':checked'))
	{
		//hide internal input
		$('#LinkToID').hide();
	}

	
	$('#ComplexTableField_Popup_DetailForm_RedirectionType_Internal').change(function() {
		
		$('#ExternalURL').hide();
		$('#LinkToID').show();
		
		
	});
	
	$('#ComplexTableField_Popup_DetailForm_RedirectionType_External').change(function() {
		
		$('#ExternalURL').show();
		$('#LinkToID').hide();
		
	});
	
//////////////////////////////
	
//////////////////////Add Form
	
	if( $('#ComplexTableField_Popup_AddForm_RedirectionType_Internal').is(':checked'))
	{
		//hide external input
		$('#ExternalURL').hide();
	}
	else if ( $('#ComplexTableField_Popup_AddForm_RedirectionType_External').is(':checked'))
	{
		//hide internal input
		$('#LinkToID').hide();
	}

	
	$('#ComplexTableField_Popup_AddForm_RedirectionType_Internal').change(function() {
		
		$('#ExternalURL').hide();
		$('#LinkToID').show();
		
		
	});
	
	$('#ComplexTableField_Popup_AddForm_RedirectionType_External').change(function() {
		
		$('#ExternalURL').show();
		$('#LinkToID').hide();
		
	});

}); 