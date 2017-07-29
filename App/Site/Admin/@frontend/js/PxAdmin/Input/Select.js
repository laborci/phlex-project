import PxInput from "../PxInput";
import {i18n} from "../I18n";

export default class Select extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.placeholder = '';
		this.options = [];
	}

	cfgOptions(options){
		this.options = options;
		return this;
	}

	cfgChooseOption(option, value = 0, disabled = true){
		this.chooseOption = option;
		this.chooseOptionValue = value;
		this.chooseOptionDisabled = disabled;
		return this;
	}

	cfgNoneOption(option, value = 0){
		this.noneOption = option;
		this.noneOptionValue = value;
		return this;
	}

	createControl(){
		this.$control = $(`<select name="${this.field}" class="form-control"></select>`);
		return this.$control;
	}

	setValue(value, formdata){
		if(typeof this.options === 'string'){
			this.options = formdata[this.options]
		}

		if(this.chooseOption){
			this.options.unshift({label: '-- '+this.chooseOption+' --', value: this.chooseOptionValue, disabled: this.chooseOptionDisabled});
		}

		if(this.noneOption){
			this.options.push({label: this.noneOption, value: this.noneOptionValue});
		}

		for(let option of this.options){
			let $option = $(`<option value="${option.value}">${option.label}</option>`);
			if(option['disabled'] == true){
				$option.attr('disabled', true);
				$option.attr('selected', true);
			}
			if(value == option.value){
				$option.attr('selected', 'selected');
			}
			this.$control.append($option);
		}
	}

	translate(){
		super.translate();
		if(this.chooseOption){
			this.chooseOption = i18n.translate(this.chooseOption);
		}
		if(this.noneOption){
			this.noneOption = i18n.translate(this.noneOption);
		}
	}
}
