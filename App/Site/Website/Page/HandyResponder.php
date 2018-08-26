<?php

namespace App\Site\Website\Page;

use Phlex\Chameleon\SmartPageResponder;
use zpt\anno\Annotations;

abstract class HandyResponder extends SmartPageResponder {

	protected $classAnnotations;

	protected function customtagNamespace() { return 'App.Site.Website.Customtag'; }
	protected function distFolder() { return '/dist/www/'; }

	protected function prepareParser() {
		$reflector = new \ReflectionClass($this);
		$this->classAnnotations = (new Annotations($reflector))->asArray();
	}

	protected function HEAD(){
		parent::HEAD();
		if ($this->classAnnotations['css']) {
			if (!is_array($this->classAnnotations['css'])) $this->classAnnotations['css'] = [$this->classAnnotations['css']];
			foreach($this->classAnnotations['css'] as $css){
				echo '<link rel="stylesheet" type="text/css" href="'.$this->distFolder().$css.'.css" />'."\n";
			}
		}
		if ($this->classAnnotations['js']) {
			if (!is_array($this->classAnnotations['js'])) $this->classAnnotations['js'] = [$this->classAnnotations['js']];
			foreach($this->classAnnotations['js'] as $js){
				echo '<script src="'.$this->distFolder().$js.'"></script>'."\n";
			}
		}
		if ($this->classAnnotations['jsappmodule']) {
			if (!is_array($this->classAnnotations['jsappmodule'])) $this->classAnnotations['jsappmodule'] = [$this->classAnnotations['jsappmodule']];
			echo '<script src="'.$this->distFolder().'app.js" modules="'.join(' ', $this->classAnnotations['jsappmodule']).'"></script>'."\n";
		}
	}
}