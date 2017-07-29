import {i18n} from "./I18n";

export default class PxInput{
	constructor(field, label = field) {
		this.field = field;
		this.label = label;
		this.valid = true;
	}

	translate(){
		this.label = i18n.translate(this.label);
		if(typeof this.placeholder === 'string') this.placeholder = i18n.translate(this.placeholder);
	}

	createRow(){
		let $row = $(`<div class="form-group">
			<label>${this.label}</label>
		</div>`);
		$row.append(this.createControl());
		return $row;
	}

	setValue(value) {
		this.$control.val(value);
	}

}