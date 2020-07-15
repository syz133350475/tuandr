webpackJsonp([17],{"+871":function(t,e){},"7Im+":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),o=a("R1Js"),i=a("dLkG"),n=a("Llv5"),r=a("msXN"),c=Object(s.a)({name:"store-list",data:function(){return{params:{order:"distance",sort:"ASC",lng:"",lat:"",search_text:""}}},mixins:[r.e],mounted:function(){var t=this;this.$store.state.config.addons.store?this.$store.dispatch("getBMapLocation").then(function(e){var a=e.location;e.address;t.params.lng=a.lng,t.params.lat=a.lat,t.loadList()}).catch(function(e){t.$Toast({message:e+"将显示所有门店",duration:3e3}),t.$store.dispatch("getCurrentCityName"),t.loadList()}):this.$refs.load.fail({errorText:"未开启O2O应用",showFoot:!1})},methods:{setParams:function(t){this.params=t,this.loadList("init")},loadList:function(t){var e=this,a=!1;t&&"init"===t&&e.initList(),e.$route.query.shop_id&&(e.params.shop_id=e.$route.query.shop_id,a=!0),Object(n.h)(e.params,a).then(function(a){var s=a.data,o=s.store_list?s.store_list:[];e.pushToList(o,s.page_count,t)}).catch(function(){e.loadError()})}},beforeDestroy:function(){var t=document.getElementsByTagName("iframe")[0];t&&t.remove()},components:{ListItem:o.a,TabSortScreen:i.a}}),l={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"store-list bg-f8"},[a("Navbar"),t._v(" "),a("TabSortScreen",{attrs:{"set-params":t.setParams}}),t._v(" "),a("List",{staticClass:"list",attrs:{finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{pageType:"shop",message:"没有相关门店"}},on:{"update:error":function(e){t.error=e},load:t.loadList},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(t,e){return a("ListItem",{key:e,attrs:{items:t}})}))],1)},staticRenderFns:[]};var d=a("VU/8")(c,l,!1,function(t){a("fgTW")},"data-v-58dfd170",null);e.default=d.exports},"94i+":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),o=a("Llv5"),i=a("bOdI"),n=a.n(i),r=(a("WJbf"),a("OhwO")),c=a("QmeG"),l=a("OChx"),d=a("oFuF"),u={data:function(){return{actions:[{name:"高德地图",type:"gd"},{name:"百度地图",type:"bd"},{name:"腾讯地图",type:"tx"}]}},props:{value:{type:Boolean,default:!1},params:{type:Object,default:{lng:"",lat:"",name:""}}},computed:{location:function(){var t=this.$store.state._store,e=t.localCity,a=t.localInfo;return{lng:a.location.lng,lat:a.location.lat,city:e}}},methods:{isShow:function(t){this.$emit("input",t)},select:function(t){var e=t.type;this.isShow(!1),this.openMap(this[e+"Map"]())},openMap:function(t){this.isShow(!1),location.assign(t)},gdMap:function(){var t=Object(d.d)(this.location.lng,this.location.lat),e=this.params,a=Object(d.d)(e.lng,e.lat),s={from:t.lng+","+t.lat+",当前位置",to:a.lng+","+a.lat+","+e.name,src:this.$store.state.domain,callnative:1,via:"",mode:"",policy:"",coordinate:"gaode"};return console.log(s),"https://uri.amap.com/navigation?"+Object(d.h)(s)},bdMap:function(){var t=this.location,e=this.params,a={origin:t.lat+","+t.lng,destination:e.lat+","+e.lng,mode:"driving",output:"html",region:t.city,src:this.$store.state.domain};return console.log(a),"http://api.map.baidu.com/direction?"+Object(d.h)(a)},txMap:function(){var t=Object(d.d)(this.location.lng,this.location.lat),e=this.params,a=Object(d.d)(e.lng,e.lat),s={type:"drive",fromcoord:t.lng+","+t.lat,to:e.name,tocoord:a.lng+","+a.lat,coord_type:2,referer:this.$store.state.domain};return console.log(s),"https://apis.map.qq.com/uri/v1/routeplan?"+Object(d.h)(s)}},components:{}},m={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("van-popup",{attrs:{position:"bottom","close-on-click-overlay":!1},on:{"click-overlay":function(e){t.isShow(!1)}},model:{value:t.value,callback:function(e){t.value=e},expression:"value"}},[a("van-cell-group",{staticClass:"cell-group"},t._l(t.actions,function(e,s){return a("van-cell",{key:s,attrs:{clickable:"",value:e.name,"value-class":"text-center"},on:{click:function(a){t.select(e)}}})}))],1)},staticRenderFns:[]};var p,h=a("VU/8")(u,m,!1,function(t){a("lxdz")},"data-v-b43ef7e4",null).exports,f={data:function(){return{showMap:!1}},props:{info:{type:Object}},computed:{_info:function(){var t=this.info;return t.title=t.shop_name+" ("+t.store_name+")",t._address=""+t.province_name+t.city_name+t.district_name+t.address+"(距您"+t.distance+"km)",t.tel="tel:"+t.store_tel,t.time="营业时段 "+t.start_time+" - "+t.finish_time,t.images=t.store_img||[],t},navigatorInfo:function(){var t=this.info;return{lng:t.lng,lat:t.lat,name:t.store_name}}},methods:{onPreview:function(){Object(r.a)(this._info.images)}},components:(p={HeadBanner:c.a,Star:l.a},n()(p,r.a.name,r.a),n()(p,"MapNavigator",h),p)},_={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"head"},[a("HeadBanner",{staticClass:"banner",attrs:{src:t._f("BASESRC")(t._info.images[0])}}),t._v(" "),a("van-cell-group",{staticClass:"cell-group card-group-box"},[a("van-cell",{staticClass:"cell-item",attrs:{border:!1,title:t._info.title}}),t._v(" "),a("van-cell",{staticClass:"cell-item info-item",attrs:{border:!1}},[a("div",{staticClass:"img-box",attrs:{slot:"icon"},slot:"icon"},[a("img",{attrs:{src:t._f("BASESRC")(t._info.images[0]),onerror:t.$ERRORPIC.noSquare},on:{click:t.onPreview}}),t._v(" "),a("span",{staticClass:"num"},[t._v(t._s(t._info.images.length))])]),t._v(" "),a("Star",{attrs:{slot:"title",value:t._info.score},slot:"title"}),t._v(" "),a("div",{staticClass:"label",attrs:{slot:"label"},on:{click:function(e){t.showMap=!0}},slot:"label"},[a("van-icon",{staticClass:"icon",attrs:{name:"location-o"}}),t._v(" "),a("span",[t._v(t._s(t._info._address))])],1)],1),t._v(" "),a("van-cell",{staticClass:"cell-item",attrs:{border:!1}},[a("div",{staticClass:"text-regular"},[t._v(t._s(t._info.time))]),t._v(" "),a("a",{attrs:{slot:"right-icon",href:t._info.tel},slot:"right-icon"},[a("van-icon",{attrs:{name:"v-icon-phone",size:"16px"}})],1)])],1),t._v(" "),a("MapNavigator",{attrs:{params:t.navigatorInfo},model:{value:t.showMap,callback:function(e){t.showMap=e},expression:"showMap"}})],1)},staticRenderFns:[]};var v=a("VU/8")(f,_,!1,function(t){a("zicx")},"data-v-458fc342",null).exports,g=a("//Fk"),b=a.n(g),y=a("r4M4"),C=a("mvHQ"),k=a.n(C),x=a("Lo3X"),$=a("cgSz"),S=a("msXN"),w=a("BuIE"),L={data:function(){return{goods_detail:{},promoteType:"normal",promoteParams:{},showSku:!1,addCartFlag:!0,getContainer:Object(d.t)()?".category":null}},props:{items:{type:Object},info:Object},mixins:[S.a],computed:{goodsInfo:function(){var t=this.items.goods_detail;return t.goods_image=t.goods_img,t.is_allow_buy="boolean"!=typeof this.items.is_allow_buy||this.items.is_allow_buy,t}},mounted:function(){var t=this.items;this.goods_detail=t.goods_detail;var e="normal";t.seckill_list.seckill_id?e="seckill":t.group_list.group_id?e="group":t.presell_list.presell_id?e="presell":t.bargain_list.bargain_id?e="bargain":t.limit_list&&t.limit_list.discount_id&&(e="limit"),this.promoteType=e,"normal"!=e&&(this.promoteParams=t[e+"_list"]||{})},methods:{onAction:function(t,e){"buy"===t||"group"===t||"seckill"===t||"presell"===t?this.onBuyNow(e):"addCart"===t?this.onAddCart(e):"bargain"==t?this.onBargain(e):this.$Toast("暂无后续操作"+t)},onAddCart:function(t){var e=this;e.bindMobile().then(function(){if(e.addCartFlag){e.addCartFlag=!1;var a={};a.store_id=e.$route.params.id,a.goods_id=t.id,a.num=t.selectedNum,a.sku_id=t.selectedSkuComb.id,t.seckill_id&&(a.seckill_id=t.seckill_id),Object(o.a)(a).then(function(t){var a=t.message;e.$Toast.success(a),e.showSku&&(e.showSku=!1,setTimeout(function(){e.addCartFlag=!0},200),e.$store.dispatch("getStoreCartList",{store_id:e.$route.params.id}))}).catch(function(){e.addCartFlag=!0})}})},onBuyNow:function(t){var e=this;e.bindMobile().then(function(){var a={order_tag:"buy_now"};a.goodsType=t.goodsType,a.shipping_type=2,a.sku_list=[],t.presell_id&&(a.presell_id=t.presell_id);var s={};s.num=t.selectedNum,s.sku_id=t.selectedSkuComb.id,s.store_id=e.info.store_id,s.store_name=e.info.store_name,t.seckill_id&&(s.seckill_id=t.seckill_id),t.channel_id&&(s.channel_id=t.channel_id),t.group_id&&(a.group_id=t.group_id,t.record_id&&(a.record_id=t.record_id)),a.sku_list.push(s),e.$router.push({name:"order-confirm",query:{params:Object(w.b)(k()(a))}})})},onBargain:function(t){this.$router.push({name:"bargain-detail",params:{goodsid:t.id,bargainid:t.bargain_id,bargainuid:t.bargain_uid}})}},components:{GoodsCard:x.a,SkuPopup:$.a}},O={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"item van-hairline--bottom"},[a("GoodsCard",{staticClass:"goods-card",attrs:{id:t.goods_detail.goods_id,price:t.goods_detail.min_price,title:t.goods_detail.goods_name,thumb:t._f("BASESRC")(t.goods_detail.goods_img)}},[a("div",{attrs:{slot:"bottomRight"},slot:"bottomRight"},[a("div",{staticClass:"btn-add e-handle",on:{click:function(e){t.showSku=!0}}},[a("van-icon",{attrs:{name:"add"}})],1)])]),t._v(" "),a("SkuPopup",{attrs:{info:t.goodsInfo,"promote-type":t.promoteType,"promote-params":t.promoteParams,"get-container":t.getContainer},on:{action:t.onAction},model:{value:t.showSku,callback:function(e){t.showSku=e},expression:"showSku"}})],1)},staticRenderFns:[]};var T=a("VU/8")(L,O,!1,function(t){a("+871")},"data-v-f7687c6a",null).exports,M={data:function(){return{viewTop:"",activeKey:0,category_list:[],params:{category_id:"",store_id:this.$route.params.id||""}}},props:{info:Object},mounted:function(){this.viewTop=this.$el.offsetTop,this.loadData()},mixins:[S.e],methods:{onChangeNav:function(t){this.activeKey=t,this.params.category_id=this.category_list[t].category_id,this.loadList("init")},getCategory:function(){var t=this;return new b.a(function(e,a){Object(o.e)({store_id:t.$route.params.id}).then(function(a){var s=a.data;t.category_list=s||[],e()}).catch(function(){})})},loadData:function(t){var e=this;this.getCategory().then(function(){e.params.category_id=e.category_list[e.activeKey]?e.category_list[e.activeKey].category_id:"",e.loadList(t)})},loadList:function(t){var e=this;t&&"init"===t&&this.initList(),Object(o.f)(this.params).then(function(a){var s=a.data,o=s.goods_list||[];e.pushToList(o,s.page_count,t)}).catch(function(){e.loadError()})}},components:{CategoryView:y.a,GoodsPanelGroup:T}},j={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("CategoryView",{attrs:{top:t.viewTop,bottom:"50"}},[a("div",{staticClass:"nav-group",attrs:{slot:"nav"},slot:"nav"},t._l(t.category_list,function(e,s){return a("div",{key:s,staticClass:"item",class:t.activeKey==s?"activeKey":"",on:{click:function(e){t.onChangeNav(s)}}},[a("span",{staticClass:"nav-item-text"},[t._v(t._s(e.short_name||e.category_name))])])})),t._v(" "),a("List",{attrs:{slot:"content",finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{message:"没有相关商品"}},on:{"update:error":function(e){t.error=e},load:t.loadList},slot:"content",model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(e,s){return a("GoodsPanelGroup",{key:s,attrs:{items:e,info:t.info}})}))],1)},staticRenderFns:[]};var E,P=a("VU/8")(M,j,!1,function(t){a("GBVA")},"data-v-b0e75d2a",null).exports,B=a("d/4A"),N=(a("10Qn"),a("UQoe")),F=a("u6fB"),R=a("JLLx"),V=a("9GaH"),D={data:function(){return{}},props:{value:{type:Boolean,default:!1}},mixins:[S.a],computed:{show:{get:function(){return this.value},set:function(t){this.$emit("input",t)}},list:function(){var t=this.$store.state._store.cartList,e=[],a=[],s=0;return t.forEach(function(t){t.checked&&(e.push(t.cart_id),a.push({sku_id:t.sku_id,coupon_id:0}),s+=parseFloat(t.price)*parseFloat(t.num))}),this.cart_id_list=e,this.sku_list=a,this.$store.commit("setStoreCartTotalPrice",s),t},btnText:function(){return"结算(合计："+Object(V.yuan)(this.$store.state._store.totalPrice)+")"},isDisabled:function(){return this.list.every(function(t){return!t.checked})||this.$store.state._store.isBtnDisabled}},methods:{onClose:function(){this.$emit("input",!1)},tagName:function(t){var e="";switch(t){case 1:e="秒杀";break;case 2:e="团购";break;case 3:e="预售";break;case 4:e="砍价";break;case 5:e="限时折扣"}return e},onNumChange:function(t,e){var a=this,s=t.num,i=t.max_buy,n=t.stock,r=t.cart_id;if(!(s<=0||this.async)){var c=0===i?n:n>i?i:n,l=s>c?c:s;this.async=!0;var d={};d.cart_id=r,d.num=l,Object(o.b)(d).then(function(){a.$store.dispatch("getStoreCartList",{store_id:a.$route.params.id}).then(function(){a.async=!1})})}},onStepperLimit:function(t){"plus"===t?this.$Toast("已超出最大购买数！"):this.$Toast("至少选择一件！")},onRemove:function(t){var e=this;e.$Dialog.confirm({message:"确定删除该商品？"}).then(function(){Object(o.i)(t).then(function(t){var a=t.message;e.$Toast.success(a),e.$store.dispatch("getStoreCartList",{store_id:e.$route.params.id}).then(function(t){Object(d.s)(t.cart_list)&&e.onClose()})})})},onSubmit:function(){var t=this,e={order_tag:"cart",cart_from:2};e.cart_id_list=t.cart_id_list,e.sku_list=t.sku_list,t.onClose(),setTimeout(function(){t.$router.push({name:"order-confirm",query:{params:Object(w.b)(k()(e))}})},100)}},components:(E={GoodsCard:x.a,LoadMoreEnd:F.a},n()(E,N.a.name,N.a),n()(E,"PopupBottom",R.a),E)},A={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("PopupBottom",{attrs:{title:"已选商品"},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[t.list.length>0?a("van-cell-group",{staticClass:"list",attrs:{border:!1}},t._l(t.list,function(e,s){return a("van-cell",{key:s,staticClass:"item",attrs:{center:""}},[a("van-checkbox",{staticClass:"checkbox-icon",attrs:{slot:"icon",disabled:e.disabled},slot:"icon",model:{value:e.checked,callback:function(a){t.$set(e,"checked",a)},expression:"item.checked"}}),t._v(" "),a("GoodsCard",{staticClass:"goods-card",attrs:{title:e.goods_name,price:e.price,desc:e.sku_name,thumb:t._f("BASESRC")(e.goods_img)}},[a("div",{staticClass:"info-foot",attrs:{slot:"bottom"},slot:"bottom"},[a("van-stepper",{attrs:{integer:"","async-change":"","disable-input":"",max:0===e.max_buy?e.stock:e.stock>e.max_buy?e.max_buy:e.stock},on:{change:function(a){t.onNumChange(e,s)},overlimit:t.onStepperLimit},model:{value:e.num,callback:function(a){t.$set(e,"num",a)},expression:"item.num"}}),t._v(" "),a("div",{staticClass:"del e-handle",on:{click:function(a){t.onRemove(e.cart_id)}}},[a("van-icon",{attrs:{name:"delete"}})],1)],1)])],1)})):a("LoadMoreEnd",{attrs:{finished:"","text-background":"#ffffff"}}),t._v(" "),a("div",{staticClass:"sku-action-group",attrs:{slot:"footer"},slot:"footer"},[a("van-button",{staticClass:"action-btn",attrs:{type:"danger",round:"",block:"",disabled:t.isDisabled},on:{click:t.onSubmit}},[t._v(t._s(t.btnText))])],1)],1)},staticRenderFns:[]};var G=a("VU/8")(D,A,!1,function(t){a("lttG")},"data-v-6075a20e",null).exports,q={data:function(){return{showPopup:!1}},computed:{isDisabled:function(){return this.$store.state._store.cartList.every(function(t){return!t.checked})||this.$store.state._store.isBtnDisabled},totalPrice:function(){return this.$store.state._store.totalPrice},countNum:function(){return this.$store.state._store.cartList.length}},mounted:function(){this.$store.dispatch("getStoreCartList",{store_id:this.$route.params.id})},components:{SubmitBar:B.a,PopupCart:G}},I={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("SubmitBar",{attrs:{price:t.totalPrice,disabled:t.isDisabled,"button-text":"结算"},on:{submit:function(e){t.showPopup=!0}}},[a("div",{staticClass:"btn-card",on:{click:function(e){t.showPopup=!0}}},[a("span",{staticClass:"badge"},[t._v(t._s(t.countNum))]),t._v(" "),a("van-icon",{attrs:{name:"shopping-cart-o"}})],1)]),t._v(" "),a("PopupCart",{model:{value:t.showPopup,callback:function(e){t.showPopup=e},expression:"showPopup"}})],1)},staticRenderFns:[]};var U=a("VU/8")(q,I,!1,function(t){a("nAHo")},"data-v-0e2d2ba8",null).exports,z={data:function(){return{}},props:{info:Object},components:{CategoryView:P,FootSubmitBar:U}},H={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"main-view"},[e("CategoryView",{attrs:{info:this.info}}),this._v(" "),e("FootSubmitBar")],1)},staticRenderFns:[]};var K=a("VU/8")(z,H,!1,function(t){a("NBZo")},"data-v-31ceba02",null).exports,J=Object(s.a)({name:"store-home",data:function(){return{info:{},params:{lng:"",lat:"",store_id:this.$route.params.id||""}}},mounted:function(){var t=this;this.$store.state.config.addons.store?this.$store.dispatch("getBMapLocation").then(function(e){var a=e.location,s=e.address;t.params.lng=a.lng,t.params.lat=a.lat,t.city=s.city,t.loadData()}).catch(function(e){t.$Toast({message:e+"将显示所有门店",duration:3e3}),t.$store.dispatch("getCurrentCityName").then(function(e){t.city=e,t.loadData()})}):this.$refs.load.fail({errorText:"未开启O2O应用",showFoot:!1})},methods:{loadData:function(){var t=this;Object(o.g)(this.params).then(function(e){var a=e.data;t.info=a,t.$refs.load.success()}).catch(function(){})}},beforeDestroy:function(){var t=document.getElementsByTagName("iframe")[0];t&&t.remove()},components:{HomeHeader:v,MainView:K}}),X={render:function(){var t=this.$createElement,e=this._self._c||t;return e("layout",{ref:"load",staticClass:"store-home bg-f8"},[e("HomeHeader",{attrs:{info:this.info}}),this._v(" "),e("MainView",{attrs:{info:this.info}})],1)},staticRenderFns:[]};var W=a("VU/8")(J,X,!1,function(t){a("9zwt")},"data-v-542fd33a",null);e.default=W.exports},"9zwt":function(t,e){},GBVA:function(t,e){},NBZo:function(t,e){},O250:function(t,e){},R1Js:function(t,e,a){"use strict";var s={props:["items"],filters:{distance:function(t){return t+"km"}},methods:{},components:{Star:a("OChx").a}},o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("van-cell-group",{staticClass:"cell-group card-group-box"},[a("van-cell",{attrs:{to:"/store/home/"+t.items.store_id}},[a("div",{staticClass:"info"},[a("van-col",{staticClass:"logo-box",attrs:{span:"10"}},[a("div",{staticClass:"logo e-handle"},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:t.items.store_img,expression:"items.store_img"}],key:t.items.store_img,attrs:{"pic-type":"shop"}})])]),t._v(" "),a("van-col",{staticClass:"text-box",attrs:{span:"14"}},[a("div",[a("span",{staticClass:"shop-name"},[t._v(t._s(t.items.shop_name))]),t._v(" "),a("span",{staticClass:"group-name"},[t._v("("+t._s(t.items.store_name)+")")]),t._v(" "),a("Star",{staticClass:"score",attrs:{value:t.items.score}},[a("span",{staticClass:"distance"},[t._v(t._s(t._f("distance")(t.items.distance)))])])],1)])],1)]),t._v(" "),t.items.goods&&t.items.goods.length>0?a("van-cell",[a("div",{staticClass:"goods-list"},t._l(t.items.goods,function(e,s){return a("router-link",{key:s,staticClass:"item e-handle",attrs:{tag:"div",to:"/goods/detail/"+e.goods_id}},[a("div",{staticClass:"img"},[a("img",{directives:[{name:"lazy",rawName:"v-lazy",value:e.goods_img,expression:"item.goods_img"}],key:e.goods_img,attrs:{"pic-type":"square"}})]),t._v(" "),a("div",{staticClass:"price"},[t._v(t._s(t._f("yuan")(e.price)))])])}))]):t._e()],1)},staticRenderFns:[]};var i=a("VU/8")(s,o,!1,function(t){a("O250")},"data-v-db3c6710",null);e.a=i.exports},Vrpu:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),o=a("R1Js"),i=a("dLkG"),n=a("Llv5"),r=a("msXN"),c=a("oFuF"),l=Object(s.a)({name:"store-search",data:function(){return{show:!1,openType:null,index:null,actions:[{name:"百度地图",type:"bd"}],params:{order:"distance",sort:"ASC",lng:"",lat:"",search_text:this.$route.query.search_text||""}}},mixins:[r.e],mounted:function(){var t=this;this.$store.dispatch("getBMapLocation").then(function(e){var a=e.location,s=e.address;t.params.lng=a.lng,t.params.lat=a.lat,t.city=s.city,t.loadList()}).catch(function(e){t.$Toast({message:e+"将显示所有门店",duration:3e3}),t.$store.dispatch("getCurrentCityName").then(function(e){t.city=e}),t.loadList()})},methods:{setParams:function(t){this.params=t,this.loadList("init")},loadList:function(t){var e=this,a=!1;t&&"init"===t&&e.initList(),e.$route.query.shop_id&&(e.params.shop_id=e.$route.query.shop_id,a=!0),Object(n.h)(e.params,a).then(function(a){var s=a.data,o=s.store_list?s.store_list:[];e.pushToList(o,s.page_count,t)}).catch(function(){e.loadError()})},onSelect:function(t){var e=t.type;this.openType=e,this.show=!1,this.openMap(this[e+"Map"]())},onNavigation:function(t){this.index=t,this.openMap(this.bdMap())},openMap:function(t){location.assign(t)},gdMap:function(t){var e=this.params,a=e.lng,s=e.lat,o=this.list[this.index],i={from:a+","+s+",当前位置",to:o.lng+","+o.lat+","+o.store_name,src:this.$store.state.domain,callnative:1};return"https://uri.amap.com/navigation?"+Object(c.h)(i)},bdMap:function(t){var e=this.params,a=e.lng,s=e.lat,o=this.list[this.index],i={origin:s+","+a,destination:o.lat+","+o.lng,mode:"driving",output:"html",region:this.city,src:this.$store.state.domain};return"http://api.map.baidu.com/direction?"+Object(c.h)(i)},txMap:function(t){var e=this.params,a=e.lng,s=e.lat,o=this.list[this.index],i={type:"drive",fromcoord:s+","+a,to:o.store_name,tocoord:o.lat+","+o.lng,coord_type:1,referer:this.$store.state.domain};return"https://apis.map.qq.com/uri/v1/routeplan?"+Object(c.h)(i)}},beforeDestroy:function(){var t=document.getElementsByTagName("iframe")[0];t&&t.remove()},components:{ListItem:o.a,TabSortScreen:i.a}}),d={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"store-search bg-f8"},[a("Navbar"),t._v(" "),a("TabSortScreen",{attrs:{replace:"","set-params":t.setParams}}),t._v(" "),a("List",{staticClass:"list",attrs:{finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{pageType:"shop",message:"没有相关门店"}},on:{"update:error":function(e){t.error=e},load:t.loadList},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(e,s){return a("ListItem",{key:s,attrs:{items:e},on:{click:function(e){t.onNavigation(s)}}})}))],1)},staticRenderFns:[]};var u=a("VU/8")(l,d,!1,function(t){a("cOK0")},"data-v-172cd2f5",null);e.default=u.exports},cOK0:function(t,e){},dLkG:function(t,e,a){"use strict";var s=a("WyhY"),o={data:function(){return{tab:[{name:"距离",icon:"v-icon-sort2",sort:"distance",sort_type:"DESC"},{name:"销售量",icon:"v-icon-sort2",sort:"sales",sort_type:"DESC"},{name:"人气",icon:"v-icon-sort2",sort:"score",sort_type:"DESC"}],params:{order:"distance",sort:"ASC",lng:"",lat:"",search_text:this.$route.query.search_text||""}}},props:{replace:{type:Boolean,default:!1},setParams:{type:Function,default:null}},methods:{onSort:function(t){var e=this.$parent.params;e.page_index=1,e.order=this.tab[t].sort,this.tab[t].sort_type?(e.sort=this.tab[t].sort_type,"DESC"==this.tab[t].sort_type?this.tab[t].sort_type="ASC":this.tab[t].sort_type="DESC"):e.sort="",this.setParams&&this.setParams(e,"init")}},components:{HeadSearch:s.a}},i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"tab-sort-screen"},[a("HeadSearch",{attrs:{searchType:"store",top:t.$store.state.isWeixin?"0px":"46px",placeholder:t.params.search_text,replace:t.replace}}),t._v(" "),a("van-tabs",{on:{click:t.onSort}},t._l(t.tab,function(e,s){return a("van-tab",{key:s,attrs:{disabled:!1===e.sort}},[a("div",{attrs:{slot:"title"},slot:"title"},[t._v("\n        "+t._s(e.name)+"\n        "),e.icon?a("van-icon",{attrs:{name:e.icon+" "+e.sort_type}}):t._e()],1)])}))],1)},staticRenderFns:[]};var n=a("VU/8")(o,i,!1,function(t){a("pMXY")},"data-v-dd1813a0",null);e.a=n.exports},fgTW:function(t,e){},lttG:function(t,e){},lxdz:function(t,e){},nAHo:function(t,e){},pMXY:function(t,e){},zicx:function(t,e){}});