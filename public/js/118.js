(self.webpackChunkbigsite=self.webpackChunkbigsite||[]).push([[118],{4118:(t,i,e)=>{"use strict";e.r(i),e.d(i,{default:()=>a});const n={props:["userid"],data:function(){return{loading:!0,error:!1,success:!1,notifications:[]}},mounted:function(){var t=this;this.getNotifications(),Echo.private("App.User.".concat(this.userid)).notification((function(i){t.notifications.unshift({data:{title:i.title,message:i.message,action:i.action,action_text:i.action_text},created_at:moment.now()})}))},methods:{timestamp:function(t){return moment(t).fromNow()},redirect:function(t){location.href=t.data.action?t.data.action:"#"},getNotifications:function(){var t=this;this.loading=!0,axios.get("/api/users/"+this.userid+"/notifications").then((function(i){t.notifications=i.data,t.loading=!1,console.log(t.notifications)})).catch((function(i){console.log(i),t.loading=!1,t.error=!0}))}}};const a=(0,e(1900).Z)(n,(function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("transition-group",{staticStyle:{width:"100%"},attrs:{name:"fade",mode:"out-in",tag:"div"}},[t.notifications.length>0?e("div",{key:"notifications",staticClass:"list-group"},t._l(t.notifications,(function(i){return e("article",{staticClass:"list-group-item list-group-item-action action-section round-all-round mt-5",staticStyle:{cursor:"pointer"},attrs:{"data-aos":"fade"},on:{click:function(e){return t.redirect(i)}}},[e("div",{staticClass:"d-flex w-100 justify-content-between"},[e("h5",{staticClass:"mb-1 mt-0"},[t._v(t._s(i.data.title))])]),t._v(" "),e("small",{staticClass:"mt-0"},[e("span",{class:{"text-primary":!i.read_at}},[t._v(t._s(t.timestamp(i.created_at)))]),i.data.action_text?e("span",[t._v("\n                    · Click to "+t._s(i.data.action_text))]):t._e()]),t._v(" "),e("p",{staticStyle:{"white-space":"pre","word-wrap":"break-word"}},[t._v(t._s(i.data.message))])])})),0):t.loading?e("div",{key:"loading",staticClass:"alert",attrs:{"data-aos":"fade"}},[t._v("Loading...")]):e("div",{key:"error",staticClass:"alert text-muted"},[t._v("You have no notifications.")])])}),[],!1,null,null,null).exports},1900:(t,i,e)=>{"use strict";function n(t,i,e,n,a,o,s,r){var c,d="function"==typeof t?t.options:t;if(i&&(d.render=i,d.staticRenderFns=e,d._compiled=!0),n&&(d.functional=!0),o&&(d._scopeId="data-v-"+o),s?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),a&&a.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},d._ssrRegister=c):a&&(c=r?function(){a.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:a),c)if(d.functional){d._injectStyles=c;var l=d.render;d.render=function(t,i){return c.call(i),l(t,i)}}else{var u=d.beforeCreate;d.beforeCreate=u?[].concat(u,c):[c]}return{exports:t,options:d}}e.d(i,{Z:()=>n})}}]);
//# sourceMappingURL=118.js.map