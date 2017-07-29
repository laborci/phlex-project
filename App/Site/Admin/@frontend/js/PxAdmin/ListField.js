export default class ListField{
	constructor(id, label = id){
		this.id = id;
		this.label = label;
		this.colwidth = '';
		this.headIcon = false;
	}

	getCellValue(row, fieldId){
		return row[fieldId];
	}

	decorateCell($td, row){
		return $td;
	}

	cfgCellValueTransformator(transformator){
		this.getCellValue = transformator;
		return this;
	}

	cfgCellDecorator(decorator){
		this.decorateCell = decorator;
		return this;
	}

	cfgImage(width, height = width, cls="img-circle"){
		this.cfgCellValueTransformator( (row) => '<img src="'+row.avatar+'" class="'+cls+'" style="width:'+width+'px; height:'+height+'px;">' );
		return this;
	}

	cfgCircleImage(width, height=width) {
		this.cfgImage(width, height, "img-circle");
		return this;
	}

	cfgMinCol(){
		this.colwidth = 'min';
		return this;
	}

	cfgMaxCol(){
		this.colwidth = 'max';
		return this;
	}

	cfgSortable(){
		this.sortable = true;
		return this;
	}

	cfgHeaderIcon(icon){
		this.headIcon = icon;
		return this;
	}

}
