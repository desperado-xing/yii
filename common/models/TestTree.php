<?php
namespace common\models;
use Yii; 
use yii\helpers\Url;

class TestTree{

	public $arr = array();
	public $treeArr = [];
	public $num=1;

	 /**
	  * 生成树修饰符号
	  * @var [type]
	  */
    public $icon = ['│', '├', '└'];
    public $nbsp = '&nbsp;';

	public function __construct($arr){
		$this->arr = $arr;
	}
	/**
	 * 列表使用  
	 * @param  integer $pid   [description]
	 * @param  integer $level [description]
	 * @param  string  $adds  [description]
	 * @return [type]         [description]
	 */
	public function getTree($pid=0,$level=0,$adds=''){
		$num = 1;
		$child = $this->getChild($pid);
		if(empty($child)){return $this->treeArr;}
		$total = count($child);
		$level++;
		foreach($child as $key=>$val){
			$j = $this->icon[1];
            $k = $adds ? $this->icon[0] : '';
            if($num == $total) $j = $this->icon[2];
            $spacer = $adds ? $adds . $j : '';
			$val['level'] = $level;
			$val['name'] = $spacer.' '.$val['name'];
			$this->treeArr[$val['id']] = $val;

			$this->getTree($val['id'],$level,$adds.$k.$this->nbsp);
			$num++;
		}
         
        $str = $this->getTreeHtml($this->treeArr);
		return $str;
		//return $child;
	}
	/*public function getTree($data,$pId){
		$tree = [];
        foreach($data as $k => $v)
        { 
            if($v['pid'] == $pId)
            {        //父亲找到儿子
                $v['child'] = $this->getTree($data, $v['id']);
                $tree[] = $v;
                //unset($data[$k]);
            }
        }
        return $tree;
	}*/
	/**
	 * [getChild description]
	 * @param  [type] $pid [description] 0；
	 * @return [type]      [description]
	 */
	public function getChild($pid){
		$child = [];
		if(!empty($this->arr)){
			foreach ($this->arr as $key => $value) {
				if($value['pid'] == $pid){
					$child[$key] = $value;
					
				}
			}
		}
		return $child;
	}
	/**
	 * 获取树形菜单 HTml；
	 * @param  [type] $tree [description]
	 * @return [type]       [description]
	 */
	private function getTreeHtml($tree){
		
		//$treeHtml = [];
		$bigTree=""; 
		foreach ($tree as $key => $value) {
			$px = $value['level']*20;
			$str = ($value['pid']) ? ' class="child-of-node-' . $value['pid'] . '"' : '';
			$none = $value['level']==1?'':"style='display:none'"; 
			$bigTree.= "<tr id=\"node-".$value['id']."\" ".$str." ".$none." >";
			$bigTree.="<td style='padding-left:20px;'>";
			$bigTree.="<input type=\"text\" style=\"width: 50px\" class=\"input input-order \" value=\"".$value['sort']."\" > </div></td>";
			$bigTree.="<td>".$value['id']."</td>";
			$bigTree.="<td>".$value['name']."</td>";
			$bigTree.="<td>".$value['url']."</td>";
			$bigTree.="<td><a href='".Url::to(['menu/update','id'=>$value['id']])."' class='btn btn-primary btn-xs' >".Yii::t('backend','Update')."</a></td>";
			$bigTree.="</tr>";
		}
		return $bigTree;
	}
	public function getTreeSelect($pid=0,$level=0,$adds=""){
		$num=1;
		$child = $this->getChild($pid);
		if(empty($child)){return $this->treeArr;}
		$total = count($child);
		$level++;
		foreach ($child as $key => $val) {
			$j=$this->icon[1];
			$k = $adds ? $this->icon[0] : '';
            if($num == $total) $j = $this->icon[2];
            $spacer = $adds ? $adds . $j : '';
			//$val['level'] = $level;
			$val['name'] = $spacer.' '.$val['name'];
			$this->treeArr[$val['id']] = $val['name'];

			$this->getTreeSelect($val['id'],$level,$adds.$k.$this->nbsp);
			$num++;
		}
		return $this->treeArr;
	}
}






?>