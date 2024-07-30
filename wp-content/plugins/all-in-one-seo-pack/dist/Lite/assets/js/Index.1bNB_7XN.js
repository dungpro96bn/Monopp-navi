import{_ as i}from"./_plugin-vue_export-helper.BN1snXvA.js";import{o,c as r,a as n,G as f,v as _,k as d,b as c,t as u}from"./runtime-dom.esm-bundler.tPRhSV4q.js";const m={props:{scoreColor:String,score:{type:Number,required:!0},strokeWidth:{type:Number,default(){return 2}}},computed:{getClass(){let t="",s="";switch(!0){case 33>=this.score:t="fast",s="stroke-red";break;case 66>=this.score:t="medium",s="stroke-orange";break;default:t="slow",s="stroke-green"}return this.scoreColor!==void 0&&(s=`stroke-${this.scoreColor}`),`${t} ${s}`}}},y={class:"aioseo-seo-site-score-svg",viewBox:"0 0 34 34",xmlns:"http://www.w3.org/2000/svg"},p=["stroke-width","r"],v=["stroke-width","stroke-dasharray","r"];function w(t,s,e,g,a,l){return o(),r("svg",y,[n("circle",{class:"aioseo-seo-site-score__background","stroke-width":e.strokeWidth,fill:"none",cx:"17",cy:"17",r:17-e.strokeWidth/2},null,8,p),n("circle",{class:f(["aioseo-seo-site-score__circle",l.getClass]),"stroke-width":e.strokeWidth,"stroke-dasharray":`${e.score},100`,"stroke-linecap":"round",fill:"none",cx:"17",cy:"17",r:17-e.strokeWidth/2},null,10,v)])}const x=i(m,[["render",w]]),S={},C={class:"aioseo-seo-site-score-svg-loading",viewBox:"0 0 33.83098862 33.83098862",xmlns:"http://www.w3.org/2000/svg"},W=n("circle",{fill:"none",class:"aioseo-seo-site-score-loading__circle",cx:"16.91549431",cy:"16.91549431",r:"15.91549431","stroke-linecap":"round","stroke-width":"2","stroke-dasharray":"93","stroke-dashoffset":"90"},null,-1),b=[W];function $(t,s){return o(),r("svg",C,b)}const B=i(S,[["render",$]]),N={components:{SvgSeoSiteScore:x,SvgSeoSiteScoreLoading:B},props:{score:Number,loading:Boolean,description:String,strokeWidth:{type:Number,default(){return 1.75}}},data(){return{strings:{analyzing:this.$t.__("Analyzing...",this.$td)}}}},z={class:"aioseo-site-score"},L={class:"aioseo-score-amount-wrapper"},A={key:0,class:"aioseo-score-amount"},H={class:"score"},M=n("span",{class:"total"},"/ 100",-1),T=["innerHTML"],V={key:2,class:"score-analyzing"};function q(t,s,e,g,a,l){const h=_("svg-seo-site-score-loading"),k=_("svg-seo-site-score");return o(),r("div",z,[e.loading?(o(),d(h,{key:0})):c("",!0),e.loading?c("",!0):(o(),d(k,{key:1,score:e.score,strokeWidth:e.strokeWidth},null,8,["score","strokeWidth"])),n("div",L,[e.loading?c("",!0):(o(),r("div",A,[n("span",H,u(e.score),1),M])),e.loading?c("",!0):(o(),r("div",{key:1,class:"score-description",innerHTML:e.description},null,8,T)),e.loading?(o(),r("div",V,u(a.strings.analyzing),1)):c("",!0)])])}const G=i(N,[["render",q]]);export{G as C,x as S};
