(self.webpackChunkbigsite=self.webpackChunkbigsite||[]).push([[704],{3704:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>i});const s={props:["subid"],data:function(){return{loading:!1,error:!1,success:!1,subscription:null}},mounted:function(){this.getSub()},methods:{getSub:function(){var t=this;this.loading=!0,axios.get("/api/subscriptions/"+this.subid).then((function(e){t.subscription=e.data,t.loading=!1,console.log(t.subscription)})).catch((function(e){console.log(e),t.loading=!1,t.error=!0}))}}};const i=(0,n(1900).Z)(s,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("transition-group",{attrs:{name:"fade",mode:"out-in"}},[t.subscription?n("div",{key:"subscriptions",staticClass:"table-responsive"},[n("div"),t._v(" "),t.subscription.items.data?n("div",{key:"items",staticClass:"table-responsive"},[n("table",{staticClass:"table"},[n("thead",[n("tr",[n("th",[t._v("Product / service")]),t._v(" "),n("th",[t._v("Quantity")]),t._v(" "),n("th",[t._v("Price")])])]),t._v(" "),n("tbody",t._l(t.subscription.items.data,(function(e){return n("tr",{key:e.id},[n("td",[t._v(t._s(e.plan.product.name))]),t._v(" "),n("td",{staticClass:"text-muted"},[t._v(t._s(e.quantity))]),t._v(" "),n("td",[t._v("\n                                "+t._s(e.quantity?e.plan.amount*e.quantity/100:0)+"\n                                "+t._s(e.plan.currency.toUpperCase())+" / "+t._s(e.plan.interval)+"\n                            ")])])})),0)])]):t._e()]):t._e()])],1)}),[],!1,null,null,null).exports},1900:(t,e,n)=>{"use strict";function s(t,e,n,s,i,o,r,a){var c,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=n,u._compiled=!0),s&&(u.functional=!0),o&&(u._scopeId="data-v-"+o),r?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(r)},u._ssrRegister=c):i&&(c=a?function(){i.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:i),c)if(u.functional){u._injectStyles=c;var d=u.render;u.render=function(t,e){return c.call(e),d(t,e)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,c):[c]}return{exports:t,options:u}}n.d(e,{Z:()=>s})}}]);
//# sourceMappingURL=704.js.map