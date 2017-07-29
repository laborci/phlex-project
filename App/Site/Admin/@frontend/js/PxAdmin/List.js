import {translator} from "./Translator";

export default class List {

	constructor($container) {
		this.initialized = false;
		this.$container = $container;
		this.$formContainer = $('.box-form');

		this.createFields();

		this.sort = false;
		for (let field of this.fields) {
			if (this.sort === false && field.sortable) {
				this.sort = {field: field.id, order: 'asc'};
			}
		}

		this.page = 1;
		this.itemPerPage = 8;

		this.translation = false;
	}

	translate(subject){
		return translator.translate(subject, this.translation);
	}

	/**
	 * Activates the list
	 * @param reinitialize
	 */
	activate(reinitialize = false) {
		if (!this.initialized || reinitialize) {
			this.init();
		}
		this.$container.append(this.$panel);
	}

	/**
	 * Initializes the list (mostly on first activate)
	 */
	init() {
		this.buildUI();
		this.attachEventHandlers();
		this.getData();
		this.initialized = true;
	}

	/**
	 * Builds the UI
	 */
	buildUI() {

		this.$panel = this.createHtmlSkeleton();

		//this.$panel.find('.list-title').html(this.translate(this.listTitle));

		// Clear all rows of the table
		this.$panel.find('tr').remove();

		// Create the table headers
		let $tr = $('<tr></tr>');
		for (let field of this.fields) {
			let $th = $(`<th class="${field.colwidth}" data-field="${field.id}" i18n>${field.label}</th>`);
			if (field.headIcon) {
				$th.html(`<i class="fa ${field.headIcon}"></i>`)
			}
			if (field.sortable) {
				$th.addClass('sortable');
				$th.prepend('<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>');

				if (this.sort.field === field.id) {
					$th.addClass('sort-' + this.sort.order);
				}
			}
			$tr.append($th);
		}
		this.$panel.find('table thead').append(this.translate($tr));

	}

	/**
	 * Creates the lists html skeleton
	 * @returns {*|jQuery|HTMLElement}
	 */
	createHtmlSkeleton() {
		return this.translate($(`	
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="list-title"><i18n>users</i18n></span>
					<span class="pull-right" i18n>buttons</span>
				</div>
				<div class="panel-body" style="padding:0;">
					<table class="table" style="margin:0;">
						<thead></thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="panel-footer">
					<ul class="pagination pagination-sm" style="margin: 0"></ul>
				</div>
			</div>`));
	}

	/**
	 * Attaches all event handlers to the list
	 */
	attachEventHandlers(){
		this.$panel.find('ul.pagination').off('click');
		this.$panel.find('ul.pagination').on('click', 'a', (event) => this.pageClick(event));

		this.$panel.find('table tbody').off('click');
		this.$panel.find('table tbody').on('click', 'tr', (event) => this.actionClick(event));

		this.$panel.find('table thead th.sortable').click((event)=>this.tableHeadClick(event));

	}

	/**
	 * Handles sorting clicks
	 * @param event
	 */
	tableHeadClick(event) {
		let $clicked = $(event.currentTarget);
		let field = $clicked.data('field');
		if (this.sort.field === field) {
			this.sort.order = this.sort.order === 'asc' ? 'desc' : 'asc';
		} else {
			this.sort.order = 'asc';
		}
		this.sort.field = field;
		this.$panel.find('th').removeClass('sort-asc').removeClass('sort-desc');
		$clicked.addClass('sort-' + this.sort.order);
		this.getData();
	}

	/**
	 * Handles clicks occurend on the rows
	 * @param event
	 */
	actionClick(event) {
		new this.action(this.$formContainer).init($(event.currentTarget).data('id'));
	}

	/**
	 * Handles paging events
	 * @param event
	 */
	pageClick(event) {
		this.page = $(event.target).data('page');
		this.getData();
	}

	/**
	 * Creates and prepares one row
	 * @param row
	 * @returns {*|jQuery|HTMLElement}
	 */
	createTableRow(row) {
		return $(`<tr data-id="${row.id}"></tr>`);
	}

	/**
	 * Initializes an ajax call to get list data
	 */
	getData() {
		let params = {};
		params.order = this.sort;
		params.paging = {page: this.page, pageSize: this.itemPerPage};

		$.post('/'+this.serviceUrlPrefix+'/list', params, (response) => {
			this.applyData(response.result.list);
			this.buildPager(response.result.count);
		});
	}

	/**
	 * Inserts the list data into the table
	 * @param data
	 * @param append
	 */
	applyData(data, append = false) {
		if (append === false) {
			this.$panel.find('tbody tr').remove();
		}

		for (let row of data) {
			let $tr = this.createTableRow(row);
			for (let field of this.fields) {
				let $td = $('<td></td>');
				$td.html(field.getCellValue(row, field.id));
				field.decorateCell($td, row);
				$tr.append($td);
			}
			this.$panel.find('tbody').append($tr);
		}
	}

	/**
	 * Builds the pager control
	 * @param count
	 */
	buildPager(count) {
		let pages = Math.ceil(count / this.itemPerPage);
		this.$panel.find('ul.pagination li').remove();
		for (let i = 1; i <= pages; i++) {
			let $li = $(`<li><a href="#" data-page="${i}">${i}</a></li>`);
			if (i === this.page) $li.addClass('active');
			this.$panel.find('ul.pagination').append($li);
		}
	}
}

//module.exports = List;