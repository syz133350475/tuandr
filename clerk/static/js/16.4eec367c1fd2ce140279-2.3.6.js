webpackJsonp([16],{"+uRZ":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("ORU3"),i=a("Lo3X"),n={data:function(){return{}},props:{items:Object},methods:{click:function(t){"detail"==t.no&&this.$router.push("/order/detail/"+this.items.id)}},components:{GoodsCard:i.a}},r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("van-cell-group",{staticClass:"card-group-box"},[a("van-cell",{attrs:{title:t.items.title}},[a("span",{staticClass:"value",attrs:{slot:"right-icon"},slot:"right-icon"},[t._v(t._s(t.items.value))])]),t._v(" "),t._l(t.items.item,function(t,e){return a("van-cell",{key:e},[a("GoodsCard",{attrs:{title:t.title,desc:t.desc,price:t.price,num:t.num,thumb:t.img}})],1)}),t._v(" "),t.items.operate.length?a("van-cell",[a("van-row",{staticClass:"btn-group",attrs:{type:"flex",justify:"end"}},t._l(t.items.operate,function(e,s){return a("van-button",{key:s,staticClass:"btn",attrs:{size:"small"},on:{click:function(a){t.click(e)}}},[t._v(t._s(e.name))])}))],1):t._e()],2)},staticRenderFns:[]};var o=a("VU/8")(n,r,!1,function(t){a("cPR3")},"data-v-d0a420a8",null).exports,c=a("xBL0"),u=(a("oFuF"),{name:"verify-log",data:function(){return{tab_active:0,tabs:[{name:"全部",status:0},{name:"订单",status:1},{name:"礼品券",status:2},{name:"消费卡",status:3}],params:{status:0,search_text:""}}},mixins:[a("msXN").c],created:function(){this.loadList()},methods:{onTab:function(t){var e=this.tabs[t].status;this.params.status=e,this.loadList("init")},onSearch:function(t){this.params.search_text=t,this.loadList("init")},loadList:function(t){var e=this;t&&"init"===t&&e.initList(),Object(c.d)(e.params).then(function(a){var s=a.data,i=e.packageListData(s.data);e.pushToList(i,s.page_count,t)}).catch(function(){e.loadError()})},onInitList:function(t){var e=t.message,a=this;a.$Toast.success(e),setTimeout(function(){a.loadList("init")},1e3)},packageListData:function(){return(arguments.length>0&&void 0!==arguments[0]?arguments[0]:[]).map(function(t){var e={},a="",s=[],i=[];return 1==t.type?(a="订单编号："+t.order_no,t.order_item_list.forEach(function(t,e){s.push({id:t.goods_id,img:t.picture,title:t.goods_name,desc:t.sku_name,price:t.price,num:t.num})}),i.push({no:"detail",name:"订单详情"})):2==t.type?(a="礼品券号："+t.gift_voucher_code,s.push({img:t.gift_picture,title:t.giftvoucher_name,num:t.num})):3==t.type&&(a="消费卡号："+t.card_code,s.push({img:t.card_picture,title:t.goods_name,num:t.num})),e.title=a,e.value="核销员："+t.assistant_name,e.item=s,e.operate=i,e.id=t.order_id,e})}},components:{HeadTab:s.a,OrderPanelGroup:o}}),l={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"verify-log bg-f8"},[a("Navbar"),t._v(" "),a("HeadTab",{attrs:{tabs:t.tabs,"search-placeholder":"订单编号 / 消费卡号 / 礼品券号 / 商品名称","show-search":"","search-text":t.params.search_text},on:{"tab-change":t.onTab,search:t.onSearch},model:{value:t.tab_active,callback:function(e){t.tab_active=e},expression:"tab_active"}}),t._v(" "),a("List",{staticClass:"list",attrs:{finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{pageType:"order",message:"没有相关订单"}},on:{"update:error":function(e){t.error=e},load:t.loadList},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(t,e){return a("OrderPanelGroup",{key:e,attrs:{items:t}})}))],1)},staticRenderFns:[]};var d=a("VU/8")(u,l,!1,function(t){a("V2YJ")},"data-v-091b9f92",null);e.default=d.exports},V2YJ:function(t,e){},cPR3:function(t,e){}});