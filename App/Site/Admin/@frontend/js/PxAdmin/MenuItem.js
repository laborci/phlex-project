export default class MenuItem {

	constructor(title, actionHandler = null) {
		this.title = title;
		this.actionHandler = actionHandler;
		this.clickable = this.createClickable();
		this.clickable.prop('menuItem', this)
	}

	action() {
		if (this.actionHandler === null) {
			console.log(`${this.title} was clicked!`);
		} else {
			this.actionHandler();
		}
	}

	createClickable() {
		return $(`<li><a href="#">${this.title}</a></li>`).click( ()=> this.action() );
	}

}
