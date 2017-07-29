class I18n{

	constructor(){
		this.lang = $('html').attr('lang');
		this.init(this.lang);
	}

	translate(key){
		if(key === '') return '';
		if(typeof this.dictionary[key] !== 'string'){
			console.warn(`I18n warning: Key <${key}> not found in <${this.lang}>`);
			return key;
		}
		return this.dictionary[key];
	}

	init(){
		this.dictionary = {
			id: 'Id',
			'your@email.address': 'email@cím.hu',
			email: 'E-mail',
			users: 'Felhasználók',
			articles: 'Cikkek',
			Img: 'Kép',
			regDate: 'Regisztráció dátuma',
			'#': '#',
			name: 'Név',
			boss: 'Főnök',
			'Choose one!': 'Válasszon!',
			'none': 'egyik sem'
		}
	}

}

export let i18n = new I18n();
