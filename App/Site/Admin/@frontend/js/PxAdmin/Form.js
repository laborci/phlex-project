export default class Form{
	constructor($container){
		this.$container = $container;
		this.$panel = this.createHtmlSkeleton();
		this.inputs = [];
		this.titleField = 'id';
	}

	addInput(control){
		this.$panel.find('.controls').append( control.createRow() );
		this.inputs.push(control);
	}

	createHtmlSkeleton() {
		return $(`	
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="form-title"></span>
					<span class="pull-right">
						<button class="button"><i class="fa fa-save"></i></button>
						<button class="button"><i class="fa fa-times"></i></button>
					</span>
				</div>
				<div class="panel-body">
					<form class="controls">
					
					</form>
				</div>
				<div class="panel-footer">
				</div>
			</div>`);
	}


	init(id){
		this.buildForm();

		$.post('/'+this.serviceUrlPrefix+'/form', {id: id}, (response)=>{
			this.setValues(response.result.formdata);
			this.$container.fadeOut('fast', ()=>{
				this.$container.html('');
				this.$container.append(this.$panel);
				this.$container.fadeIn('fast');
			});
		});
	}

	setValues(formdata){
		this.$panel.find('.form-title').html(formdata[this.titleField]);
		for( let input of this.inputs ){
			input.setValue(formdata[input.field], formdata);
		}
	}

	buildForm() {
		this.createFields();
		for(let field of this.fields){
			if(this.translate) field.translate();
			this.addInput(field);
		}
	}


}