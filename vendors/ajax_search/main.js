$(document).ready(function(){

	$("#search").keyup(function(){
		self = this;

		var search = $(this).val(); // on récupère la valeur de notre champ
		var data = 'data=' + search;

		if(search.length>0){


			$.ajax({
					type: 'GET',
					url: 'response.php',
					data : data,

					// si la requete réussi
					success: function(server_response){
						$('#result').html(server_response).show();

				
					}

			});


		}



	});


});