import {i18n} from "./I18n";

class Translator{
	translate(subject, translationNeeded = true){

		if(typeof subject === 'string'){
			if(translationNeeded) subject = i18n.translate(subject);
		}else {

			// search for i18n tags
			subject.find('i18n').each(function () {
				if(translationNeeded) {
					let text = $(this).text()
					$(this).text(i18n.translate(text));
				}
				$(this).replaceWith(this.childNodes);
			});

			// search for i18n attributes
			subject.find('[i18n]').each(function () {
				if(translationNeeded) {
					let text = $(this).text()
					$(this).text(i18n.translate(text));
				}
				$(this).removeAttr('i18n');
			});

		}
		return subject;

	}
}

export let translator = new Translator();
