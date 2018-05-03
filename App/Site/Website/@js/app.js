"use strict";

import Hello from "./modules/hello";

(function(){
	let availableModules = {
		Hello: Hello
	}

	let modules = document.currentScript.getAttribute('modules').split(' ');
	$(function(){
		for(let module of modules){
			availableModules[module].init();
		}
	});
})();

