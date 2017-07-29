<?php

namespace App\Site\Admin\Services;


use Phlex\Database\Request;
use Phlex\RedFox\Repository;
use Symfony\Component\HttpFoundation\ParameterBag;


abstract class AdminService {

	abstract protected function getRepository(): Repository;

	final protected function passThroughFields($item, $fields, $row = []){
		foreach ($fields as $passThroughField){
			$row[$passThroughField] = $item->$passThroughField;
		}
		return $row;
	}


	#region Form

	/**
	 * @param \Phlex\RedFox\Entity $item
	 * @return mixed
	 */
	protected function mapFormFields($item){
		return $item->getRawData();
	}

	public function getFormData(ParameterBag $requestParamBag): array{
		$result['formdata'] = $this->mapFormFields( $this->pickFormItem($requestParamBag) );
		return $result;
	}

	private function pickFormItem(ParameterBag $requestParamterBag){
		$id = $requestParamterBag->get('id');
		$item = $this->getRepository()->pick($id);
		return $item;
	}



	#endregion


	#region List

	/**
	 * @param \Phlex\RedFox\Entity $item
	 * @return mixed
	 */
	protected function mapListFields($item){
		return $item->getRawData();
	}

	protected function buildListFilter($filters){ return null; }

	public function getList(ParameterBag $requestParamBag): array{
		$result['list'] = $this->extractListData( $this->collectListItems($requestParamBag, $count) );
		$result['count'] = $count;
		return $result;
	}


	final private function collectListItems(ParameterBag $requestParamBag, &$count = null){
		$request = $this->getRepository()->getSourceRequest($this->buildListFilter($requestParamBag->get('filter')));
		$this->applyListOrder($request, $requestParamBag->get('order'));
		$paging = $requestParamBag->get('paging');

		if($paging){
			$result = $request->collectPage($paging['pageSize'], $paging['page'], $count);
		}else{
			$result = $request->collect();
		}

		return $result;
	}


	final private function applyListOrder(Request $request, $sorting){
		if($sorting) {
			$request->order($sorting['field'].' '.$sorting['order']);
		}
	}

	private function extractListData($items){
		$data = [];
		foreach($items as $item){
			$data[] = $this->mapListFields($item);
		}
		return $data;
	}

	#endregion

}
