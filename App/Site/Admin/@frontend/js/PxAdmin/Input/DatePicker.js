let PxInput = require("../PxInput");

class DatePicker extends PxInput{

	constructor(field, label = field) {
		super(field, label);
	}



	createControl(){
		console.log('hello')
		this.$control = $(`<input name="${this.field}" class="form-control"/>`);
		this.$control.datepicker({
			language: 'en',
			firstDay: 1,
			dateFormat: 'yyyy.mm.dd.',
			timePicker: true,
			timeFormat: 'hh:ii'
		});
		return this.$control;
	}
}


module.exports = DatePicker;