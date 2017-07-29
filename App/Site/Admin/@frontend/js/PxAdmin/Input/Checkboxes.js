import PxInput from "../PxInput";
import {i18n} from "../I18n";

export default class Checkboxes extends PxInput{

	constructor(field, label = field) {
		super(field, label);
		this.options = [];
	}

	cfgOptions(options){
		this.options = options;
		return this;
	}

	createControl(){
		this.$control = $(`<div></div>`);
		return this.$control;
	}

	setValue(values, formdata){
		if(typeof this.options === 'string'){
			this.options = formdata[this.options]
		}

		for(let option of this.options){
			let $option = $(`<div class="checkbox"><label><input type="checkbox" value="${option.value}">${option.label}</label></div>`);
			if(option['disabled'] == true){
				$option.find('input').attr('disabled', true);
				$option.find('input').attr('selected', true);
			}
			if(!Array.isArray(values)){
				values = [values];
			}

			for(let value of values){
				if(value == option.value){
					$option.find('input').attr('checked', 'checked');
				}
			}
			this.$control.append($option);
		}
	}

}
