webpackJsonp([34],{"79mq":function(t,a){},fjCi:function(t,a){},rQoE:function(t,a,s){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var e=s("eKM9"),i=s("vLgD");var n={data:function(){return{}},filters:{discount:function(t){return parseFloat(t)+"折"}},props:{name:String,couponList:{type:Array,default:[]},giftList:{type:Array,default:[]}}},c={render:function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"success-box"},[s("div",{staticClass:"text"},[s("span",[t._v("恭喜你，成功领取")]),t._v(" "),s("span",{staticClass:"name"},[t._v(t._s(t.name))])]),t._v(" "),s("div",{staticClass:"list-box"},[s("div",{staticClass:"list-group"},[t._l(t.couponList,function(a,e){return s("div",{key:"c_"+e,staticClass:"item"},[s("div",{staticClass:"info"},[s("div",{staticClass:"title"},[3!==a.coupon_genre?s("span",{staticClass:"letter-price price"},[t._v(t._s(t._f("yuan")(a.money)))]):s("span",{staticClass:"price"},[t._v(t._s(t._f("discount")(a.discount)))]),t._v(" "),1!==a.coupon_genre?s("span",[t._v("满"+t._s(a.at_least)+"可用")]):t._e()]),t._v(" "),s("div",{staticClass:"name"},[s("span",[t._v(t._s(a.shop_name))]),t._v(" "),s("span",{staticClass:"fs-12 text-regular"},[t._v(t._s(a.goods_range))])]),t._v(" "),s("div",{staticClass:"time"},[s("span",[t._v(t._s(t._f("formatDate")(a.start_time)))]),t._v("~\n            "),s("span",[t._v(t._s(t._f("formatDate")(a.end_time)))])])])])}),t._v(" "),t._l(t.giftList,function(a,e){return s("div",{key:"g_"+e,staticClass:"item"},[s("div",{staticClass:"info"},[s("div",{staticClass:"title"},[s("span",{staticClass:"letter-price price"},[t._v(t._s(a.gift_voucher_name))])]),t._v(" "),s("div",{staticClass:"name"},[s("span",[t._v(t._s(a.shop_name))])]),t._v(" "),s("div",{staticClass:"time"},[s("span",[t._v(t._s(t._f("formatDate")(a.start_time)))]),t._v("~\n            "),s("span",[t._v(t._s(t._f("formatDate")(a.end_time)))])])])])})],2)])])},staticRenderFns:[]};var o=s("VU/8")(n,c,!1,function(t){s("fjCi")},"data-v-45f9c695",null).exports,r=s("msXN"),v=Object(e.a)({name:"voucherpackage",data:function(){return{isSuccess:!1,isLoading:!1,detail:{},couponList:[],giftList:[]}},mixins:[r.a],computed:{navbarTitle:function(){var t=this.detail.voucher_package_name;return t&&(document.title=t),t},bgStyle:function(){return{minHeight:this.$store.state.isWeixin?"100%":"calc(100% - 46px)"}},backgroundImg:function(){return{backgroundImage:"url("+this.$BASEIMGPATH+"voucherpackage-bg-01.png)"}}},mounted:function(){this.$store.state.config.addons.voucherpackage?this.loadData():this.$refs.load.fail({errorText:"未开启券包应用",showFoot:!1})},methods:{loadData:function(){var t,a=this,s=a.$route.params.id;(t=s,Object(i.a)({url:"/addons/voucherpackage/voucherpackage/voucherPackage",method:"post",data:{voucher_package_id:t}})).then(function(t){var s=t.data;a.detail=s,a.$refs.load.success()}).catch(function(){a.$refs.load.fail()})},onReceive:function(){var t,a=this,s=a.$route.params.id;a.isLoading=!0,(t=s,Object(i.a)({url:"/addons/voucherpackage/voucherpackage/userArchiveVoucherPackage",method:"post",data:{voucher_package_id:t},isWriteIn:!0,isShowLoading:!0})).then(function(t){var s=t.data;a.couponList=s.coupon_type_list,a.giftList=s.gift_voucher_list,a.$Toast.success("领取成功"),setTimeout(function(){a.isLoading=!1,a.isSuccess=!0},500)}).catch(function(){a.isLoading=!1})}},components:{SuccessBox:o}}),u={render:function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("Layout",{ref:"load",staticClass:"voucherpackage"},[s("Navbar",{attrs:{title:t.navbarTitle}}),t._v(" "),s("div",{staticClass:"bg",style:t.bgStyle},[s("transition",{attrs:{name:"van-fade",mode:"out-in"}},[t.isSuccess?s("SuccessBox",{attrs:{name:t.detail.voucher_package_name,couponList:t.couponList,giftList:t.giftList}}):s("div",{staticClass:"img-bg",style:t.backgroundImg},[s("div",{staticClass:"img"},[s("img",{attrs:{src:t.$BASEIMGPATH+"voucherpackage-bg-02.png"}}),t._v(" "),s("div",{staticClass:"name"},[t._v(t._s(t.detail.voucher_package_name))]),t._v(" "),s("div",{staticClass:"btn-box"},[s("van-button",{staticClass:"btn",attrs:{round:"",type:"danger",block:"",loading:t.isLoading,"loading-text":"领取中..."},on:{click:function(a){t.bindMobile("onReceive")}}},[t._v("领取")])],1)])])],1),t._v(" "),s("div",{staticClass:"cell-group"},[s("div",{staticClass:"cell"},[s("div",[s("span",{staticClass:"tag"},[t._v("活动时间")])]),t._v(" "),s("div",[t._v(t._s(t._f("formatDate")(t.detail.start_time,"s"))+" ~ "+t._s(t._f("formatDate")(t.detail.end_time,"s")))])]),t._v(" "),s("div",{staticClass:"cell"},[s("div",[s("span",{staticClass:"tag"},[t._v("活动说明")])]),t._v(" "),s("div",[t._v(t._s(t.detail.desc))])])])],1)],1)},staticRenderFns:[]};var _=s("VU/8")(v,u,!1,function(t){s("79mq")},"data-v-97d98d1a",null);a.default=_.exports}});