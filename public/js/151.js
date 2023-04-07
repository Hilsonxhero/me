"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[151],{3360:(e,t,n)=>{n.d(t,{Z:()=>c});var l=n(1519),a=n.n(l)()((function(e){return e[1]}));a.push([e.id,".text-center{text-align:center}",""]);const c=a},151:(e,t,n)=>{n.r(t),n.d(t,{default:()=>w});var l=n(4865),a={class:"col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0"},c={class:"ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2"},o={class:"d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"},r=(0,l.createElementVNode)("h1",{class:"h2 m-0"},"Categories",-1),s=(0,l.createElementVNode)("i",{class:"bx bx-plus fs-xl me-2"},null,-1),d=(0,l.createTextVNode)(" Add new category "),i={class:"card p-2 d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 shadow-sm p-md-4"},m={class:"table-responsive w-100"},u={class:"table mb-0"},p=(0,l.createElementVNode)("thead",null,[(0,l.createElementVNode)("tr",null,[(0,l.createElementVNode)("th",null,"#"),(0,l.createElementVNode)("th",null,"title"),(0,l.createElementVNode)("th",null,"parent"),(0,l.createElementVNode)("th",{class:"text-center"},"actions")])],-1),f={scope:"row"},b={class:"d-flex justify-content-end"},x=(0,l.createElementVNode)("i",{class:"bx bx-edit fs-xl me-lg-1 me-xl-2"},null,-1),E=(0,l.createElementVNode)("span",{class:"d-none d-lg-inline"},"Edit",-1),N=["onClick"],V=[(0,l.createElementVNode)("i",{class:"bx bx-trash-alt fs-xl me-lg-1 me-xl-2"},null,-1),(0,l.createElementVNode)("span",{class:"d-none d-lg-inline"},"Delete",-1)];const g={setup:function(e){var t=(0,l.ref)([]);return(0,l.onMounted)((function(){axios.get("/api/admin/categories").then((function(e){var n=e.data;t.value=n.data})).catch((function(e){}))})),function(e,n){var g=(0,l.resolveComponent)("router-link");return(0,l.openBlock)(),(0,l.createElementBlock)("div",a,[(0,l.createElementVNode)("div",c,[(0,l.createElementVNode)("div",o,[r,(0,l.createVNode)(g,{class:"btn btn-outline-primary ps-4",to:{name:"panel admin categories create"}},{default:(0,l.withCtx)((function(){return[s,d]})),_:1})]),(0,l.createElementVNode)("div",i,[(0,l.createElementVNode)("div",m,[(0,l.createElementVNode)("table",u,[p,(0,l.createElementVNode)("tbody",null,[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)((0,l.unref)(t),(function(e,n){return(0,l.openBlock)(),(0,l.createElementBlock)("tr",{key:n},[(0,l.createElementVNode)("th",f,(0,l.toDisplayString)(e.id),1),(0,l.createElementVNode)("td",null,(0,l.toDisplayString)(e.title),1),(0,l.createElementVNode)("td",null,(0,l.toDisplayString)(e.parent),1),(0,l.createElementVNode)("td",b,[(0,l.createVNode)(g,{class:"btn btn-outline-secondary px-3 px-xl-4 me-3",to:{name:"panel admin categories edit",params:{id:e.id}}},{default:(0,l.withCtx)((function(){return[x,E]})),_:2},1032,["to"]),(0,l.createElementVNode)("button",{onClick:function(l){return function(e,n){axios.delete("/api/admin/categories/".concat(e)).then((function(e){e.data,t.value.splice(n,1)})).catch((function(e){}))}(e.id,n)},type:"button",class:"btn btn-outline-danger px-3 px-xl-4"},V,8,N)])])})),128))])])])])])])}}};var h=n(3379),v=n.n(h),k=n(3360),y={insert:"head",singleton:!1};v()(k.Z,y);k.Z.locals;const w=g}}]);