import PxInput from "../PxInput";

export default class Number extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.placeholder = '';
		this.type = 'text';
		this.range = {min: null, max: null};
	}

	cfgPlaceholder(placeholder){
		this.placeholder = placeholder;
		return this;
	}

	cfgMin(min){
		this.range.min = min;
		return this;
	}

	cfgMax(max){
		this.range.max = max;
		return this;
	}

	cfgFloat(){
		this.type = 'float';
		return this;
	}

	setValue(value) {
		this.$control.val(value);
		this.$control.data('prev-value', value);
		if( this.checkValue() === false ) this.$control.val('');
		this.checkRange();
	}

	createControl(){
		this.$control = $(`<input type="${this.type}" name="${this.field}" class="form-control" placeholder="${this.placeholder}">`);
		this.$control.bind('input propertychange', (e)=>{
			this.$control.val($.trim(this.$control.val()));
			let value = this.checkValue()
			if(value !== false){
				this.$control.val(value);
				this.$control.data('prev-value', this.$control.val());
				this.checkRange();
			}else{
				this.$control.val(this.$control.data('prev-value'));
			}
		});
		return this.$control;
	}

	checkValue(){
		let newValue = this.$control.val();
		if(newValue === '') return newValue;
		let validValue = this.type == 'float' ? parseFloat(newValue) : parseInt(newValue);
		if( newValue != validValue) return false;
		return validValue;
	}

	checkRange(){
		if(this.range.min || this.range.max){
			this.$control.css('color', 'green');
			if(this.range.min && this.$control.val() < this.range.min){
				this.$control.css('color', 'red');
			}
			if(this.range.max && this.$control.val() > this.range.max){
				this.$control.css('color', 'red');
			}

		}
	}

}
