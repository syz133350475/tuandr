webpackJsonp([9],{"+Tnx":function(t,e,s){"use strict";var a={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return t.copyright&&"0"!=t.copyright.params.is_show?s("div",{staticClass:"copyright"},[s("div",{staticClass:"vui-copyright"},[s("router-link",{staticClass:"box",class:t.className,attrs:{to:t.copyright.params.linkurl}},["1"==t.copyright.params.showlogo?s("img",{attrs:{src:t._f("BASESRC")(t.copyright.params.src)}}):t._e(),t._v(" "),s("span",{staticClass:"text"},[t._v(t._s(t.copyright.params.text))])])],1)]):t._e()},staticRenderFns:[]};var i=s("VU/8")({name:"copyright",data:function(){return{}},computed:{copyright:function(){return this.$store.state.custom.copyright},className:function(){return"0"!=this.copyright.style.showtype&&this.copyright.style.showtype?"":"flex-column"}}},a,!1,function(t){s("ddJU")},"data-v-49608cd6",null);e.a=i.exports},"4tQh":function(t,e){},CHWI:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("mvHQ"),i=s.n(a),o=s("eKM9"),n=s("iVvP"),r=s("d/4A"),c=s("bOdI"),l=s.n(c),u=(s("10Qn"),s("UQoe")),d=s("//Fk"),p=s.n(d),h=s("Lo3X"),m=s("c5oL"),_=s("JJcu"),f=s("JLLx"),v={data:function(){return{active:-1}},props:{value:Boolean,list:Array},filters:{distance:function(t){return t+"km"}},computed:{show:{get:function(){return this.value},set:function(t){this.$emit("input",t)}}},methods:{change:function(t){this.$emit("select",t),this.$emit("input",!1)}},components:{PopupBottom:f.a}},g={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("PopupBottom",{model:{value:t.show,callback:function(e){t.show=e},expression:"show"}},[s("div",{staticClass:"van-hairline--top-bottom van-actionsheet__header title",attrs:{slot:"title"},slot:"title"},[s("span",{staticClass:"title-text"},[t._v("配送")]),t._v(" "),s("span",{staticClass:"title-tip"},[t._v("(不同门店的库存或价格会有偏差)")]),t._v(" "),s("van-icon",{staticClass:"icon-close",attrs:{name:"close"},on:{click:function(e){t.show=!1}}})],1),t._v(" "),s("van-radio-group",{staticClass:"list",on:{change:t.change},model:{value:t.active,callback:function(e){t.active=e},expression:"active"}},[s("van-cell-group",{staticClass:"cell-group-address",attrs:{border:!1,title:"快递配送"}},[s("van-cell",{attrs:{clickable:""}},[s("van-radio",{staticClass:"item",attrs:{name:-1}},[s("div",{staticClass:"info"},[s("div",{staticClass:"detail"},[s("van-col",{attrs:{span:"24"}},[t._v("线上物流配送，由店铺为您发货。")])],1)])])],1)],1),t._v(" "),t.list.length?s("van-cell-group",{staticClass:"cell-group-store",attrs:{border:!1,title:"门店自提"}},t._l(t.list,function(e,a){return s("van-cell",{key:a,attrs:{clickable:""}},[s("van-radio",{staticClass:"item",attrs:{name:a}},[s("div",{staticClass:"info"},[s("div",{staticClass:"name"},[s("van-col",{attrs:{span:"18"}},[t._v(t._s(e.store_name))]),t._v(" "),s("van-col",{staticClass:"distance",attrs:{span:"6"}},[t._v(t._s(t._f("distance")(e.distance)))])],1),t._v(" "),s("div",{staticClass:"detail"},[s("van-col",{attrs:{span:"24"}},[t._v(t._s(e.address))])],1)])])],1)})):t._e()],1)],1)},staticRenderFns:[]};var b=s("VU/8")(v,g,!1,function(t){s("n1xm")},"data-v-49489113",null).exports,y=s("cgSz"),k=s("4cjj"),C=s("vLgD");var x=s("qsHl"),S={data:function(){return{isShowPopupCoupon:!1,couponList:[],isShowDelivery:!1,storeList:[],deliveryText:"快递配送",showSku:!1,skuAction:"",goodsData:null,promoteParams:{},initialSku:null}},filters:{toNumber:function(t){return parseFloat(t)}},props:{items:Object,loadData:Function},mounted:function(){if(this.$store.state.config.addons.coupontype){var t=this,e=[];t.items.goods_list.forEach(function(t){var s=t.goods_id;e.push(s)}),Object(k.e)({goods_id_array:e}).then(function(e){var s=e.data;s.forEach(function(t){t.loading=!1}),t.couponList=s})}},methods:{onShopChecked:function(){var t=this.items;t.goods_list.forEach(function(e){e.checked=!e.disabled&&!t.checked})},onGoodsChecked:function(){var t=this.items,e=t.goods_list.filter(function(t){return 1==t.checked}).length,s=t.goods_list.filter(function(t){return!t.disabled}).length;t.checked=e==s},onNumChange:function(t,e){var s=this,a=t.num,i=t.max_buy,o=t.stock,n=t.cart_id,r=t.shop_id;if(!(a<=0||this.async)){var c=0===i?o:o>i?i:o,l=a>c?c:a;this.async=!0;var u={cart_id:n,shop_id:r,num:l};this.currentStoreId&&(u.store_id=this.currentStoreId),this.editCart(u).then(function(){s.async=!1})}},onRemove:function(t){var e=this;e.$Dialog.confirm({message:"确定删除该商品？"}).then(function(){(function(t){return Object(C.a)({url:"/goods/delete_car_goods",method:"post",data:{cart_id:t},isWriteIn:!0,isShowLoading:!0})})(t).then(function(t){var s=t.message;e.$Toast.success(s),setTimeout(function(){e.loadData()},100)})})},onStepperLimit:function(t,e){"plus"===t?this.$Toast("已超出最大购买数！"):this.$Toast("至少选择一件！")},tagName:function(t){var e="";switch(t){case 1:e="秒杀";break;case 2:e="团购";break;case 3:e="预售";break;case 4:e="砍价";break;case 5:e="限时折扣"}return e},showTag:function(t){return!!parseInt(t)},showDelivery:function(){var t=this,e=this.items.goods_list.map(function(t){return t.sku_id});this.getLocation().then(function(s){var a={lng:s.lng||"",lat:s.lat||"",shop_id:t.items.shop_id,sku_list:e};t.getStoreList(a),t.isShowDelivery=!0})},getStoreList:function(t){var e=this;this.$store.dispatch("getShopStoreList",t).then(function(t){e.storeList=t||[],e.storeList.forEach(function(t){t.address=t.province_name+t.city_name+t.dictrict_name+t.address})})},getLocation:function(){var t=this;return new p.a(function(e,s){t.$store.dispatch("getBMapLocation").then(function(t){var s=t.location;e(s)}).catch(function(s){t.$Toast(s),e({})})})},selectDelivery:function(t){var e={shop_id:this.items.shop_id,store_id:0};-1==t?(this.deliveryText="快递配送",e.store_id=0):(this.deliveryText=this.storeList[t].store_name,e.store_id=this.storeList[t].store_id),this.currentStoreId=e.store_id,this.getShopCartInfo(e)},getShopCartInfo:function(t){var e,s=this;(e=t,Object(C.a)({url:"/goods/cartGetGoodsList",method:"post",data:e,isShowLoading:!0})).then(function(t){var e=t.data;s.resetShopCartData(e)})},resetShopCartData:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};t.goods_list&&t.goods_list.forEach(function(t){t.promotion_type&&5!=t.promotion_type||!t.stock||!t.state?t.disabled=!0:t.checked=!0}),this.items.goods_list=t.goods_list||[],this.items.discount_info=t.discount_info||{},this.items.mansong_info=t.mansong_info||{}},onAction:function(t,e){var s=this,a={cart_id:this.currentCartId||0,shop_id:e.shopId,sku_list:{sku_id:e.selectedSkuComb.id,num:e.selectedNum}};this.currentStoreId&&(a.store_id=this.currentStoreId),this.editCart(a).then(function(){s.showSku=!1})},onSkuClose:function(){this.goodsData=null},clickSku:function(t){var e=this,s={goods_id:t.goods_id};this.initialSku={id:t.sku_id,num:t.num},this.currentStoreId&&(s.store_id=this.currentStoreId),this.currentCartId=t.cart_id,Object(x.j)(s,{loading:!0}).then(function(t){var s=t.data;e.goodsData=s.goods_detail,e.goodsData.goods_image=s.goods_detail.goods_image_yun,e.goodsData.is_allow_buy="boolean"!=typeof s.is_allow_buy||s.is_allow_buy,e.showSku=!0})},editCart:function(t){var e=this;return new p.a(function(s,a){var i;(i=t,Object(C.a)({url:"/goods/cartEditSkuOrNum",method:"post",data:i,isShowLoading:!0})).then(function(t){var a=t.data;e.resetShopCartData(a),s()}).catch(function(){a()})})}},components:l()({GoodsCard:h.a,PopupCoupon:m.a,CellFullCut:_.a,PopupDeliveryGroup:b,SkuPopup:y.a},u.a.name,u.a)},w={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("van-cell-group",{staticClass:"items card-group-box"},[s("van-cell",{attrs:{"title-class":"cell-title"}},[s("template",{slot:"title"},[s("van-checkbox",{ref:"checkboxes",staticClass:"cell-checkbox",on:{click:t.onShopChecked},model:{value:t.items.checked,callback:function(e){t.$set(t.items,"checked",e)},expression:"items.checked"}},[t._v(t._s(t.items.shop_name))])],1),t._v(" "),t.$store.state.config.addons.store?s("div",{staticClass:"cell-delivery",on:{click:t.showDelivery}},[s("van-icon",{attrs:{name:"location-o",size:"14px"}}),t._v(" "),s("span",{staticClass:"text"},[t._v(t._s(t.deliveryText))])],1):t._e(),t._v(" "),t.couponList.length?s("div",{attrs:{slot:"right-icon"},slot:"right-icon"},[s("span",{staticClass:"shop-title-rigth e-handle",on:{click:function(e){t.isShowPopupCoupon=!0}}},[t._v("领券")])]):t._e()],2),t._v(" "),t._l(t.items.goods_list,function(e,a){return s("van-cell",{key:a,staticClass:"goods-item"},[s("div",{staticClass:"info"},[s("van-checkbox",{attrs:{disabled:e.disabled},on:{change:t.onGoodsChecked},model:{value:e.checked,callback:function(s){t.$set(e,"checked",s)},expression:"item.checked"}}),t._v(" "),s("GoodsCard",{staticClass:"goods-card",attrs:{id:e.goods_id,desc:e.sku_name,thumb:t._f("BASESRC")(e.picture_info)}},[s("div",{staticClass:"info-head",attrs:{slot:"title"},slot:"title"},[s("router-link",{staticClass:"name",attrs:{tag:"div",to:"/goods/detail/"+e.goods_id}},[t.showTag(e.promotion_type)?s("van-tag",{staticClass:"tag",attrs:{type:"danger"}},[t._v(t._s(t.tagName(e.promotion_type)))]):t._e(),t._v("\n            "+t._s(e.goods_name)+"\n          ")],1),t._v(" "),s("div",{staticClass:"price"},[t._v(t._s(t._f("yuan")(e.price)))])],1),t._v(" "),e.sku_name?s("div",{staticClass:"sku-text",attrs:{slot:"desc"},on:{click:function(s){t.clickSku(e)}},slot:"desc"},[s("div",{staticClass:"text"},[t._v(t._s(e.sku_name))]),t._v(" "),s("van-icon",{attrs:{name:"arrow-down",size:"14px"}})],1):t._e(),t._v(" "),s("div",{staticClass:"info-foot",attrs:{slot:"bottom"},slot:"bottom"},[e.stock?[s("van-stepper",{attrs:{integer:"","async-change":"",max:0===e.max_buy?e.stock:e.stock>e.max_buy?e.max_buy:e.stock},on:{change:function(s){t.onNumChange(e,a)},overlimit:t.onStepperLimit},model:{value:e.num,callback:function(s){t.$set(e,"num",s)},expression:"item.num"}}),t._v(" "),s("div",{staticClass:"del e-handle",on:{click:function(s){t.onRemove(e.cart_id)}}},[s("van-icon",{attrs:{name:"delete"}})],1)]:s("div",{staticClass:"text-maintone"},[t._v("库存不足")])],2)])],1)])}),t._v(" "),t.items.mansong_info.rule_id?s("CellFullCut",{attrs:{items:t.items.mansong_info}}):t._e(),t._v(" "),s("PopupCoupon",{attrs:{items:t.couponList,title:t.items.shop_name,"get-type":4},model:{value:t.isShowPopupCoupon,callback:function(e){t.isShowPopupCoupon=e},expression:"isShowPopupCoupon"}}),t._v(" "),t.$store.state.config.addons.store?s("PopupDeliveryGroup",{attrs:{list:t.storeList},on:{select:t.selectDelivery},model:{value:t.isShowDelivery,callback:function(e){t.isShowDelivery=e},expression:"isShowDelivery"}}):t._e(),t._v(" "),t.goodsData?s("SkuPopup",{attrs:{info:t.goodsData,action:"buy",initial:t.initialSku,"promote-params":t.promoteParams},on:{action:t.onAction,close:t.onSkuClose},model:{value:t.showSku,callback:function(e){t.showSku=e},expression:"showSku"}}):t._e()],2)},staticRenderFns:[]};var $=s("VU/8")(S,w,!1,function(t){s("a4Sg")},"data-v-d6edf1da",null).exports,O=s("oFuF"),j=s("BuIE"),L=s("msXN"),E=Object(o.a)({name:"mall-cart",data:function(){return{items:[],cart_id_list:[]}},mixins:[L.a],computed:{isBottom:function(){if(this.$store.state.tabbar.isShowTabbar)return{bottom:"50px"}},isDisabled:function(){return!!Object(O.s)(this.cart_id_list)},allChecked:{get:function(){var t=this;if(this.items.length>0){var e=this.items.map(function(e,s){return e.goods_list.filter(function(t){return 1==t.checked&&!t.disabled}).length==t.items[s].goods_list.filter(function(t){return!t.disabled}).length});return e.filter(function(t){return 1==t}).length==e.length}return!1},set:function(t){this.items.forEach(function(e){e.checked=t,e.goods_list.forEach(function(e){e.checked=!e.disabled&&t})})}},totalPrice:function(){var t=0,e=[],s=[];return this.items.forEach(function(a){a.goods_list.forEach(function(a){a.checked&&(e.push(a.cart_id),s.push({sku_id:a.sku_id,coupon_id:0}),t+=parseFloat(a.price)*parseFloat(a.num))})}),this.cart_id_list=e,this.sku_list=s,t}},mounted:function(){this.loadData()},methods:{loadData:function(t){var e,s=this;(e={page_index:1},Object(C.a)({url:"/goods/cart",method:"post",data:e})).then(function(t){var e=t.data,a=t.code,i=t.message,o=e.shop_info||[];s.items=o.map(function(t){var e=s.items.filter(function(e){return e.shop_id==t.shop_id})[0],a={};return a.shop_id=t.shop_id,a.shop_name=t.shop_name,a.checked=!e||e.checked,a.goods_list=t.goods_list,a.goods_list.forEach(function(t){var s=e?e.goods_list.filter(function(e){return e.goods_id==t.goods_id})[0]:"";t.promotion_type&&5!=t.promotion_type||!t.stock||!t.state?t.disabled=!0:t.checked=!s||s.checked}),a.discount_info=t.discount_info,a.mansong_info=t.mansong_info,a.mansong_info.discount&&(a.mansong_info.discount=parseFloat(t.mansong_info.discount)),a}),3==a&&s.$Toast(i),s.$refs.load.success()}).catch(function(){s.$refs.load.fail()})},onSubmit:function(){var t={order_tag:"cart",cart_from:1};t.cart_id_list=this.cart_id_list,t.sku_list=this.sku_list,this.$router.push({name:"order-confirm",query:{params:Object(j.b)(i()(t))}})}},components:{Empty:n.a,SubmitBar:r.a,CartPanelGroup:$}}),D={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("Layout",{ref:"load",staticClass:"mall-cart bg-f8"},[s("Navbar",{attrs:{isMenu:!1}}),t._v(" "),t.items.length>0?s("div",{staticClass:"cart-list"},t._l(t.items,function(e,a){return s("CartPanelGroup",{key:a,ref:"cartPanel",refInFor:!0,attrs:{items:e,"load-data":t.loadData}})})):s("Empty",{attrs:{"page-type":"cart",bottom:"100","btn-text":"去逛逛","btn-link":"/mall/index"}}),t._v(" "),s("SubmitBar",{style:t.isBottom,attrs:{price:t.totalPrice,disabled:t.isDisabled,"button-text":"结算"},on:{submit:function(e){t.bindMobile("onSubmit")}}},[s("van-checkbox",{staticClass:"all-check-btn",model:{value:t.allChecked,callback:function(e){t.allChecked=e},expression:"allChecked"}},[t._v("全选")])],1)],1)},staticRenderFns:[]};var P=s("VU/8")(E,D,!1,function(t){s("ZPOM")},"data-v-076353b0",null);e.default=P.exports},JJcu:function(t,e,s){"use strict";var a={props:{items:Object},filters:{toNumber:function(t){return parseFloat(t)}},methods:{discount:function(t){return parseFloat(t)>0}}},i={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("van-cell",{staticClass:"discount-group"},[t.items.man_song_id&&parseFloat(t.items.discount)>0?s("div",{staticClass:"item"},[s("div",{staticClass:"box"},[s("van-tag",{attrs:{type:"danger"}},[t._v("满减")]),t._v(" "),s("span",{staticClass:"text-nowrap"},[t._v("订单满"+t._s(t._f("toNumber")(t.items.price))+"减"+t._s(t._f("toNumber")(t.items.discount)))])],1)]):t._e(),t._v(" "),1==t.items.free_shipping?s("div",{staticClass:"item"},[s("div",{staticClass:"box"},[s("van-tag",{attrs:{type:"success"}},[t._v("包邮")]),t._v(" "),s("span",{staticClass:"text text-nowrap"},[t._v("订单满"+t._s(t._f("toNumber")(t.items.price))+"包邮")])],1)]):t._e(),t._v(" "),t.items.coupon_type_id?s("div",{staticClass:"item"},[s("div",{staticClass:"box"},[s("van-tag",{attrs:{type:"primary"}},[t._v("满送")]),t._v(" "),s("span",{staticClass:"text text-nowrap"},[t._v("订单满"+t._s(t._f("toNumber")(t.items.price))+"送优惠券("+t._s(t.items.coupon_type_name)+")")])],1)]):t._e(),t._v(" "),t.items.gift_card_id?s("div",{staticClass:"item"},[s("div",{staticClass:"box"},[s("van-tag",{attrs:{type:"primary"}},[t._v("满送")]),t._v(" "),s("span",{staticClass:"text text-nowrap"},[t._v("订单满"+t._s(t._f("toNumber")(t.items.price))+"送礼品券("+t._s(t.items.gift_voucher_name)+")")])],1)]):t._e(),t._v(" "),t.items.gift_id?s("div",{staticClass:"item"},[s("div",{staticClass:"box"},[s("van-tag",{attrs:{type:"primary"}},[t._v("满送")]),t._v(" "),s("span",{staticClass:"text text-nowrap"},[t._v("订单满"+t._s(t._f("toNumber")(t.items.price))+"送赠品("+t._s(t.items.gift_name)+")")])],1)]):t._e()])},staticRenderFns:[]};var o=s("VU/8")(a,i,!1,function(t){s("KESx")},"data-v-30fcb1ce",null);e.a=o.exports},KESx:function(t,e){},Ue61:function(t,e){},VAb0:function(t,e){},Vo89:function(t,e){},WO5Q:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("eKM9"),i=s("muf+"),o=s("NiMi"),n=s("+Tnx"),r=s("VKKs"),c={advshow:"0",advimg:"/public/platform/images/custom/default/adv-1.jpg",advlink:"",advrule:"0"},l={data:function(){return{show:!1}},mounted:function(){Object(r.a)("popupAdvRule")||"1"!=this.params.advshow?this.day||"1"!=this.params.advshow?parseInt(Object(r.a)("popupAdvRule"))!==this.day&&Object(r.g)("popupAdvRule",this.day,this.day):(this.show=!0,Object(r.d)("popupAdvRule")):this.show=!0},computed:{params:function(){return this.$store.getters.config.wap_pop||c},day:function(){var t=this.$store.getters.config.wap_pop||c,e=parseInt(t.advrule),s=0;return e&&(1==e?s=1:2==e?s=3:3==e?s=5:4==e&&(s=30)),s}},methods:{onCLose:function(){this.day?Object(r.g)("popupAdvRule",this.day,this.day):Object(r.d)("popupAdvRule")}},components:{PopupAdvertise:s("yjsd").a}},u={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return"1"==t.params.advshow?s("PopupAdvertise",{attrs:{"img-src":t._f("BASESRC")(t.params.advimg),link:t.params.advlink},on:{close:t.onCLose},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}}):t._e()},staticRenderFns:[]},d=s("VU/8")(l,u,!1,null,null,null).exports,p=Object(a.a)({name:"mall-index",data:function(){return{page:{}}},computed:{pageStyle:function(){return{background:this.page.background}},items:function(){return this.$store.state.custom.template.items}},activated:function(){this.page.title&&(document.title=this.page.title)},mounted:function(){var t=this.$store.state.custom.template;t?(this.page=t.page,this.page.title&&(document.title=this.page.title),this.$refs.load.success()):this.$refs.load.fail()},components:{InviteWechat:i.a,CustomGroup:o.a,Copyright:n.a,HomePopupAdv:d}}),h={render:function(){var t=this.$createElement,e=this._self._c||t;return e("Layout",{ref:"load",staticClass:"mall-index",style:this.pageStyle},[e("InviteWechat"),this._v(" "),e("CustomGroup",{attrs:{type:"1",items:this.items}}),this._v(" "),e("Copyright"),this._v(" "),e("HomePopupAdv")],1)},staticRenderFns:[]};var m=s("VU/8")(p,h,!1,function(t){s("noUL")},"data-v-767d0c9c",null);e.default=m.exports},ZPOM:function(t,e){},a4Sg:function(t,e){},b45b:function(t,e){},ddJU:function(t,e){},gk9c:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a={name:"unopened",computed:{message:function(){var t=this.$store.state.config.close_reason?this.$store.state.config.close_reason:this.$store.getters.config.close_reason;return document.title="很抱歉，本商城已经关闭！",'很抱歉，本商城已经关闭！<p class="close-reason">\n        关闭原因：'+t+"\n      </p>"}},components:{Empty:s("iVvP").a}},i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"unopened"},[e("Empty",{attrs:{"page-type":"unopened",message:this.message,"show-foot":!1}})],1)},staticRenderFns:[]};var o=s("VU/8")(a,i,!1,function(t){s("Ue61")},null,null);e.default=o.exports},ixkM:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a,i=s("bOdI"),o=s.n(i),n=(s("1E9F"),s("2Ux5")),r=(s("RgoE"),s("0KWt")),c=s("Dd8w"),l=s.n(c),u=s("eKM9"),d=s("3XIS"),p=s("+Tnx"),h=Object(u.a)({name:"preview",data:function(){return{}},computed:{filterData:function(){var t=document.getElementById("app").getAttribute("data-custom"),e=["goods","shop","seckill","seckill","member_fixed","member_assets_fixed","member_order_fixed","shop_head","detail_fixed","commission_fixed"],s={page:{},tabbar:{data:{}},items:{},copyright:""};for(var a in t&&(s=JSON.parse(t)),s.items)-1!=e.indexOf(s.items[a].id)&&(s.items[a].id=s.items[a].id+"_preview");return console.log(s),s},pageType:function(){return this.filterData.page.type?this.filterData.page.type:1},items:function(){return this.filterData.items},copyright:function(){return this.filterData.copyright},tabbar:function(){return this.filterData.tabbar.data}},components:l()({},d.c,(a={Copyright:p.a},o()(a,r.a.name,r.a),o()(a,n.a.name,n.a),a))}),m={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"preview"},[t._l(t.items,function(t,e){return s("tpl_"+t.id,{key:e,tag:"component",attrs:{item:t}})}),t._v(" "),!t.copyright||1!=t.pageType&&4!=t.pageType?t._e():s("Copyright",{attrs:{copyright:t.copyright}}),t._v(" "),1==t.pageType||4==t.pageType?s("nav",{staticClass:"tabbar"},[s("van-tabbar",{attrs:{"z-index":999},model:{value:t.$store.state.tabbar.activeTabbar,callback:function(e){t.$set(t.$store.state.tabbar,"activeTabbar",e)},expression:"$store.state.tabbar.activeTabbar"}},t._l(t.tabbar,function(e,a){return s("van-tabbar-item",{key:a,attrs:{to:e.path},scopedSlots:t._u([{key:"icon",fn:function(a){return s("img",{attrs:{src:t._f("BASESRC")(a.active?e.active:e.normal)}})}}])},[s("span",[t._v(t._s(e.text))])])}))],1):t._e()],2)},staticRenderFns:[]};var _=s("VU/8")(h,m,!1,function(t){s("4tQh")},"data-v-5876706e",null);e.default=_.exports},kXhe:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("eKM9"),i=s("NiMi"),o=Object(a.a)({name:"diy-page",data:function(){return{items:{},page:{}}},watch:{pageid:function(t){t&&(this.$refs.load.init(),this.getCustom())}},computed:{pageid:function(){return this.$route.params.pageid},pageStyle:function(){return{background:this.page.background}}},mounted:function(){this.getCustom()},methods:{getCustom:function(){var t=this;this.$store.dispatch("getCustom",{type:6,id:this.pageid}).then(function(e){e.template_data&&(t.items=e.template_data.items,t.page=e.template_data.page,t.page.title&&(document.title=t.page.title)),t.$refs.load.success()}).catch(function(){t.$refs.load.fail()})}},components:{CustomGroup:i.a}}),n={render:function(){var t=this.$createElement,e=this._self._c||t;return e("Layout",{ref:"load",staticClass:"diy-page",style:this.pageStyle},[e("CustomGroup",{attrs:{type:"6",items:this.items}})],1)},staticRenderFns:[]};var r=s("VU/8")(o,n,!1,function(t){s("b45b")},"data-v-539ab56e",null);e.default=r.exports},n1xm:function(t,e){},noUL:function(t,e){},rjtc:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("msXN"),i=s("iVvP"),o={name:"nowechat",computed:{message:function(){return document.title="该商城未对接公众号",'<p class="nowechat-text">该商城未对接公众号</p><p class="text">\n        请使用手机浏览器访问\n      </p>'}},mixins:[a.b],components:{Empty:i.a}},n={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"nowechat"},[e("Empty",{attrs:{"page-type":"fail",message:this.message}},[e("van-cell-group",{staticClass:"group-box",attrs:{slot:"footer",border:!1},slot:"footer"},[e("van-field",{staticClass:"field",attrs:{center:"",disabled:"",value:this.$store.state.domain+"/wap/"}},[e("van-button",{staticClass:"a-copy",attrs:{slot:"button",size:"mini",type:"danger","data-clipboard-text":this.$store.state.domain+"/wap/"},on:{click:this.onCopy},slot:"button"},[this._v("复制")])],1)],1)],1)],1)},staticRenderFns:[]};var r=s("VU/8")(o,n,!1,function(t){s("VAb0")},null,null);e.default=r.exports},wCTp:function(t,e,s){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=s("bOdI"),i=s.n(a),o=(s("4yKu"),s("wolx")),n=s("eKM9"),r=s("WyhY"),c=s("VKKs"),l=Object(n.a)({name:"search",data:function(){return{placeholder:"请输入搜索关键词",path:"",historyList:[],type:""}},created:function(){var t=this.$route.query,e=t.type,s=t.shop_id,a="/goods/list?search_text=";"goods"===e?(a="/goods/list?search_text=",s&&(a="/goods/list?shop_id="+s+"&search_text=")):"shop"===e?a="/shop/search?search_text=":"microshopchoose"===e?a="/microshop/choosegoods/list?search_text=":"microshoppreview"===e?a="/microshop/preview/list?search_text=":"integralgoods"===e?a="/integral/goods/list?search_text=":"store"===e&&(a="/store/search?search_text="),this.type=e,this.path=a,Object(c.b)("history_key_"+e)&&(this.historyList=Object(c.b)("history_key_"+e))},methods:{onBack:function(){this.$router.back()},onSearch:function(t){var e=this.path,s=t.trim();if(!s)return this.$Toast("内容不能为空");this.saveHistory(s),this.$router.push({path:e,query:{search_text:s}})},insertArray:function(t,e,s,a){var i=t.findIndex(s);0!==i&&(i>0&&t.splice(i,1),t.unshift(e),a&&t.length>a&&t.pop())},saveHistory:function(t){var e=Object(c.b)("history_key_"+this.type)?Object(c.b)("history_key_"+this.type):[];return this.insertArray(e,t,function(e){return e===t},15),Object(c.h)("history_key_"+this.type,e),e},removeHistory:function(){var t=this;t.$Dialog.confirm({title:"提示",message:"确定删除所有历史记录？"}).then(function(){Object(c.e)("history_key_"+t.type),t.historyList=[]}).catch(function(){})}},components:i()({HeadSearch:r.a},o.a.name,o.a)}),u={render:function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"search bg-f8"},[s("HeadSearch",{attrs:{disabled:!1,showLeft:"","show-action":"",placeholder:t.placeholder},on:{rightAction:t.onSearch}}),t._v(" "),t.historyList.length>0?s("div",{staticClass:"search-history"},[s("div",{staticClass:"history-head"},[t._v("历史搜索")]),t._v(" "),s("div",{staticClass:"history-list"},[s("van-cell-group",t._l(t.historyList,function(e,a){return s("van-cell",{key:a,attrs:{clickable:"",value:e,to:t.path+e}})}))],1),t._v(" "),s("div",{staticClass:"history-foot"},[s("van-button",{attrs:{round:""},on:{click:t.removeHistory}},[t._v("清空历史记录")])],1)]):s("div",{staticClass:"empty"},[t._v("暂无搜索记录")])],1)},staticRenderFns:[]};var d=s("VU/8")(l,u,!1,function(t){s("Vo89")},"data-v-ced06424",null);e.default=d.exports}});