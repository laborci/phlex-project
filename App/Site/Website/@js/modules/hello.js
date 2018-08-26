import AppModuleManager from "phlex-app-module-manager";

@AppModuleManager.registerModule
class Hello{
	static init(){
		console.log('Hello!');
	}
}
