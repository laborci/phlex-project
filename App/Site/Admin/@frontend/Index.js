import './bower/bootstrap';
import './bower/fontawesome';
import './less/style.less';

import Admin from "./js/PxAdmin/Admin";
import UserList from "./js/UserList";

$(function (){
	let admin = new Admin();
	admin.translation = true;
	admin.addListMenuItem('users', UserList );
	// this is the way you should add menu item
});
