import PxInput from "../PxInput";

export default class Link extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.placeholder = '';
		this.multiline = false;
	}


	createControl(){
		this.$control = $(`<div class="well"></div>`);
		return this.$control;
	}

	setValue(value) {
		this.$control.html(`<a href="${value}" target="_blank">${value}</a>`);
	}
}
