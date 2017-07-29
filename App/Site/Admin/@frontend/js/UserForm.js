import Form from './PxAdmin/Form';
import Text from './PxAdmin/Input/Text';
import Link from './PxAdmin/Input/Link';
import Show from './PxAdmin/Input/Show';
import Select from './PxAdmin/Input/Select';
import Number from './PxAdmin/Input/Number';
import Checkboxes from './PxAdmin/Input/Checkboxes';

export default class UserForm extends Form {

	constructor($container) {
		super($container);
		this.titleField = 'name';
		this.serviceUrlPrefix = 'User';
		this.translate = true;
	}

	createFields() {
		this.fields = [
			new Text('id'),
			new Text('name'),
			new Text('email')
		];
	}

}