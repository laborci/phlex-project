import PxInput from "../PxInput";

export default class Text extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.placeholder = '';
		this.type = 'text';
	}

	cfgPlaceholder(placeholder){
		this.placeholder = placeholder;
		return this;
	}

	cfgMultiline(rows = 5){
		this.type = 'multiline';
		this.multilineRows = rows;
		return this;
	}

	cfgEmail(){
		this.type = 'email';
		return this;
	}


	createControl(){
		if(this.type == 'multiline') {
			this.$control = $(`<textarea name="${this.field}" rows="${this.multilineRows}" class="form-control" placeholder="${this.placeholder}"></textarea>`);
		}else{
			this.$control = $(`<input type="${this.type}" name="${this.field}" class="form-control" placeholder="${this.placeholder}">`);
		}
		return this.$control;
	}
}
