import MenuItem from "./MenuItem";

export default class ListMenuItem extends MenuItem{

	constructor(title, actionHandler){
		super(title, actionHandler);
		this.list = null;
	}

	action() {
		if(this.list === null){
			let $container = $('.box-list');
			this.list = new this.actionHandler( $container );
		}
		this.list.activate();
	}

}
