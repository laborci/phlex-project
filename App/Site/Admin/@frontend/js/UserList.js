
import List from "./PxAdmin/List";
import ListField from "./PxAdmin/ListField";
import UserForm from "./UserForm";

export default class UserList extends List {

	constructor($container) {
		super($container);
		this.serviceUrlPrefix = 'User';
		this.listTitle = 'users';
		this.action = UserForm;
		this.translation = true;
	}

	createFields() {
		this.fields = [
			new ListField('id', '#')
					.cfgSortable()
					.cfgMinCol(),
			new ListField('name')
					.cfgSortable(),
			new ListField('email')
		]
	}

}
