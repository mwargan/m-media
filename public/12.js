webpackJsonp([12],{"4MOb":function(e,t,n){var o=n("VU/8")(n("onwb"),n("f8ou"),!1,null,null,null);e.exports=o.exports},"VU/8":function(e,t){e.exports=function(e,t,n,o,r,i){var s,c=e=e||{},a=typeof e.default;"object"!==a&&"function"!==a||(s=e,c=e.default);var d,u="function"==typeof c?c.options:c;if(t&&(u.render=t.render,u.staticRenderFns=t.staticRenderFns,u._compiled=!0),n&&(u.functional=!0),r&&(u._scopeId=r),i?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(i)},u._ssrRegister=d):o&&(d=o),d){var l=u.functional,f=l?u.render:u.beforeCreate;l?(u._injectStyles=d,u.render=function(e,t){return d.call(t),f(e,t)}):u.beforeCreate=f?[].concat(f,d):[d]}return{esModule:s,exports:c,options:u}}},f8ou:function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticStyle:{display:"inline"}},[t("button",{staticClass:"button",attrs:{type:"submit"},on:{click:this.downloadWithAxios}},[this._v("Download")])])},staticRenderFns:[]}},onwb:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["url"],data:function(){return{}},mounted:function(){},methods:{forceFileDownload:function(e){var t=window.URL.createObjectURL(new Blob([e.data])),n=document.createElement("a");n.href=t,n.setAttribute("download",e.config.url),document.body.appendChild(n),n.click()},downloadWithAxios:function(){var e=this;axios.get(this.url,{responseType:"arraybuffer"}).then(function(t){console.log(t),e.forceFileDownload(t)}).catch(function(e){return console.log(e)})}}}}});
//# sourceMappingURL=12.js.map