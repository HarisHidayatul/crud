$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});

    // $('#formsubmit').submit(function(){
    //     alert("TES"); // show response from the php script.
    //     $.ajax({
    //         url: '/inputData',
    //         type:"POST",
    //         data: $(this).serialize(),             
    //         success: function(data) {               
    //         }
    //     })
    // });

	// $('#formsubmit').on('submit',function(e){
	// 	// alert('ok');
    //     // e.preventDefault();
    //     let name = $('#name').val();
    //     let email = $('#email').val();
    //     let address = $('#address').val();
    //     let phone = $('#phone').val();
	// 	// console.log(name);
	// 	// console.log(email);
	// 	// console.log(address);
	// 	// console.log(phone);
    //     $.ajax({
    //        url: 'inputData',
    //       type:"GET",
    //       data:{
    //         name:name,
    //         email:email,
    //         address:address,
    //         phone:phone,
    //       },
    //       success:function(response){
	// 		// alert('Success'+response);
    //         // console.log(response);
    //         if (response) {
              
    //         }
	// 		window.close();
    //       },
	// 	  error: function(response) {
	// 		console.log(e);
	// 		console.log(response);
	// 	  }
	// 	})
	// }
	// )
});