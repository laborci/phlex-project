import './bower/bootstrap';

let Page = {

	init: function(){
		$('button')
				.click( () => this.loginAction() );
	},

	loginAction: function(){
		let data = {
			login: $('[name=login]').val(),
			password: $('[name=password]').val()
		};

		$.post('/login', data)
				.done((response)=>{
					if(response.result){
						document.location.href = '/';
					}else{
						$('.wrong-password').slideDown();
					}
				});
	}
};

$(function(){ Page.init(); });
