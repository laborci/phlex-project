import MenuItem from "./MenuItem";
import ListMenuItem from "./ListMenuItem";
import {i18n} from "../PxAdmin/I18n";

export default class Admin{

	constructor(){
		this.translation = false;
	}

	addMenuItem(title, actionHandler){
		if(this.translation) title = i18n.translate(title);
 		let menuItem = new MenuItem(title, actionHandler);
 		let $clickable = menuItem.clickable;
 		$('nav.main ul.menu').append($clickable, this.translate);
	}

	addListMenuItem(title, actionHandler){
		if(this.translation) title = i18n.translate(title);
 		let menuItem = new ListMenuItem(title, actionHandler);
 		let $clickable = menuItem.clickable;
 		$('nav.main ul.menu').append($clickable, this.translate);
	}

}
