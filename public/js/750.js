"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[750],{4793:(e,t,a)=>{a.d(t,{Z:()=>s});var l=a(1519),n=a.n(l)()((function(e){return e[1]}));n.push([e.id,".article__dec p{line-height:2}.article__dec img{border-radius:1.8rem;margin:1.5rem 0}",""]);const s=n},4750:(e,t,a)=>{a.r(t),a.d(t,{default:()=>Y});var l=a(4865),n=a(2119),s=a(1232),c={key:0},r={class:"container pt-4 mt-lg-3","aria-label":"breadcrumb"},i={class:"breadcrumb mb-0"},o={class:"breadcrumb-item"},d=(0,l.createElementVNode)("i",{class:"bx bx-home-alt fs-lg me-1"},null,-1),m=(0,l.createTextVNode)("Home "),b={class:"breadcrumb-item"},u=(0,l.createTextVNode)(" articles "),p={class:"breadcrumb-item active","aria-current":"page"},f={class:"container mt-4 pt-lg-2 pb-3"},g={class:"pb-3",style:{"max-width":"970px"}},x={class:"d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3"},v={class:"d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4"},h={class:"fs-xs border-end pe-3 me-3 mb-2"},N={key:0,class:"badge bg-faded-primary text-primary fs-base"},V={class:"fs-sm border-end pe-3 me-3 mb-2"},E=(0,l.createStaticVNode)('<div class="d-flex mb-2 d-none"><div class="d-flex align-items-center me-3"><i class="bx bx-like fs-base me-1"></i><span class="fs-sm">8</span></div><div class="d-flex align-items-center me-3"><i class="bx bx-comment fs-base me-1"></i><span class="fs-sm">4</span></div><div class="d-flex align-items-center"><i class="bx bx-share-alt fs-base me-1"></i><span class="fs-sm">2</span></div></div>',1),y={class:"jarallax mb-lg-5 mb-4","data-jarallax":"","data-speed":"0.4",style:{height:"36.45vw","min-height":"300px"}},k={class:"container mb-5 pt-4 pb-2 py-mg-4"},w={class:"row gy-4"},_={class:"col-lg-9"},B=["innerHTML"],S=(0,l.createElementVNode)("hr",{class:"mb-4"},null,-1),C={class:"d-flex flex-sm-row flex-column pt-2"},D={class:"d-flex flex-wrap align-items-center"},j=(0,l.createStaticVNode)('<div class="col-lg-3 position-relative"><div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top:105px !important;"><h6>Share this post:</h6><div class="mb-4 pb-lg-3"><a href="#" class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2"><i class="bx bxl-facebook-square"></i></a><a href="#" class="btn btn-icon btn-secondary btn-facebook me-2 mb-2"><i class="bx bx-paper-plane"></i></a><a href="#" class="btn btn-icon btn-secondary btn-twitter me-2 mb-2"><i class="bx bxl-whatsapp"></i></a><a href="#" class="btn btn-icon btn-secondary btn-instagram me-2 mb-2"><i class="bx bxl-instagram"></i></a></div></div></div>',1),T={class:"container mb-5 pt-md-4"},L={class:"d-flex flex-sm-row flex-column align-items-center justify-content-between mb-4 pb-1 pb-md-3"},H=(0,l.createElementVNode)("h2",{class:"h1 mb-sm-0"},"Related Articles",-1),M=(0,l.createTextVNode)(" All posts "),W=(0,l.createElementVNode)("i",{class:"bx bx-right-arrow-alt ms-1 me-n1 lh-1 lead"},null,-1),Z={class:"row"},z={class:"card border-0 shadow-sm h-100 mx-2"},A={class:"position-relative"},F=(0,l.createElementVNode)("a",{href:"#",class:"btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3","data-bs-toggle":"tooltip","data-bs-placement":"left",title:"Read later"},[(0,l.createElementVNode)("i",{class:"bx bx-bookmark"})],-1),R=["src"],q={class:"card-body pb-4"},I={class:"d-flex align-items-center justify-content-between mb-3"},K={key:0,href:"#",class:"badge fs-sm text-nav bg-secondary text-decoration-none"},G={class:"fs-sm text-muted"},J={class:"h5 mb-0"};const O={setup:function(e){var t=(0,l.ref)([]),a=(0,l.ref)([]),O=(0,n.yj)();(0,s.Kf)({title:(0,l.computed)((function(){return t.value.title})),meta:[{name:"description",content:(0,l.computed)((function(){return t.value.description})),key:"description"}]});var P=(0,l.ref)(null);return console.log("sss"),(0,l.onMounted)((function(){console.log("WWW"),P.value=O.params.id,axios.get("/api/application/articles/".concat(P.value)).then((function(e){var l=e.data;t.value=l.data,a.value=l.related_articles})).catch((function(e){}))})),function(e,n){var s=(0,l.resolveComponent)("router-link");return t.value?((0,l.openBlock)(),(0,l.createElementBlock)("div",c,[(0,l.createElementVNode)("nav",r,[(0,l.createElementVNode)("ol",i,[(0,l.createElementVNode)("li",o,[(0,l.createVNode)(s,{to:{name:"home"}},{default:(0,l.withCtx)((function(){return[d,m]})),_:1})]),(0,l.createElementVNode)("li",b,[(0,l.createVNode)(s,{to:{name:"articles index"}},{default:(0,l.withCtx)((function(){return[u]})),_:1})]),(0,l.createElementVNode)("li",p,(0,l.toDisplayString)(t.value.title),1)])]),(0,l.createElementVNode)("section",f,[(0,l.createElementVNode)("h1",g,(0,l.toDisplayString)(t.value.title),1),(0,l.createElementVNode)("div",x,[(0,l.createElementVNode)("div",v,[(0,l.createElementVNode)("div",h,[t.value.category?((0,l.openBlock)(),(0,l.createElementBlock)("span",N,(0,l.toDisplayString)(t.value.category.title),1)):(0,l.createCommentVNode)("",!0)]),(0,l.createElementVNode)("div",V,(0,l.toDisplayString)(t.value.created_at),1),E])])]),(0,l.createElementVNode)("div",y,[(0,l.createElementVNode)("div",{class:"jarallax-img background-fixed",style:(0,l.normalizeStyle)("background-image: url(".concat(t.value.banner_src,")"))},null,4)]),(0,l.createElementVNode)("section",k,[(0,l.createElementVNode)("div",w,[(0,l.createElementVNode)("div",_,[(0,l.createElementVNode)("div",{class:"article__dec",innerHTML:t.value.content},null,8,B),S,(0,l.createElementVNode)("div",C,[(0,l.createElementVNode)("div",D,[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(t.value.tags,(function(e,t){return(0,l.openBlock)(),(0,l.createElementBlock)("span",{class:"badge bg-primary mb-2 me-2",key:t},(0,l.toDisplayString)(e.title),1)})),128))])])]),j])]),(0,l.createElementVNode)("section",T,[(0,l.createElementVNode)("div",L,[H,(0,l.createVNode)(s,{class:"btn btn-lg btn-outline-primary ms-4",to:{name:"articles index"}},{default:(0,l.withCtx)((function(){return[M,W]})),_:1})]),(0,l.createElementVNode)("div",Z,[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(a.value,(function(e,t){return(0,l.openBlock)(),(0,l.createElementBlock)("div",{class:"col-md-4",key:t},[(0,l.createElementVNode)("article",z,[(0,l.createElementVNode)("div",A,[(0,l.createVNode)(s,{class:"position-absolute top-0 start-0 w-100 h-100",to:{name:"articles show",params:{id:e.id,slug:e.slug}}},null,8,["to"]),F,(0,l.createElementVNode)("img",{src:e.banner_src,class:"card-img-top",alt:"Image"},null,8,R)]),(0,l.createElementVNode)("div",q,[(0,l.createElementVNode)("div",I,[e.category?((0,l.openBlock)(),(0,l.createElementBlock)("a",K,(0,l.toDisplayString)(e.category.title),1)):(0,l.createCommentVNode)("",!0),(0,l.createElementVNode)("span",G,(0,l.toDisplayString)(e.created_at),1)]),(0,l.createElementVNode)("h3",J,[(0,l.createVNode)(s,{class:"h5 mb-0",to:{name:"articles show",params:{id:e.id,slug:e.slug}}},{default:(0,l.withCtx)((function(){return[(0,l.createTextVNode)((0,l.toDisplayString)(e.title),1)]})),_:2},1032,["to"])])])])])})),128))])])])):(0,l.createCommentVNode)("",!0)}}};var P=a(3379),Q=a.n(P),U=a(4793),X={insert:"head",singleton:!1};Q()(U.Z,X);U.Z.locals;const Y=O}}]);