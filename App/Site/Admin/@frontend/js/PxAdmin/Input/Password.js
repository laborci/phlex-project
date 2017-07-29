
import PxInput from "../PxInput";

export default class Password extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.placeholder = '';
	}

	cfgPlaceholder(placeholder){
		this.placeholder = placeholder;
		return this;
	}

	createControl(){
		this.$control = $(`<input type="password" name="${this.field}" class="form-control" placeholder="${this.placeholder}">`);
		return this.$control;
	}

	setValue(value){

	}
}
