webpackJsonp([16],{"+6iW":function(t,a){},"8gRA":function(t,a,e){"use strict";var n,s=e("Ksny"),o=e("bOdI"),i=e.n(o),r=(e("FO5P"),e("woHG")),c=e("w2Bf"),l=e("scpK"),p=e("PWlj"),u={data:function(){return{params:{},isLoading:!1,showBankCardSms:!1}},props:{value:Boolean},methods:{close:function(){this.$emit("input",!1)},signingClose:function(){this.isLoading=!1},signingSuccess:function(){this.close(),this.$emit("success")},save:function(t){var a=this;t.type=1,this.isLoading=!0,Object(c.p)("add",t).then(function(t){var e=t.code,n=t.data,s=t.message;1==e?n.thpinfo?(a.params.thpinfo=n.thpinfo,a.showBankCardSms=!0):(a.$Toast("获取短信验证失败"),a.isLoading=!1):a.$Toast.success(s)}).catch(function(){a.isLoading=!1})}},beforeDestroy:function(){this.close()},components:(n={},i()(n,r.a.name,r.a),i()(n,"CellBankAutoGroup",p.a),i()(n,"PopupBankCardSms",l.a),n)},d={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("van-popup",{staticClass:"popup-bank-card",attrs:{position:"bottom","close-on-click-overlay":!1},model:{value:t.value,callback:function(a){t.value=a},expression:"value"}},[e("van-nav-bar",{attrs:{title:"添加银行卡","left-text":"返回","left-arrow":"",fixed:"","z-index":999},on:{"click-left":t.close}}),t._v(" "),e("CellBankAutoGroup",{attrs:{loading:t.isLoading,params:t.params},on:{save:t.save}}),t._v(" "),e("PopupBankCardSms",{attrs:{type:"signing",params:t.params},on:{success:t.signingSuccess,close:t.signingClose},model:{value:t.showBankCardSms,callback:function(a){t.showBankCardSms=a},expression:"showBankCardSms"}})],1)},staticRenderFns:[]};var y,h=e("VU/8")(u,d,!1,function(t){e("AXnK")},"data-v-36d1df26",null).exports,f=e("msXN"),_={data:function(){return{showAdd:!1,list:[]}},props:{value:{type:Boolean,default:!1},cardId:[Number,String]},mixins:[f.g],mounted:function(){this.getBankCardList()},methods:{getBankCardList:function(){var t=this;Object(c.k)().then(function(a){var e=a.data,n=t.packageAccountList(e,!0).map(function(t){return 1!=t.type&&4!=t.type||t.agree_id?(t.disabled=!1,t.sort=0):(t.disabled=!0,t.sort=1),t});t.list=n.sort(function(t,a){return t.sort-a.sort})})},close:function(){this.$emit("input",!1)},select:function(t){if(t.disabled)return!1;this.$emit("select",t),this.close()},signingSuccess:function(){this.getBankCardList()}},beforeDestroy:function(){this.close()},components:(y={},i()(y,r.a.name,r.a),i()(y,"CellAccountItem",s.a),i()(y,"PopupAddBankCard",h),y)},m={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("van-popup",{staticClass:"popup-bank-card",attrs:{position:"bottom","close-on-click-overlay":!1},model:{value:t.value,callback:function(a){t.value=a},expression:"value"}},[e("van-nav-bar",{attrs:{title:"银行卡","left-text":"返回","left-arrow":"",fixed:"","z-index":999},on:{"click-left":t.close}}),t._v(" "),e("van-radio-group",{staticClass:"list",model:{value:t.cardId,callback:function(a){t.cardId=a},expression:"cardId"}},[e("van-cell-group",{staticClass:"cell-group"},t._l(t.list,function(a,n){return e("CellAccountItem",{key:n,attrs:{item:a,clickable:!a.disabled},on:{click:function(e){t.select(a)}}},[e("van-radio",{attrs:{slot:"right-icon",name:a.id,disabled:a.disabled},slot:"right-icon"})],1)}))],1),t._v(" "),e("div",{staticClass:"fixed-foot-btn-group"},[e("van-button",{attrs:{size:"normal",type:"danger",round:"",block:""},on:{click:function(a){t.showAdd=!0}}},[t._v("添加银行卡")])],1)],1),t._v(" "),e("PopupAddBankCard",{on:{success:t.signingSuccess},model:{value:t.showAdd,callback:function(a){t.showAdd=a},expression:"showAdd"}})],1)},staticRenderFns:[]};var v=e("VU/8")(_,m,!1,function(t){e("wCHz")},"data-v-52db7432",null).exports,g={data:function(){return{show:!1}},props:{info:[String,Boolean,Object]},computed:{cardId:function(){return this.info&&this.info.id?this.info.id:null}},methods:{onShowBankCard:function(){this.info&&(this.show=!0)},select:function(t){this.$emit("select",t)}},beforeDestroy:function(){this.show=!1},components:{CellAccountItem:s.a,PopupBankCardList:v}},b={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("CellAccountItem",{attrs:{item:t.info,"is-link":""},on:{click:t.onShowBankCard}},[t.info?t._e():e("div",{staticClass:"tlpay-tip",on:{click:function(a){t.show=!0}}},[t._v("选择银行卡")])]),t._v(" "),e("PopupBankCardList",{attrs:{"card-id":t.cardId},on:{select:t.select},model:{value:t.show,callback:function(a){t.show=a},expression:"show"}})],1)},staticRenderFns:[]};var C=e("VU/8")(g,b,!1,function(t){e("IiPl")},"data-v-686c258e",null).exports,k=e("oFuF"),w=e("9GaH"),T={show:!1,balance:0,money:0,paymoney:0},$={data:function(){return{type:this.value}},props:{value:String,title:{type:String,default:"支付方式"},balance:Number,bpay:{type:Boolean,default:!0},wpay:{type:Boolean,default:!0},apay:{type:Boolean,default:!0},ethpay:{type:[Boolean,String,Object],default:function(){return T}},eospay:{type:[Boolean,String,Object],default:function(){return T}},tlpay:{type:Boolean,default:!0},bankCardInfo:[Boolean,String,Object],ppay:{type:Boolean,default:!1}},computed:{payAction:function(){var t=this.$store.getters.config,a=t.ali_pay,e=t.wechat_pay,n=t.bpay,s=t.ethpay,o=t.eospay,i=t.tlpay,r=this.$store.state.member.info.balance,c=this.$store.state.member.memberSetText.balance_style,l=parseFloat(isNaN(this.balance)?r:this.balance),p=[];return n&&this.bpay&&p.push({name:"bpay",icon:"v-icon-balance3",iconcolor:"#ff454e",title:c+"支付",tip:c+" "+l.toFixed(2)+"元",disabled:!l}),e&&this.wpay&&p.push({name:"wechat",icon:"v-icon-wx-pay",iconcolor:"#00c403",title:"微信支付",tip:"",disabled:!1}),a&&this.apay&&p.push({name:"alipay",icon:"v-icon-alipay",iconcolor:"#009fe8",title:"支付宝支付",tip:this.$store.state.isWeixin?"需使用系统浏览器":"",disabled:!1}),this.ethpay.show&&s&&p.push({name:"ethpay",icon:"v-icon-eth",iconcolor:"#f52929",title:"ETH",tip:this.ethpay.loadingText||"余额 "+this.ethpay.balance+" ETH ≈ "+Object(w.yuan)(this.ethpay.money),disabled:!parseFloat(this.ethpay.money)}),this.eospay.show&&o&&p.push({name:"eospay",icon:"v-icon-eos",iconcolor:"#ff8f00",title:"EOS",tip:this.eospay.loadingText||"余额 "+this.eospay.balance+" EOS ≈ "+Object(w.yuan)(this.eospay.money),disabled:!parseFloat(this.eospay.money)}),this.tlpay&&i&&p.push({name:"tlpay",icon:"v-icon-card",iconcolor:"#1a88ff",size:"16px",title:"银行卡",tip:"",disabled:!1}),this.ppay&&p.push({name:"ppay",icon:"v-icon-balance3",iconcolor:"#ff454e",title:"货款支付",tip:c+" "+l.toFixed(2)+"元",disabled:!l}),Object(k.s)(p)?"":p}},methods:{change:function(t){this.$emit("input",t),this.$emit("change",t)},selectBankCard:function(t){this.$emit("selectBankCard",t)}},components:{CellSelectBankCardGroup:C}},P={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("van-radio-group",{on:{change:t.change},model:{value:t.type,callback:function(a){t.type=a},expression:"type"}},[e("van-cell",{attrs:{value:t.title}}),t._v(" "),t.payAction?e("van-cell-group",{attrs:{border:!1}},[t._l(t.payAction,function(a,n){return[e("van-cell",{attrs:{clickable:!a.disabled}},[e("van-icon",{staticClass:"icon",attrs:{slot:"icon",name:a.icon,color:a.iconcolor,size:a.size},slot:"icon"}),t._v(" "),e("div",{staticClass:"text-nowrap",attrs:{slot:"title"},on:{click:function(e){t.type=a.disabled?t.type:a.name}},slot:"title"},[e("span",[t._v(t._s(a.title))]),t._v(" "),a.tip?e("span",{staticClass:"fs-12 text-regular"},[t._v("("+t._s(a.tip)+")")]):t._e()]),t._v(" "),e("van-radio",{attrs:{slot:"right-icon",name:a.name,"label-disabled":a.disabled,disabled:a.disabled},on:{click:function(e){t.type=a.disabled?t.type:a.name}},slot:"right-icon"})],1),t._v(" "),"tlpay"==a.name?e("CellSelectBankCardGroup",{directives:[{name:"show",rawName:"v-show",value:"tlpay"==t.type,expression:"type=='tlpay'"}],attrs:{info:t.bankCardInfo},on:{select:t.selectBankCard}}):t._e()]})],2):e("van-cell",[e("div",{staticClass:"empty",domProps:{textContent:t._s("没有可用的支付方式")}})])],1)},staticRenderFns:[]};var x=e("VU/8")($,P,!1,function(t){e("kdYB")},"data-v-7815ded3",null);a.a=x.exports},AXnK:function(t,a){},C3ok:function(t,a,e){"use strict";var n=e("lpao"),s={props:{info:Object},computed:{newInfo:function(){var t=this.info,a=(t.store_id,t.store_name),e=t.store_tel,n=t.shop_name,s=t.address,o={title:"使用门店"};return o.name=n+"（"+a+"）",o.mobile=e,o.address=s,o}},components:{CellAddressGroup:n.a}},o={render:function(){var t=this.$createElement;return(this._self._c||t)("CellAddressGroup",{attrs:{info:this.newInfo}})},staticRenderFns:[]};var i=e("VU/8")(s,o,!1,function(t){e("cRNC")},"data-v-ebcb06f2",null);a.a=i.exports},CFTu:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var n=e("eKM9"),s=e("oFuF"),o=e("BuIE"),i=Object(n.a)({name:"pay-guide",data:function(){return{iosShow:!1,out_trade_no:null}},mounted:function(){var t=JSON.parse(Object(o.a)(this.$route.query.param)),a=document.createElement("div");a.innerHTML=t,document.body.appendChild(a),this.out_trade_no=JSON.parse(document.querySelector("input[name='biz_content']").value).out_trade_no,this.$store.state.isWeixin?Object(s.t)()?this.iosShow=!0:this.iosShow=!1:document.forms[0].submit(),this.$refs.load.success()},methods:{onResult:function(){this.out_trade_no&&this.$router.replace({name:"pay-result",query:{out_trade_no:this.out_trade_no}})},onBack:function(){var t="/pay/payment?"+this.$route.query.real;this.$router.replace(t)}}}),r={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return t.$store.state.isWeixin?e("Layout",{ref:"load",staticClass:"pay-guide"},[e("Navbar",{attrs:{isMenu:!1,isShowLeft:!1}}),t._v(" "),e("div",{staticClass:"wrap"},[e("img",{staticClass:"indicate",attrs:{src:t.$BASEIMGPATH+"icon_indicate.png"}}),t._v(" "),e("div",{staticClass:"text"},[t._v("\n      请在菜单中选择在浏览器中打开，\n      "),e("br"),t._v("以完成支付\n    ")])]),t._v(" "),t.iosShow?e("div",{staticClass:"iphone"},[e("img",{staticClass:"img",attrs:{src:t.$BASEIMGPATH+"safari_icon_small.png"}}),t._v(" "),e("div",[t._v("在Safari中打开")])]):e("div",{staticClass:"android"},[e("img",{staticClass:"img",attrs:{src:t.$BASEIMGPATH+"android_icon_small.png"}})]),t._v(" "),e("div",{staticClass:"btn-wrap"},[e("van-button",{attrs:{round:"",type:"danger",size:"normal"},on:{click:t.onResult}},[t._v("已支付完成")]),t._v(" "),e("van-button",{attrs:{plain:"",round:"",type:"danger",size:"normal"},on:{click:t.onBack}},[t._v("其他支付方式")])],1)],1):t._e()},staticRenderFns:[]};var c=e("VU/8")(i,r,!1,function(t){e("r3qN")},"data-v-7fe7d1ae",null);a.default=c.exports},Ehu1:function(t,a){},HKZ6:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var n=e("eKM9"),s=e("HiEW"),o=e("msXN"),i=e("xX32"),r=e("C3ok"),c=e("kSb9"),l=e("zcfZ"),p={props:{items:Array},methods:{click:function(t){t.event?this.$emit("click",t):this.$router.replace(t.to)}}},u={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("van-row",{staticClass:"foot",attrs:{type:"flex",justify:"center"}},t._l(t.items,function(a,n){return e("van-button",{key:n,staticClass:"btn",attrs:{type:"default",size:"small"},on:{click:function(e){t.click(a)}}},[t._v(t._s(a.text))])}))},staticRenderFns:[]};var d=e("VU/8")(p,u,!1,function(t){e("nOMX")},"data-v-97b498cc",null).exports,y={props:{message:String}},h={render:function(){var t=this.$createElement,a=this._self._c||t;return a("van-cell-group",[a("van-cell",[a("div",[this._v(this._s(this.message))])])],1)},staticRenderFns:[]};var f=e("VU/8")(y,h,!1,function(t){e("pA/A")},"data-v-28acd434",null).exports,_={render:function(){var t=this.$createElement,a=this._self._c||t;return a("van-cell-group",[a("van-cell",{attrs:{center:"",to:"/prize/list"}},[a("div",{staticClass:"icon-box",attrs:{slot:"icon"},slot:"icon"},[a("van-icon",{attrs:{name:"gift-card",size:"2.5em",color:"#ff976a"}})],1),this._v(" "),a("div",[a("div",[this._v("支付有礼")]),this._v(" "),a("span",{staticClass:"a-link fs-12"},[this._v("前往领取>>")])])])],1)},staticRenderFns:[]};var m=e("VU/8")({},_,!1,function(t){e("+6iW")},"data-v-cd3c912e",null).exports,v=e("oFuF"),g=e("VKKs"),b=Object(n.a)({name:"pay-result",data:function(){return{info:{pay_status:null}}},mixins:[o.i],computed:{navbarTitle:function(){var t=this.info,a="";return"blockchain"==this.pageType?a="提交成功":"integral"==this.pageType&&2==t.pay_status?a="兑换成功":"recharge"==this.pageType?2==t.pay_status?a="充值成功":0==t.pay_status&&(a="充值失败"):"dpay"==this.pageType&&2==t.pay_status?a="提交成功":2==t.pay_status?a="支付成功":0==t.pay_status&&(a="支付失败"),a&&(document.title=a),a},pageType:function(){var t=this.info,a=this.$route.query;return 2==t.order_from?"recharge":t.is_channel?"channel":t.is_integral_order||a.is_integral_order?"integral":2==t.order_type||3==t.order_type||4==t.order_type||11==t.order_type?"microshop":t.group_record_id?"group":2==t.shipping_type?"store":t.card_store&&t.card_store.store_name?"offline":t.pay_gift_status?"paygift":a.blockchain_order?"blockchain":a.dpay_order?"dpay":"mall"},resultStateMessage:function(){var t=this.navbarTitle;return"blockchain"==this.pageType?t="链上交易处理中":"dpay"==this.pageType&&(t="订单提交成功"),t},stateType:function(){return"blockchain"==this.pageType?"pay-success":"recharge"==this.pageType?2==this.info.pay_status?"recharge-success":"recharge-fail":2==this.info.pay_status?"pay-success":"pay-fail"},showGroup:function(){var t=this.info;return"group"==this.pageType&&2==t.pay_status&&t.group_record_id},showAddWxCard:function(){var t=this.info;return"offline"==this.pageType&&2==t.pay_status&&!t.wx_card_state},showOffline:function(){var t=this.info;return"offline"==this.pageType&&2==t.pay_status&&t.card_store},showAddGift:function(){var t=this.info;return"paygift"==this.pageType&&2==t.pay_status&&1==t.pay_gift_status},messageTip:function(){var t="";return"store"==this.pageType&&2==this.info.pay_status?t="O2O订单请前往“订单列表”或“订单详情”查看核销码到对应门店进行核销。":"blockchain"==this.pageType&&(t="虚拟货币交易需要等区块链上处理完成才算支付成功，支付成功后商城才能安排发货，请耐心等待并关注订单状态。"),t},footBtnItems:function(){var t=this.info,a=this.pageType,e=[];return"channel"==a?e.push({text:"微商中心",to:"/channel/centre"},{text:"查看订单",to:"/channel/order/list/"+t.is_channel}):"integral"==a?e.push({text:"继续兑换",to:"/integral/index"},{text:"查看订单",to:"/order/list"}):"microshop"==a?(2!=t.pay_status&&e.push({text:"重新支付",action:"againPay",event:!0}),e.push({text:2==t.pay_status?"前往微店":"返回微店",to:"/microshop/centre"})):"recharge"==a?(2==t.pay_status?e.push({text:"继续购物",to:"/"}):e.push({text:"重新支付",to:"/pay/payment?out_trade_no="+this.$route.query.out_trade_no+"#recharge"}),e.push({text:"账号"+this.$store.state.member.memberSetText.balance_style,to:"/property/balance"})):"blockchain"==a?e.push({text:"继续购物",to:"/"},{text:"查看订单",to:"/order/list"}):"dpay"==a?e.push({text:"继续购物",to:"/"},{text:"查看订单",to:"/order/list"}):(2==t.pay_status?e.push({text:"继续购物",to:"/"}):e.push({text:"重新支付",action:"againPay",event:!0}),e.push({text:"查看订单",to:t.order_id?"/order/detail/"+t.order_id:"/order/list"})),e}},mounted:function(){var t=this.$route.query,a=t.is_integral_order,e=t.pay_status,n=t.blockchain_order,s=t.dpay_order;a?(this.info.is_integral_order=a,this.info.pay_status=e,this.$refs.load.success()):n?(this.info.pay_status=2,this.$refs.load.success()):s?(this.info.pay_status=2,this.$refs.load.success()):this.loadData()},methods:{loadData:function(){var t=this;Object(s.d)(this.$route.query.out_trade_no).then(function(a){var e=a.data;t.info=e,Object(g.c)("shopkeeper_id")&&2==e.pay_status&&Object(g.f)("shopkeeper_id"),t.$refs.load.success()}).catch(function(){t.$refs.load.fail()})},goBack:function(){this.$router.go(-3)},onOperation:function(t){var a=t.event,e=t.action;if(a&&"againPay"==e){var n=this.$route.query.out_trade_no;Object(v.t)()?location.replace(this.$store.state.domain+"/wap/pay/payment?out_trade_no="+n):this.$router.replace({name:"pay-payment",query:{out_trade_no:n}})}}},components:{CellAssemble:i.a,CellStoreInfo:r.a,CellAddWxCard:c.a,ResultBox:l.a,ResultFootGroup:d,CellMessageTip:f,CellAddGift:m}}),C={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("Layout",{ref:"load",staticClass:"pay-result bg-f8"},[e("Navbar",{attrs:{isMenu:!1,title:t.navbarTitle,isShowLeft:!1}}),t._v(" "),e("ResultBox",{attrs:{"state-type":t.stateType,message:t.resultStateMessage}},[e("ResultFootGroup",{attrs:{items:t.footBtnItems},on:{click:t.onOperation}})],1),t._v(" "),t.showGroup?e("CellAssemble",{staticClass:"card-group-box",attrs:{record_id:t.info.group_record_id,replace:""}}):t._e(),t._v(" "),t.showAddWxCard?e("CellAddWxCard",{staticClass:"card-group-box",attrs:{params:t.info.card_ids}}):t._e(),t._v(" "),t.showOffline?e("CellStoreInfo",{staticClass:"card-group-box",attrs:{info:t.info.card_store}}):t._e(),t._v(" "),t.messageTip?e("CellMessageTip",{staticClass:"card-group-box",attrs:{message:t.messageTip}}):t._e(),t._v(" "),t.showAddGift?e("CellAddGift",{staticClass:"card-group-box"}):t._e()],1)},staticRenderFns:[]};var k=e("VU/8")(b,C,!1,function(t){e("P9pB")},"data-v-49d8f981",null);a.default=k.exports},IiPl:function(t,a){},P9pB:function(t,a){},PjAf:function(t,a){},Snia:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var n=e("mvHQ"),s=e.n(n),o=e("eKM9"),i=e("kPQs"),r=e("8gRA"),c=e("0Lro"),l=e("scpK"),p=e("HiEW"),u=e("FWz8"),d=e("ZlPB"),y=e("p+v9"),h=e("msXN"),f=(e("oFuF"),e("BuIE")),_=e("9GaH"),m=Object(o.a)({name:"pay-payment",data:function(){return{out_trade_no:null,payType:null,pay_money:0,endTime:"",bpayPassword:null,balance:0,point:0,isLoading:!1,isShow:!0,integral_data:null,ethpay:{show:!1,balance:0,money:0,paymoney:0,loadingText:null},eospay:{show:!1,balance:0,money:0,paymoney:0,loadingText:null},bankCardInfo:null,bankCardParams:{},showBankCardSms:!1,chargeServiceMoney:0,is_proceeds_pay:!1}},mixins:[h.f],computed:{pageType:function(){var t="buy",a=this.$route.hash;return"#order"==a?t="order":"#recharge"==a?t="recharge":"#channel"==a?t="channel":"#integral"==a&&(t="integral"),t},feeType:function(){var t=null;return"bpay"==this.payType?t=1:"ethpay"==this.payType?t=8:"eospay"==this.payType&&(t=12),t},payMoney:function(){var t=parseFloat(this.pay_money);return"ethpay"!=this.payType&&"eospay"!=this.payType||(this.chargeServiceMoney=parseFloat(this.pay_money),t=this[this.payType].paymoney),t},isShowBPay:function(){return"recharge"!=this.pageType&&!this.is_proceeds_pay},isShowWPay:function(){return!this.is_proceeds_pay},isShowAPay:function(){return!this.is_proceeds_pay},isShowTlPay:function(){return!this.is_proceeds_pay},isShowPPay:function(){return!!this.is_proceeds_pay},disabledPay:function(){return!this.payType},payMoneyText:function(){var t=Object(_.yuan)(this.pay_money);return"ethpay"!=this.payType&&"eospay"!=this.payType||(t=this[this.payType].paymoney+" "+this[this.payType].name),t}},mounted:function(){this.loadData()},methods:{loadData:function(){var t=this;t.$route.query.order_id&&"order"==t.pageType?Object(u.o)(t.$route.query.order_id).then(function(a){t.getPayInfo(a,a.data&&a.data.out_trade_no?a.data.out_trade_no:"")}).catch(function(a){t.$refs.load.fail()}):t.$route.query.order_id&&"channel"==t.pageType?Object(d.k)(t.$route.query.order_id).then(function(a){t.getPayInfo(a,a.data&&a.data.out_trade_no?a.data.out_trade_no:"")}).catch(function(a){t.$refs.load.fail()}):t.$route.query.order_data&&"integral"==t.pageType?(t.integral_data=JSON.parse(Object(f.a)(t.$route.query.order_data)),t.pay_money=t.$route.query.pay_money,t.isShow=!1,Object(y.d)().then(function(a){t.balance=parseFloat(a.data.balance),t.point=a.data.point,t.$refs.load.success()})):(t.out_trade_no=t.$route.query.out_trade_no,Object(p.c)(t.out_trade_no).then(function(a){t.getPayInfo(a,t.out_trade_no)}).catch(function(a){t.$refs.load.fail(),t.$router.back()}))},onPayTypeChange:function(t){"bpay"==t&&this.bpayPassword&&(this.bpayPassword=null)},getPayInfo:function(t,a){1===t.code?(this.endTime=1e3*parseFloat(t.data.end_time),this.pay_money=t.data.pay_money,this.out_trade_no=a,this.balance=parseFloat(t.data.balance),this.is_proceeds_pay=!!t.data.is_proceeds,this.$refs.load.success(),this.getBlockchainPayInfo(a)):2==t.code?this.$router.replace({name:"pay-result",query:{out_trade_no:a}}):(this.$Toast(t.message),this.$router.back())},getBlockchainPayInfo:function(t){var a=this;this.$store.state.config.addons.blockchain&&!this.is_proceeds_pay&&(this.$store.getters.config.ethpay||this.$store.getters.config.eospay)&&(this.ethpay.show=!!this.$store.getters.config.ethpay,this.eospay.show=!!this.$store.getters.config.eospay,this.ethpay.loadingText="ETH余额加载中...",this.eospay.loadingText="EOS余额加载中...",this.$store.dispatch("getBlockchainPayInfo",t).then(function(t){a.ethpay.loadingText=null,a.ethpay.balance=t.eth_balance,a.ethpay.money=t.eth_money,a.ethpay.paymoney=t.eth_paymoney,a.ethpay.name="ETH",a.eospay.loadingText=null,a.eospay.balance=t.eos_balance,a.eospay.money=t.eos_money,a.eospay.paymoney=t.eos_paymoney,a.eospay.name="EOS"}))},onTimeEnd:function(){var t=this;t.$Toast("支付有效时间已过！"),setTimeout(function(){t.$router.back()},1e3)},onPayPassword:function(t){this.bpayPassword=t,"integral"==this.pageType?this.onBpayIntegral():"bpay"==this.payType?this.onBpay():"ethpay"==this.payType||"eospay"==this.payType?this.onBlockchainPay():"ppay"==this.payType&&this.onPpay()},onSelectBankCard:function(t){this.bankCardInfo=t},onPay:function(){var t=this,a=t.payType;if("wechat"===a)t.isLoading=!0,"integral"==t.pageType?(t.integral_data.order_data.pay_type=1,t.$store.dispatch("wxIntegralPay",t.integral_data).then(function(a){var e=a.type,n=a.out_trade_no;"wechat"==e?t.$router.replace({name:"pay-result",query:{out_trade_no:n}}):t.isLoading=!1})):t.$store.dispatch("wxPay",t.out_trade_no).then(function(a){"wechat"==a.type?t.$router.replace({name:"pay-result",query:{out_trade_no:t.out_trade_no}}):t.isLoading=!1}).catch(function(a){t.isLoading=!1});else if("alipay"===a){t.isLoading=!0;var e=document.location.href.split("?")[1];"integral"==t.pageType?(t.integral_data.order_data.pay_type=2,Object(y.f)(t.integral_data).then(function(a){var n=a.data;if(t.$store.state.isWeixin){var o=Object(f.b)(s()(n));t.$router.replace({name:"pay-guide",query:{param:o,real:e}})}else{var i=document.createElement("div");i.innerHTML=n,document.body.appendChild(i),document.forms[0].submit()}}).catch(function(){t.isLoading=!1})):Object(p.e)(t.out_trade_no).then(function(a){var n=a.data;if(t.$store.state.isWeixin){var o=Object(f.b)(s()(n));t.$router.replace({name:"pay-guide",query:{param:o,real:e}})}else{var i=document.createElement("div");i.innerHTML=n,document.body.appendChild(i),document.forms[0].submit()}}).catch(function(){t.isLoading=!1})}else"bpay"===a?"integral"==t.pageType?t.onBpayIntegral():t.onBpay():"ethpay"===a||"eospay"===a?t.onBlockchainPay():"tlpay"===a?t.onTlpay():"ppay"===a&&this.onPpay()},onBpay:function(){var t=this;t.payType;if(t.balance<parseFloat(t.pay_money))return t.$Toast(this.$store.state.member.memberSetText.balance_style+"不足，请选择其他支付方式！"),!1;t.bpayPassword&&(t.isLoading=!0),t.validPayPassword(t.bpayPassword).then(function(){Object(p.f)({out_trade_no:t.out_trade_no,pay_money:t.pay_money}).then(function(a){0==a.code?(t.$Toast.success("支付成功"),t.$router.replace({name:"pay-result",query:{out_trade_no:t.out_trade_no}})):(t.$Toast.fail(a.message),t.isLoading=!1,t.bpayPassword=null)}).catch(function(){t.isLoading=!1,t.bpayPassword=null})}).catch(function(){t.$Toast.clear(),t.isLoading=!1,t.bpayPassword=null})},onBpayIntegral:function(){var t=this;t.bpayPassword&&(t.isLoading=!0),t.validPayPassword(t.bpayPassword).then(function(){t.integral_data.order_data.pay_type=5,t.integral_data.password=t.bpayPassword,Object(y.f)(t.integral_data).then(function(a){t.out_trade_no=a.data.out_trade_no,0==a.code?(t.$Toast.success("支付成功"),t.$router.replace({name:"pay-result",query:{out_trade_no:t.out_trade_no}})):(t.$Toast.fail(a.message),t.isLoading=!1,t.bpayPassword=null)}).catch(function(){t.isLoading=!1,t.bpayPassword=null})}).catch(function(){t.$Toast.clear(),t.isLoading=!1,t.bpayPassword=null})},onPpay:function(){var t=this;t.payType;if(t.balance<parseFloat(t.pay_money))return t.$Toast(this.$store.state.member.memberSetText.balance_style+"不足，请选择其他支付方式！"),!1;t.bpayPassword&&(t.isLoading=!0),t.validPayPassword(t.bpayPassword).then(function(){Object(p.i)({out_trade_no:t.out_trade_no,pay_money:t.pay_money}).then(function(a){0==a.code?(t.$Toast.success("支付成功"),t.$router.replace({name:"pay-result",query:{out_trade_no:t.out_trade_no}})):(t.$Toast.fail(a.message),t.isLoading=!1,t.bpayPassword=null)}).catch(function(){t.isLoading=!1,t.bpayPassword=null})}).catch(function(){t.$Toast.clear(),t.isLoading=!1,t.bpayPassword=null})},onBlockchainPay:function(){var t=this,a=t.payType,e="ethpay"==a?"eth":"eos";if(parseFloat(t[a].balance)<parseFloat(t[a].paymoney))return t.$Toast(e+"余额不足，请选择其他支付方式！"),!1;t.bpayPassword&&(t.isLoading=!0),t.validPayPassword(t.bpayPassword,!0).then(function(){var a={out_trade_no:t.out_trade_no,password:t.bpayPassword};Object(p.h)(e,a).then(function(a){t.$router.replace({name:"pay-result",query:{out_trade_no:t.out_trade_no,blockchain_order:1}})}).catch(function(){t.isLoading=!1,t.bpayPassword=null})}).catch(function(){t.$Toast.clear(),t.isLoading=!1,t.bpayPassword=null})},onTlpay:function(){var t=this;t.payType;if(!t.bankCardInfo)return t.$Toast("请选择银行卡！"),!1;t.bankCardParams.out_trade_no=t.out_trade_no,t.bankCardParams.id=t.bankCardInfo.id,t.bankCardParams.mobile=t.bankCardInfo.mobile,t.isLoading=!0,Object(p.a)(t.bankCardParams).then(function(a){var e=a.code,n=a.data,s=a.message;1==e?n.thpinfo?(t.bankCardParams.thpinfo=n.thpinfo,t.showBankCardSms=!0):(t.$Toast(s),t.isLoading=!0):(t.$Toast(s),t.$router.replace("/order/list"))}).catch(function(){t.isLoading=!1})},bankCardPaySuccess:function(){this.$router.replace({name:"pay-result",query:{out_trade_no:this.out_trade_no}})},bankCardPayClose:function(){this.bankCardParams={},this.isLoading=!1}},components:{CountDown:i.a,CellPayActionGroup:r.a,DialogPayPassword:c.a,PopupBankCardSms:l.a}}),v={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("Layout",{ref:"load",staticClass:"pay-payment bg-f8"},[e("Navbar",{attrs:{isMenu:!1,isShowLeft:!1}}),t._v(" "),e("div",[e("div",{staticClass:"payment-info"},[e("div",[t._v("应付金额")]),t._v(" "),e("div",{staticClass:"money-text"},[t._v(t._s(t.payMoneyText))]),t._v(" "),t.isShow?e("div",{staticClass:"limit-time"},[t._v("\n        请在\n        "),e("CountDown",{attrs:{time:t.endTime,"done-text":"00:00:00"},on:{callback:t.onTimeEnd}},[e("div",{staticClass:"time-end"},[e("span",[t._v("{%h}")]),t._v(" "),e("i",[t._v(":")]),t._v(" "),e("span",[t._v("{%m}")]),t._v(" "),e("i",[t._v(":")]),t._v(" "),e("span",[t._v("{%s}")])])]),t._v("内完成支付\n      ")],1):t._e()]),t._v(" "),e("div",{staticClass:"payment-type"},[e("CellPayActionGroup",{attrs:{balance:t.balance,bpay:t.isShowBPay,wpay:t.isShowWPay,apay:t.isShowAPay,tlpay:t.isShowTlPay,ethpay:t.ethpay,eospay:t.eospay,ppay:t.isShowPPay,bankCardInfo:t.bankCardInfo},on:{change:t.onPayTypeChange,selectBankCard:t.onSelectBankCard},model:{value:t.payType,callback:function(a){t.payType=a},expression:"payType"}})],1)]),t._v(" "),e("DialogPayPassword",{ref:"DialogPayPassword",attrs:{type:t.feeType,money:t.payMoney,"charge-service-money":t.chargeServiceMoney,"load-data":t.loadData},on:{confirm:t.onPayPassword,cancel:function(a){t.isLoading=!1}}}),t._v(" "),e("PopupBankCardSms",{attrs:{params:t.bankCardParams,type:"pay"},on:{success:t.bankCardPaySuccess,close:t.bankCardPayClose},model:{value:t.showBankCardSms,callback:function(a){t.showBankCardSms=a},expression:"showBankCardSms"}}),t._v(" "),e("div",{staticClass:"fixed-foot-btn-group"},[e("van-button",{attrs:{size:"normal",block:"",round:"",type:"primary",disabled:t.disabledPay,loading:t.isLoading},on:{click:t.onPay}},[t._v("确认付款 ("+t._s(t.payMoneyText)+")")])],1)],1)},staticRenderFns:[]};var g=e("VU/8")(m,v,!1,function(t){e("tA9x")},"data-v-7d529b9a",null);a.default=g.exports},XQtn:function(t,a){},cRNC:function(t,a){},kSb9:function(t,a,e){"use strict";var n={props:{params:[String,Number]},computed:{text:function(){return this.$store.state.isWeixin&&this.$store.getters.config.is_wchat?"领取到微信卡包，通过卡包快速核销。":"使用微信访问商城可将该消费卡领取到“微信卡包”以便下次使用。"}},methods:{onAdd:function(){var t=this;this.$store.dispatch("wxAddCard",this.params).then(function(){t.$emit("success")})}}},s={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("van-cell-group",[e("van-cell",{attrs:{center:""}},[e("div",{staticClass:"icon-box",attrs:{slot:"icon"},slot:"icon"},[e("van-icon",{attrs:{name:"v-icon-card",size:"2.5em",color:"#ff976a"}})],1),t._v(" "),e("div",[e("div",[t._v(t._s(t.text))]),t._v(" "),t.$store.state.isWeixin&&t.$store.getters.config.is_wchat?e("span",{staticClass:"a-link fs-12",on:{click:t.onAdd}},[t._v("前往领取>>")]):t._e()])])],1)},staticRenderFns:[]};var o=e("VU/8")(n,s,!1,function(t){e("XQtn")},"data-v-77e733e4",null);a.a=o.exports},kdYB:function(t,a){},nOMX:function(t,a){},"pA/A":function(t,a){},r3qN:function(t,a){},tA9x:function(t,a){},wCHz:function(t,a){},xX32:function(t,a,e){"use strict";var n=e("EQSt"),s={data:function(){return{now_num:0,group_num:0,buyer_list:[]}},props:{record_id:{type:[String,Number],default:0,required:!0},replace:{type:Boolean,default:!1}},mounted:function(){var t=this;t.$store.dispatch("getAssembleDetail",this.record_id).then(function(a){t.now_num=a.now_num,t.group_num=a.group_num,t.buyer_list=a.buyer_list})},components:{AvatarGroup:n.a}},o={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("van-cell-group",[e("van-cell",{attrs:{icon:"v-icon-team","is-link":"",value:"拼团详情",to:"/assemble/detail/"+t.record_id,replace:t.replace}},[e("div",{attrs:{slot:"title"},slot:"title"},[t._v("\n      拼团情况\n      "),e("span",{staticClass:"text-maintone"},[t._v(t._s(t.now_num)+"/"+t._s(t.group_num))])])]),t._v(" "),e("van-cell",[e("AvatarGroup",{attrs:{list:t.buyer_list,group_num:t.group_num}})],1)],1)},staticRenderFns:[]};var i=e("VU/8")(s,o,!1,function(t){e("Ehu1")},"data-v-ffd49a2a",null);a.a=i.exports},zcfZ:function(t,a,e){"use strict";var n={props:{stateType:String,message:String},computed:{text:function(){var t="";if(this.message)t=this.message;else switch(this.stateType){case"pay-success":t="支付成功";break;case"pay-fail":t="支付失败";break;case"recharge-success":t="充值成功";break;case"recharge-fail":t="充值失败";break;case"refund-success":t="同意退款";break;case"refund-fail":t="拒绝退款";break;case"refund-finish":t="完成退款"}return t}}},s={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("van-row",{staticClass:"box",attrs:{type:"flex",justify:"center"}},[e("van-col",{attrs:{span:"8"}},[e("div",{staticClass:"img"},[e("img",{attrs:{src:t.$BASEIMGPATH+"result-"+t.stateType+".png"}})]),t._v(" "),e("div",{staticClass:"message text-center"},[t._v(t._s(t.text))])])],1),t._v(" "),t._t("default")],2)},staticRenderFns:[]};var o=e("VU/8")(n,s,!1,function(t){e("PjAf")},"data-v-aa3b2f76",null);a.a=o.exports}});