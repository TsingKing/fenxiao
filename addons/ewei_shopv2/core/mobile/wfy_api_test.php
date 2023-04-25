<?php
// if (!(defined('IN_IA'))) {
	// exit('Access Denied');
// }

class wfy_api_EweiShopV2Page extends MobilePage
{
	
	public function __construct() {
		global $_W;
		global $_GPC;
		$this->appKey = 'WJ_4a4fe5356c0d658b';
		
		$this->checkAuth($_GPC, $_POST);
	}
	
	/**
	 * 主方法
	 *
	 */
	public function main()
	{
		
		$t1 = microtime(true);
		global $_W;
		global $_GPC;
		
		$index = empty($_GPC['index']) ? 0 : abs(intval($_GPC['index'])) ;
		$size = 100;
		// $size = intval($_GPC['size']);
		// $limit = array();
		// if( empty($index) ){
			// $limit = array(0, $size);
		// }else{
			// $limit = array($index-1, $size);
		// }

			
		$fields = array('id','type','title','unit','goodssn','productsn','total','status','marketprice','costprice');
		if( $_GPC['id'] ){
			if( strpos($_GPC['id'], '-') !== false ){
				$ids = explode('-', $_GPC['id']);
				$id = $ids[0];
			}else{
				$id = $_GPC['id'];
			}
		}
		
		if(!empty($id)){
			$list = pdo_getslice('ewei_shop_goods', array('uniacid'=>$_GPC['i'], 'id'=>$id, 'checked'=>0, 'deleted'=>0), $total, $fields);	
		}else{
			$list = pdo_getslice('ewei_shop_goods', array('uniacid'=>$_GPC['i'], 'status'=>intval($_GPC['status']), 'checked'=>0, 'deleted'=>0), $total, $fields);
		}
		
		if( $list ){
			
			foreach($list as $key=>$val){
				
				$fields = array('id','title', 'marketprice', 'stock', 'goodssn', 'productsn');
				
				if(!empty($id[1])){
					$goods_spec = pdo_getall('ewei_shop_goods_option', array('id'=>$id[1]), $fields);
				}else{
					$goods_spec = pdo_getall('ewei_shop_goods_option', array('goodsid'=>$val['id']), $fields);	
				}
				$val['thumb'] = 'http://'.$_SERVER['HTTP_HOST'].'/attachment/'.$val['thumb'];
				
				if(!empty($goods_spec)){
					foreach($goods_spec as $k=>$v){
						$list_data[] = array(
								'id'=>$val['id'],
								'type'=>$val['type'],
								'title'=>$val['title'],
								'unit'=>$val['unit'],
								'thumb'=>$val['thumb'],
								'status'=>$val['status'],
								'costprice'=>$val['costprice'],
								'marketprice'=>$val['marketprice'],
								'goodssn'=>$v['goodssn'],
								'productsn'=>$v['productsn'],
								'total'=>$v['stock'],//如果有规格库存以规格库存为主
								'option_id'=>$val['id'].'-'.$v['id'],
								'option_title'=>$v['title'],
								'option_price'=>$v['marketprice']
							);
						$goods_spec;
					}
				}else{
					$list_data[] = array(
							'id'=>$val['id'],
							'type'=>$val['type'],
							'title'=>$val['title'],
							'unit'=>$val['unit'],
							'thumb'=>$val['thumb'],
							'goodssn'=>$val['goodssn'],
							'productsn'=>$val['productsn'],
							'total'=>$val['total'],
							'status'=>$val['status'],
							'marketprice'=>$val['marketprice'],
							'costprice'=>$val['costprice'],
							'option_id'=>$val['id'],
							'option_title'=>'',
							'option_price'=>''
						);
				}
			}
			
			$data['goodsData'] = array_slice($list_data, ($index-1)*$size, $size);
			$data['goodsCount'] = count($list_data);
			$t2 = microtime(true);
			$time = $t2-$t1;
			$this->json_return(true, '', $time, $data);
			
		}else{
			$t2 = microtime(true);
			$time = $t2-$t1;
			
			$this->json_return(false, '无有效数据',$time);
		
		}
	}
	
	/**
	 * 查询商品信息
	 * @json_return
	 */
	public function getAllGoods(){
		
		global $_W;
		global $_GPC;
		
		$index = empty($_GPC['index']) ? 0 : abs(intval($_GPC['index'])) ;
		$size = 100;
		// $size = intval($_GPC['size']);
		// $limit = array();
		// if( empty($index) ){
			// $limit = array(0, $size);
		// }else{
			// $limit = array($index-1, $size);
		// }

			
		$fields = array('id','type','title','unit','goodssn','productsn','total','status','marketprice','costprice');
		if( $_GPC['id'] ){
			if( strpos($_GPC['id'], '-') !== false ){
				$ids = explode('-', $_GPC['id']);
				$id = $ids[0];
			}else{
				$id = $_GPC['id'];
			}
		}
		
		if(!empty($id)){
			$list = pdo_getslice('ewei_shop_goods', array('uniacid'=>$_GPC['i'], 'id'=>$id, 'checked'=>0, 'deleted'=>0), $total, $fields);	
		}else{
			$list = pdo_getslice('ewei_shop_goods', array('uniacid'=>$_GPC['i'], 'status'=>intval($_GPC['status']), 'checked'=>0, 'deleted'=>0), $total, $fields);
		}
		
		if( $list ){
			
			foreach($list as $key=>$val){
				
				$fields = array('id','title', 'marketprice', 'stock', 'goodssn', 'productsn');
				
				if(!empty($id[1])){
					$goods_spec = pdo_getall('ewei_shop_goods_option', array('id'=>$id[1]), $fields);
				}else{
					$goods_spec = pdo_getall('ewei_shop_goods_option', array('goodsid'=>$val['id']), $fields);	
				}
				$val['thumb'] = 'http://'.$_SERVER['HTTP_HOST'].'/attachment/'.$val['thumb'];
				
				if(!empty($goods_spec)){
					foreach($goods_spec as $k=>$v){
						$list_data[] = array(
								'id'=>$val['id'],
								'type'=>$val['type'],
								'title'=>$val['title'],
								'unit'=>$val['unit'],
								'thumb'=>$val['thumb'],
								'status'=>$val['status'],
								'costprice'=>$val['costprice'],
								'marketprice'=>$val['marketprice'],
								'goodssn'=>$v['goodssn'],
								'productsn'=>$v['productsn'],
								'total'=>$v['stock'],//如果有规格库存以规格库存为主
								'option_id'=>$val['id'].'-'.$v['id'],
								'option_title'=>$v['title'],
								'option_price'=>$v['marketprice']
							);
						$goods_spec;
					}
				}else{
					$list_data[] = array(
							'id'=>$val['id'],
							'type'=>$val['type'],
							'title'=>$val['title'],
							'unit'=>$val['unit'],
							'thumb'=>$val['thumb'],
							'goodssn'=>$val['goodssn'],
							'productsn'=>$val['productsn'],
							'total'=>$val['total'],
							'status'=>$val['status'],
							'marketprice'=>$val['marketprice'],
							'costprice'=>$val['costprice'],
							'option_id'=>$val['id'],
							'option_title'=>'',
							'option_price'=>''
						);
				}
			}
			
			$data['goodsData'] = array_slice($list_data, ($index-1)*$size, $size);
			$data['goodsCount'] = count($list_data);

			$this->json_return(true, '', '', $data);
			
		}else{
			
			$this->json_return(false, '无有效数据');
		
		}
	}
	
	/**
	 * 查询订单信息
	 * @json_return
	 */
	public function getAllOrder(){
		
		global $_W;
		global $_GPC;
		
		$condition = 'uniacid = ' . $_GPC['i'] ;
		$condition .= empty($_GPC['status']) ? ' and `status` =1' : ' and `status` ='.trim($_GPC['status']);
		$condition .= empty($_GPC['tid']) ? '' : ' and `ordersn` = "'.trim($_GPC['tid']).'"';
		
		$index = abs(intval($_GPC['index']));
		// $size = $_GPC['size'];
		$size = 100;
		
		$limit = '';
		if( empty($index) ){	
			$limit = ' limit 0,'.$size;
		}else{
			$limit = ' limit ' . ($index-1) .','. $size;
		}
		
		if( !empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime between ' . $_GPC['stime'] . ' and ' . $_GPC['etime'];
		}elseif( !empty($_GPC['stime']) && empty($_GPC['etime']) ){
			$condition .= ' and updatetime > ' . $_GPC['stime'];
		}elseif( empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime < ' . $_GPC['etime'];
		}
		
		$total = pdo_fetch('select count(*) from ' . tablename('ewei_shop_order') . ' where ' . $condition );
		$list = pdo_fetchall('select * from ' . tablename('ewei_shop_order') . ' where ' . $condition . ' order by updatetime desc ' . $limit);
		// echo '<pre>';pdo_debug();
		if(!empty($list)){
			$order = array();
			foreach($list as $key=>$val){
				$data[$key]['id'] = $val['id'];
				$data[$key]['price'] = $val['price'];
				$data[$key]['status'] = $val['status'];
				$data[$key]['ordersn'] = $val['ordersn'];
				$data[$key]['nickname'] = $val['openid'];
				$data[$key]['paytype'] = $val['paytype'];
				
				#$address = pdo_get('ewei_shop_member_address', array('id'=>$val['addressid']), array('realname','mobile','province','city','area','street','address'));
				$address = pdo_fetch('select realname,mobile,province,city,area,street,address from '.tablename('ewei_shop_member_address').' where id='.$val['addressid'].' order by isdefault desc limit 1';
				if($val['dispatchtype']==1){
					$data[$key]['remark'] = $val['remark'].'客户自提';
					$carrier = unserialize($val['carrier']);
					$data[$key]['receiver_name'] = $carrier['carrier_realname'];
					$data[$key]['receiver_phone'] = $carrier['carrier_mobile'];
					$data[$key]['receiver_province'] = $carrier['province'];
					$data[$key]['receiver_city'] = $carrier['city'];
					$data[$key]['receiver_area'] = $carrier['area'];
					$data[$key]['receiver_street'] = $carrier['street'];
					$data[$key]['receiver_address'] = $carrier['street'].$carrier['address'];
				}else{
					$data[$key]['remark'] = $val['remark'];
					$data[$key]['receiver_name'] = $address['realname'];
					$data[$key]['receiver_phone'] = $address['mobile'];
					$data[$key]['receiver_province'] = $address['province'];
					$data[$key]['receiver_city'] = $address['city'];
					$data[$key]['receiver_area'] = $address['area'];
					$data[$key]['receiver_street'] = $address['street'];
					$data[$key]['receiver_address'] = $address['street'].$address['address'];
				}
				
				$data[$key]['dispatchprice'] = $val['dispatchprice'];
				// $data[$key]['createtime'] = $val['createtime'];
				$data[$key]['updatetime'] = $val['updatetime'];
				$data[$key]['sendtype'] = $val['sendtype'];
				$data[$key]['refundstate'] = $val['refundstate'];
				$data[$key]['refundid'] = $val['refundid'];
				$data[$key]['refundtime'] = $val['refundtime'];
				$data[$key]['finishtime'] = $val['finishtime'];
				$data[$key]['paytime'] = $val['paytime'];
				$data[$key]['expresscom'] = $val['expresscom'];
				$data[$key]['expresssn'] = $val['expresssn'];
				$data[$key]['express'] = $val['express'];
				$data[$key]['address_send'] = $val['address_send'];
				$data[$key]['remarksaler'] = $val['remarksaler'];
				
				$data[$key]['orderGoods'] = pdo_getAll('ewei_shop_order_goods', array('orderid'=>$val['id'],'sendtype'=>0), array('id','goodsid', 'createtime','price', 'sendtype', 'total', 'optionid', 'realprice'));
				foreach($data[$key]['orderGoods'] as $k=>$v){
					
					$data[$key]['orderGoods'][$k]['orderGoodsid'] = $v['id'];
					unset($data[$key]['orderGoods'][$k]['id']);
					$data[$key]['orderGoods'][$k]['title'] = pdo_get('ewei_shop_goods', array('id'=>$v['goodsid']), array('title'))['title'] ;
					
					if(empty($v['optionid'])){
						$data[$key]['orderGoods'][$k]['optionid'] = $v['goodsid'] ;
						$data[$key]['orderGoods'][$k]['optiontitle'] = '' ;
						$data[$key]['orderGoods'][$k]['goodssn'] = pdo_get('ewei_shop_goods', array('id'=>$v['goodsid']), array('goodssn'))['goodssn'] ;
					}else{
						$data[$key]['orderGoods'][$k]['optionid'] = implode('-', array($v['goodsid'], $v['optionid'])) ;
						$order_goods_option = pdo_get('ewei_shop_goods_option', array('id'=>$v['optionid'])) ;
						$data[$key]['orderGoods'][$k]['optiontitle'] = $order_goods_option['title'] ;
						$data[$key]['orderGoods'][$k]['goodssn'] = $order_goods_option['goodssn'] ;
						
					}
				}
				
			}
			$order['orderData'] = $data;
			$order['orderCount'] = $total['count(*)'];
			
			$this->json_return(true, '', '', $order);
			
		}else{
			
			$this->json_return(false, '无有效订单', '');
			
		}
	}
	
	public function getGroupOrder(){
		
		global $_W;
		global $_GPC;
		
		$condition = 'uniacid = ' . $_GPC['i'] ;
		$condition .= empty($_GPC['status']) ? ' and `status` =1' : ' and `status` ='.trim($_GPC['status']);
		$condition .= empty($_GPC['tid']) ? '' : ' and `ordersn` = "'.trim($_GPC['tid']).'"';
		
		$index = abs(intval($_GPC['index']));
		// $size = $_GPC['size'];
		$size = 100;
		
		$limit = '';
		if( empty($index) ){	
			$limit = ' limit 0,'.$size;
		}else{
			$limit = ' limit ' . ($index-1) .','. $size;
		}
		
		if( !empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime between ' . $_GPC['stime'] . ' and ' . $_GPC['etime'];
		}elseif( !empty($_GPC['stime']) && empty($_GPC['etime']) ){
			$condition .= ' and updatetime > ' . $_GPC['stime'];
		}elseif( empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime < ' . $_GPC['etime'];
		}
		
		$total = pdo_fetch('select count(*) from ' . tablename('ewei_shop_order') . ' where ' . $condition );
		$list = pdo_fetchall('select * from ' . tablename('ewei_shop_order') . ' where ' . $condition . ' order by updatetime desc ' . $limit);
		// echo '<pre>';pdo_debug();
		if(!empty($list)){
			$order = array();
			foreach($list as $key=>$val){
				$data[$key]['id'] = $val['id'];
				$data[$key]['price'] = $val['price'];
				$data[$key]['status'] = $val['status'];
				$data[$key]['ordersn'] = $val['ordersn'];
				$data[$key]['nickname'] = $val['openid'];
				$data[$key]['paytype'] = $val['paytype'];
				
				$address = pdo_get('ewei_shop_member_address', array('id'=>$val['addressid']), array('realname','mobile','province','city','area','street','address'));
				if($val['dispatchtype']==1){
					$data[$key]['remark'] = $val['remark'].'客户自提';
					$carrier = unserialize($val['carrier']);
					$data[$key]['receiver_name'] = $carrier['carrier_realname'];
					$data[$key]['receiver_phone'] = $carrier['carrier_mobile'];
					$data[$key]['receiver_province'] = $carrier['province'];
					$data[$key]['receiver_city'] = $carrier['city'];
					$data[$key]['receiver_area'] = $carrier['area'];
					$data[$key]['receiver_street'] = $carrier['street'];
					$data[$key]['receiver_address'] = $carrier['address'];
				}else{
					$data[$key]['remark'] = $val['remark'];
					$data[$key]['receiver_name'] = $address['realname'];
					$data[$key]['receiver_phone'] = $address['mobile'];
					$data[$key]['receiver_province'] = $address['province'];
					$data[$key]['receiver_city'] = $address['city'];
					$data[$key]['receiver_area'] = $address['area'];
					$data[$key]['receiver_street'] = $address['street'];
					$data[$key]['receiver_address'] = $address['address'];
				}
				
				$data[$key]['dispatchprice'] = $val['dispatchprice'];
				// $data[$key]['createtime'] = $val['createtime'];
				$data[$key]['updatetime'] = $val['updatetime'];
				$data[$key]['sendtype'] = $val['sendtype'];
				$data[$key]['refundstate'] = $val['refundstate'];
				$data[$key]['refundid'] = $val['refundid'];
				$data[$key]['refundtime'] = $val['refundtime'];
				$data[$key]['finishtime'] = $val['finishtime'];
				$data[$key]['paytime'] = $val['paytime'];
				$data[$key]['expresscom'] = $val['expresscom'];
				$data[$key]['expresssn'] = $val['expresssn'];
				$data[$key]['express'] = $val['express'];
				$data[$key]['address_send'] = $val['address_send'];
				$data[$key]['remarksaler'] = $val['remarksaler'];
				
				$data[$key]['orderGoods'] = pdo_getAll('ewei_shop_order_goods', array('orderid'=>$val['id'],'sendtype'=>0), array('id','goodsid', 'createtime','price', 'sendtype', 'total', 'optionid', 'realprice'));
				foreach($data[$key]['orderGoods'] as $k=>$v){
					
					$data[$key]['orderGoods'][$k]['orderGoodsid'] = $v['id'];
					unset($data[$key]['orderGoods'][$k]['id']);
					$data[$key]['orderGoods'][$k]['title'] = pdo_get('ewei_shop_goods', array('id'=>$v['goodsid']), array('title'))['title'] ;
					
					if(empty($v['optionid'])){
						$data[$key]['orderGoods'][$k]['optionid'] = $v['goodsid'] ;
						$data[$key]['orderGoods'][$k]['optiontitle'] = '' ;
						$data[$key]['orderGoods'][$k]['goodssn'] = pdo_get('ewei_shop_goods', array('id'=>$v['goodsid']), array('goodssn'))['goodssn'] ;
					}else{
						$data[$key]['orderGoods'][$k]['optionid'] = implode('-', array($v['goodsid'], $v['optionid'])) ;
						$order_goods_option = pdo_get('ewei_shop_goods_option', array('id'=>$v['optionid'])) ;
						$data[$key]['orderGoods'][$k]['optiontitle'] = $order_goods_option['title'] ;
						$data[$key]['orderGoods'][$k]['goodssn'] = $order_goods_option['goodssn'] ;
						
					}
				}
				
			}
			$order['orderData'] = $data;
			$order['orderCount'] = $total['count(*)'];
			
			$this->json_return(true, '', '', $order);
			
		}else{
			
			$this->json_return(false, '无有效订单', '');
			
		}
	}
	
	/**
	 * 查询退款订单
	 * @json_return
	 */
	public function getRefundOrder(){
		
		global $_W;
		global $_GPC;
		
		$condition = 'uniacid = ' . $_GPC['i'] . ' and (`status`=0 or `status`=1)';
		// $condition .= empty($_GPC['status']) ? ' and `status` =1' : ' and `status` ='.intval(trim($_GPC['status']));
		$condition .= empty($_GPC['fefundid']) ? '' : ' and fefundno ='.htmlspecialchars(trim($_GPC['fefundid']));
		
		$index = empty($_GPC['index']) ? 0 : abs(intval($_GPC['index'])) ;
		$size = 100;
		$limit = '';
		if( empty($index) )	
			$limit = ' limit 0,100';
		else
			$limit = ' limit ' . ($index-1) .','. $size;
		
		
		if( !empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime between ' . $_GPC['stime'] . ' and ' . $_GPC['etime'];
		}elseif( !empty($_GPC['stime']) && empty($_GPC['etime']) ){
			$condition .= ' and updatetime > ' . $_GPC['stime'];
		}elseif( empty($_GPC['stime']) && !empty($_GPC['etime']) ){
			$condition .= ' and updatetime < ' . $_GPC['etime'];
		}
		
		$total = pdo_fetch('select count(*) from ' . tablename('ewei_shop_order_refund') . ' where ' . $condition );
		$list = pdo_fetchall('select * from ' . tablename('ewei_shop_order_refund') . ' where ' . $condition . ' order by updatetime desc ');
		// pdo_debug();
		if(!empty($list)){
			foreach($list as $key=>$val){
				// $data[$key]['id'] = $val['id'];
				// $data[$key]['orderid'] = $val['orderid'];
				// $data[$key]['ordersn'] = pdo_get('ewei_shop_order', array('id'=>$val['orderid']), array('ordersn'))['ordersn'];
				// $data[$key]['nickname'] = pdo_get('ewei_shop_order', array('id'=>$val['orderid']), array('openid'))['openid'];
				// $data[$key]['refundno'] = $val['refundno'];
				// $data[$key]['price'] = $val['price'];
				// $data[$key]['reason'] = $val['reason'];
				// $data[$key]['images'] = $val['images'];
				// $data[$key]['content'] = $val['content'];
				// $data[$key]['status'] = $val['status'];
				// $data[$key]['reply'] = $val['reply'];
				// $data[$key]['orderprice'] = $val['orderprice'];
				// $data[$key]['applyprice'] = $val['applyprice'];
				// $data[$key]['createtime'] = $val['createtime'];
				// $data[$key]['operatetime'] = $val['operatetime'];
				// $data[$key]['sendtime'] = $val['sendtime'];
				// $data[$key]['returntime'] = $val['returntime'];
				// $data[$key]['refundtime'] = $val['refundtime'];
				// $data[$key]['endtime'] = $val['endtime'];
				// $data[$key]['rexpress'] = $val['rexpress'];
				// $data[$key]['rexpresscom'] = $val['rexpresscom'];
				// $data[$key]['rexpresssn'] = $val['rexpresssn'];
				// $address = pdo_get('ewei_shop_refund_address', array('id'=>$val['refundaddressid'], 'deleted'=>0), array('name','mobile','province','city','area','street','address'));
				// $data[$key]['receiver_name'] = $address['name'];
				// $data[$key]['receiver_phone'] = $address['mobile'];
				// $data[$key]['receiver_province'] = $address['province'];
				// $data[$key]['receiver_city'] = $address['city'];
				// $data[$key]['receiver_area'] = $address['area'];
				// $data[$key]['receiver_address'] = $address['address'];
				
				// $data[$key]['orderGoods'] = $order_goods;
				// $data[$key]['goodssn'] = implode(',',$goodssn);
				
				$goods = pdo_getall('ewei_shop_order_goods', array('orderid'=>$val['orderid']), array('goodsid','price','total','optionid','createtime','goodssn'));
				foreach($goods as $k=>$v){
					$order = pdo_get('ewei_shop_order', array('id'=>$val['orderid']));
					$address = pdo_get('ewei_shop_member_address', array('id'=>$order['addressid']), array('realname','mobile','province','city','area','street','address'));
					// $data[$key]['ordersn'] = pdo_get('ewei_shop_order', array('id'=>$val['orderid']), array('ordersn'))['ordersn'];
					$data[] = array(
						'id' => $val['id'],
						'orderid' => $val['orderid'],
						'ordersn' => $order['ordersn'],
						'nickname' => $order['openid'],
						'refundno' => $val['refundno'],
						'price' => $val['price'],
						'reason' => $val['reason'],
						'images' => $val['images'],
						'content' => $val['content'],
						// 'message' => $val['message'],
						'status' => $val['status'],
						'reply' => $val['reply'],
						'rtype' => $val['rtype'],
						'orderprice' => $val['orderprice'],
						'applyprice' => $val['applyprice'],
						'createtime' => $val['createtime'],
						'operatetime' => $val['operatetime'],
						'sendtime' => $val['sendtime'],
						'returntime' => $val['returntime'],
						'refundtime' => $val['refundtime'],
						'endtime' => $val['endtime'],
						'rexpress' => $val['rexpress'],
						'rexpresscom' => $val['rexpresscom'],
						'rexpresssn' => $val['rexpresssn'],
						'receiver_name' => $address['realname'],
						'receiver_phone' => $address['mobile'],
						'receiver_province' => $address['province'],
						'receiver_city' => $address['city'],
						'receiver_area' => $address['area'],
						'receiver_address' => $address['address'],
						'goodsid' => $v['goodsid'],
						'goodssn' => $v['goodssn'],
						'total' => $v['total'],
						// //$order_goods[$k]['price'] = $v['price'];
						// $order_goods[$k]['optionid'] = empty($v['optionid']) ? $v['goodsid'] : implode('-', array($v['goodsid'], $v['optionid']));
						// $order_goods[$k]['total'] = $v['total'];
						);
				}
			}
			$order_data = array();
			$order_data['orderData'] = array_slice($data, ($index-1)*$size, $size);
			$order_data['orderCount'] = count($data);
			// $order['orderCount'] = $total['count(*)'];
			
			$this->json_return(true, '', '', $order_data);
			
		}else{
			
			$this->json_return(false, '无有效订单', '');
			
		}
	}
	
	/**
	 * 改变订单状态
	 * @json_return
	 */
	public function changeOrderState(){
		// $this->checkAuth($_POST);
		
		$res = pdo_update('ewei_shop_order', array('status'=>$_GPC['state']), array('ordersn'=>$_GPC['tid']) );
		
		if($res)
			$this->json_return(true, '', '');
		else
			$this->json_return(false, '', '');
		
	}
	
	/**
	 * 发货
	 * @json_return
	 */
	public function sendOrder(){
		global $_W;
		global $_GPC;
		
		$opdata = $this->opData();
		extract($opdata);
		
		if (empty($item['addressid'])) {
			$this->json_return(false, '无收货地址，无法发货！');
		}
		
		if ($item['paytype'] != 3) {
			if ($item['status'] != 1) {
				$this->json_return(false, '订单未付款，无法发货！');
			}

		}
		
		// if ($item['city_express_state'] == 0) { //是否城市配送
			if ( empty($_GPC['express']) || empty($_GPC['expresssn']) || empty($_GPC['expresscom'])) {
				$this->json_return(false, '请正确填写快递信息！');
			}
			
			if (!(empty($item['transid']))) {
			}


			$time = time();
			$data = array('sendtype' => (0 < $item['sendtype'] ? $item['sendtype'] : intval($_GPC['sendtype'])), 'express' => trim($_GPC['express']), 'expresscom' => trim($_GPC['expresscom']), 'expresssn' => trim($_GPC['expresssn']), 'sendtime' => $time);
			if ((intval($_GPC['sendtype']) == 1) || (0 < $item['sendtype'])) {
				if (empty($_GPC['ordergoodsid'])) {
					$this->json_return(0, '请选择发货商品！');
				}


				$ogoods = array();
				$ogoods = pdo_fetchall('select sendtype from ' . tablename('ewei_shop_order_goods') . "\r\n" . ' where orderid = ' . $item['id'] . ' and uniacid = ' . $_GPC['i'] . ' order by sendtype desc ');
				$senddata = array('sendtype' => $ogoods[0]['sendtype'] + 1, 'sendtime' => $data['sendtime']);
				$data['sendtype'] = $ogoods[0]['sendtype'] + 1;
				$goodsid = $_GPC['ordergoodsid'];

				foreach ($goodsid as $key => $value ) {
					pdo_update('ewei_shop_order_goods', $data, array('id' => $value, 'uniacid' => $_GPC['i']));
				}

				$send_goods = pdo_fetch('select * from ' . tablename('ewei_shop_order_goods') . "\r\n" . ' where orderid = ' . $item['id'] . ' and sendtype = 0 and uniacid = ' . $_GPC['i'] . ' limit 1 ');

				if (empty($send_goods)) {
					$senddata['status'] = 2;
				}


				$senddata['refundid'] = 0;
				pdo_update('ewei_shop_order', $senddata, array('id' => $item['id'], 'uniacid' => $_GPC['i']));
			}
			 else {
				$data['status'] = 2;
				$data['refundid'] = 0;
				pdo_update('ewei_shop_order', $data, array('id' => $item['id'], 'uniacid' => $_GPC['i']));
			}
		// } //城市配送
		 // else {
			// $cityexpress = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_city_express') . ' WHERE uniacid=:uniacid AND merchid=:merchid', array(':uniacid' => $_GPC['i'], ':merchid' => 0));

			// if ($cityexpress['express_type'] == 1) {
				// $dada = m('order')->dada_send($item);

				// if ($dada['state'] == 0) {
					// json_return(0, $dada['result']);
				// }
				 // else {
					// $data['status'] = 2;
					// $data['refundid'] = 0;
					// $data['sendtime'] = time();
					// pdo_update('ewei_shop_order', $data, array('id' => $item['id'], 'uniacid' => $_GPC['i']));
				// }
			// }
			 // else {
				// $data['status'] = 2;
				// $data['refundid'] = 0;
				// $data['sendtime'] = time();
				// pdo_update('ewei_shop_order', $data, array('id' => $item['id'], 'uniacid' => $_GPC['i']));
			// }
		// }

		if (!(empty($item['refundid']))) {
			$refund = pdo_fetch('select * from ' . tablename('ewei_shop_order_refund') . ' where id=:id limit 1', array(':id' => $item['refundid']));

			if (!(empty($refund))) {
				pdo_update('ewei_shop_order_refund', array('status' => -1, 'endtime' => $time), array('id' => $item['refundid']));
				pdo_update('ewei_shop_order', array('refundstate' => 0), array('id' => $item['id']));
			}

		}


		if ($item['paytype'] == 3) {
			m('order')->setStocksAndCredits($item['id'], 1);
		}


		m('notice')->sendOrderMessage($item['id']);
		plog('order.op.send', '订单发货 ID: ' . $item['id'] . ' 订单号: ' . $item['ordersn'] . ' <br/>快递公司: ' . $_GPC['expresscom'] . ' 快递单号: ' . $_GPC['expresssn']);
		$this->json_return(true,'发货成功');
			
				
	}
	
	/**
	 * 更改商品库存
	 * @json_return
	 */
	public function setGoodsStock(){
		global $_W;
		global $_GPC;
		
		if (empty($_GPC['id'])) {
			$this->json_return(false, 'ID不能为空');
		}
		
		if( strpos($_GPC['id'], '-') !== false ){
			$id = explode('-',$_GPC['id']);
			
			if ( !pdo_get('ewei_shop_goods', array('id'=>$id[0])) ) {
				$this->json_return(false, '商品不存在');
			}
				
			if( !pdo_get('ewei_shop_goods_option', array('stock'=>$_GPC['total'],'id'=>$id[1])) ){
				$res = pdo_update('ewei_shop_goods_option', array('stock'=>$_GPC['total']), array('id'=>$id[1]));
			}
				
		}else{
			if ( !pdo_get('ewei_shop_goods', array('id'=>$_GPC['id'])) ) {
				$this->json_return(false, '商品不存在');
			}
			
			if(!empty($_GPC['total'])){
				$res = pdo_update('ewei_shop_goods', array('total'=>$_GPC['total']), array('id'=>$_GPC['id']));
			}
			
		}
		
		if($res)
			$this->json_return(true, '调整成功');
		else
			$this->json_return(false, '调整失败');
	}
	
	/**
	 * 更改快递
	 * @json_return
	 */
	public function changeOrderExpress(){
		global $_W;
		global $_GPC;
		
		$opdata = $this->opData();
		extract($opdata);
		$sendtype = intval($_GPC['sendtype']);
		
		$express = $_GPC['express'];
		$expresscom = $_GPC['expresscom'];
		$expresssn = trim($_GPC['expresssn']);

		if (empty($id)) {
			$ret = '参数错误！';
			$this->json_return(0, $ret);
		}


		if (!(empty($expresssn))) {
			$change_data = array();
			$change_data['express'] = $express;
			$change_data['expresscom'] = $expresscom;
			$change_data['expresssn'] = $expresssn;

			if (0 < $item['sendtype']) {
				if (empty($sendtype)) {
					if (empty($_GPC['bundle'])) {
						$this->json_return(0, '请选择您要修改的包裹！');
					}


					$sendtype = intval($_GPC['bundle']);
				}


				pdo_update('ewei_shop_order_goods', $change_data, array('orderid' => $id, 'sendtype' => $sendtype, 'uniacid' => $_GPC['i']));
			}
			 else {
				pdo_update('ewei_shop_order', $change_data, array('id' => $id, 'uniacid' => $_GPC['i']));
			}

			plog('order.op.changeexpress', '修改快递状态 ID: ' . $item['id'] . ' 订单号: ' . $item['ordersn'] . ' 快递公司: ' . $expresscom . ' 快递单号: ' . $expresssn);
			$this->json_return(1);
		}
		 else {
			$this->json_return(0, '请填写快递单号！');
		}
	} 

	/**
     * 确认收货
     * @global type $_W
     * @global type $_GPC
     */
	public function finish()
	{
		global $_W;
		global $_GPC;
		$orderid = intval($_GPC['id']);

		if (empty($orderid)) {
			app_error(AppError::$ParamsError);
		}


		$order = pdo_fetch('select id,status,openid,couponid,refundstate,refundid from ' . tablename('ewei_shop_order') . ' where id=:id and uniacid=:uniacid and openid=:openid limit 1', array(':id' => $orderid, ':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));

		if (empty($order)) {
			app_error(AppError::$OrderNotFound);
		}


		if ($order['status'] != 2) {
			app_error(AppError::$OrderCannotFinish);
		}


		if ((0 < $order['refundstate']) && !(empty($order['refundid']))) {
			$change_refund = array();
			$change_refund['status'] = -2;
			$change_refund['refundtime'] = time();
			pdo_update('ewei_shop_order_refund', $change_refund, array('id' => $order['refundid'], 'uniacid' => $_W['uniacid']));
		}


		pdo_update('ewei_shop_order', array('status' => 3, 'finishtime' => time(), 'refundstate' => 0), array('id' => $order['id'], 'uniacid' => $_W['uniacid']));
		m('order')->setStocksAndCredits($orderid, 3);
		m('member')->upgradeLevel($order['openid'], $orderid);
		m('order')->setGiveBalance($orderid, 1);

		if (com('coupon')) {
			com('coupon')->sendcouponsbytask($orderid);
		}


		if (com('coupon') && !(empty($order['couponid']))) {
			com('coupon')->backConsumeCoupon($orderid);
		}


		m('notice')->sendOrderMessage($orderid);

		if (p('commission')) {
			p('commission')->checkOrderFinish($orderid);
		}


		app_json();
	}

	/**
     * 确认收货
     * @global type $_W
     * @global type $_GPC
     */
	public function getExpressList()
	{
		$express_list = m('express')->getExpressList();
		$this->json_return(true,'','',$express_list);
		
	}
	
	/**
	 * 验证
	 * data array
	 * @json_return
	 */
	protected function checkAuth( $data, $post){
		
		// if( empty($data['timestamp']) || $data['timestamp'] != $timestamp ){
			// $this->json_return(false,'timestamp参数错误');
		// }
		
		if( !array_key_exists('authKey', $data) || empty($data['authKey']) ){
			$this->json_return(false, '缺少authKey');
		}
		
		$str = implode( $post );
		$authKey = md5(sha1($this->appKey.$str.$this->appKey));
		
		if( $authKey != $data['authKey'] ){
			$this->json_return(false, 'authKey参数错误');
		}
		
		// if( isset($data['index']) || isset($data['size']) ){
			// if( $data['index']<0 || $data['size'] ){
				// $this->json_return(false, 'page参数错误');				
			// }
		// }
		
	}

	function dd($arr){
		echo'<pre>';
		var_dump($arr);
		exit;
	}


	function send()
	{
		


		$express_list = m('express')->getExpressList();
		include $this->template();
	}

	/**
	 * 获取订单
	 * @return
	 */
	function opData()
	{
		global $_W;
		global $_GPC;
		$ordersn = $_GPC['tid'];
		$item = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_order') . ' WHERE ordersn = :ordersn and uniacid=:uniacid', array(':ordersn' => $ordersn, ':uniacid' => $_GPC['i']));
		if (empty($item)) {
			
			if ($_W['isajax']) {
			}
			
			$this->json_return(false, '未找到订单!', 40001);
		}
		
		return array('id' => $item['id'], 'item' => $item);
	}
		
	/**
	 * json_return方法
	 * @param
	 * @json_encode
	 */
	function json_return($success, $errMsg='', $errCode='', $data=''){
		$json_data = array(
			'success' => $success, 
			'errMsg' => $errMsg, 
			'errCode' => $errCode, 
			'data' => $data, 
		); 
		echo json_encode($json_data);exit;
	}
}



?>