import{g as x,f as K,e as N,s as B}from"./links.DOdXC3mL.js";import{C as G}from"./Blur.CvHKqkVq.js";import{C as q}from"./Card.DPoAfijm.js";import{G as M,a as j}from"./Row.DRnp1mVs.js";import{G as z,S as E}from"./SeoStatisticsOverview.DVV10dKi.js";import{_ as C}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as n,o as d,c as k,B as c,b,k as S,l as i,a as _,E as D,t as p,C as w,m as F,G as V}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{K as W}from"./KeywordsGraph.Bkz57agl.js";import{n as U}from"./numbers.BT5e8rgb.js";import{W as J}from"./WpTable.CB8ECU67.js";import{P as A}from"./PostTypes.Cef6XkQ_.js";import{S as L,T as Q,c as X,L as Y}from"./LicenseConditions.B4Sa4TBi.js";import{C as Z}from"./Tooltip.DhkkBQWW.js";import{C as O}from"./Table.JF4U36kH.js";import{C as H}from"./Index.DyvJ1GBk.js";import{b as tt,a as et}from"./Caret.Ke5gylGO.js";import{R as st}from"./RequiredPlans.BRtESoGg.js";import"./default-i18n.DXRQgkn2.js";import"./helpers.CXsRrhc8.js";import"./index.BR_tv7_M.js";import"./Slide.fjAuzpC8.js";import"./_baseClone.CzWhSj00.js";import"./_arrayEach.Fgt6pfHj.js";import"./_getTag.BWQxgJie.js";import"./license.BEch2NZa.js";import"./upperFirst.yVnsg4QL.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.zLSwYOtv.js";import"./constants.qeJG2F0i.js";import"./addons.Z32PCU1d.js";const it={setup(){return{searchStatisticsStore:x()}},components:{Graph:z},computed:{series(){var h,r;if(!((r=(h=this.searchStatisticsStore.data)==null?void 0:h.keywords)!=null&&r.distribution))return[];const t=this.searchStatisticsStore.data.keywords.distribution;return[{name:this.$t.__("Keywords",this.$td),data:[{x:this.$t.__("Top 3 Position",this.$td),y:t.top3,fillColor:"#005AE0"},{x:this.$t.__("4-10 Position",this.$td),y:t.top10,fillColor:"#00AA63"},{x:this.$t.__("11-50 Position",this.$td),y:t.top50,fillColor:"#F18200"},{x:this.$t.__("50-100 Position",this.$td),y:t.top100,fillColor:"#DF2A4A"}]}]}}},ot={class:"aioseo-search-statistics-keywords-distribution-graph"};function rt(t,h,r,l,e,a){const u=n("graph");return d(),k("div",ot,[c(u,{series:a.series,loading:l.searchStatisticsStore.loading.keywords,preset:"keywordsDistribution"},null,8,["series","loading"])])}const nt=C(it,[["render",rt]]),at={setup(){return{searchStatisticsStore:x()}},components:{CoreLoader:tt,CoreWpTable:O,Statistic:L},mixins:[A],props:{index:{type:Number,required:!0},postDetail:{type:Boolean,required:!1,default:!1}},data(){return{numbers:U,loading:!1}},computed:{postColumns(){return[{slug:"post_title",label:this.$t.__("Title",this.$td),width:"100%"},{slug:"clicks",label:this.$t.__("Clicks",this.$td),width:"120px"},{slug:"ctr",label:this.$t.__("Avg. CTR",this.$td),width:"120px"},{slug:"impressions",label:this.$t.__("Impressions",this.$td),width:"120px"},{slug:"position",label:this.$t.__("Position",this.$td),width:"120px"}]},keywords(){return this.postDetail?this.searchStatisticsStore.data.postDetail.keywords.paginated.rows:this.searchStatisticsStore.data.keywords.paginated.rows},row(){return this.keywords[this.index]}},methods:{openPostDetail(t){this.$router.push({path:"/post-detail",query:{postId:t.postId,previousRoute:this.$route.name}})}},mounted(){var t,h;!this.row||(h=(t=this.row)==null?void 0:t.pages)!=null&&h.length||(this.loading=!0,this.searchStatisticsStore.getPagesByKeywords([this.row.keyword]).then(r=>{this.loading=!1;const l=r[this.row.keyword];l&&(this.postDetail?this.searchStatisticsStore.data.postDetail.keywords.paginated.rows[this.index].pages=Object.values(l).slice(0,10):this.searchStatisticsStore.data.keywords.paginated.rows[this.index].pages=Object.values(l).slice(0,10))}))}},lt={class:"keyword-inner"},ct={key:0,class:"keyword-inner-loading"},dt={class:"post-title"},ht=["onClick"],pt={key:1,class:"post-title"},ut={key:0,class:"row-actions"},ft=["href"],gt=["href"];function _t(t,h,r,l,e,a){const u=n("core-loader"),g=n("statistic"),m=n("core-wp-table");return d(),k("div",lt,[e.loading?(d(),k("div",ct,[c(u,{dark:""})])):b("",!0),a.row.pages&&!e.loading?(d(),S(m,{ref:"table",class:"posts-table",key:1,columns:a.postColumns,rows:a.row.pages,"show-header":!1,"show-bulk-actions":!1,"show-table-footer":!1},{post_title:i(({row:s})=>[_("div",dt,[s.postId?(d(),k("a",{key:0,href:"#",onClick:D(P=>a.openPostDetail(s),["prevent"])},p(s.postTitle),9,ht)):(d(),k("span",pt,p(s.postTitle),1))]),s.postId?(d(),k("div",ut,[_("span",null,[_("a",{class:"view",href:s.context.permalink,target:"_blank"},[_("span",null,p(t.viewPost(s.context.postType.singular)),1)],8,ft),w(" | ")]),_("span",null,[_("a",{class:"edit",href:s.context.editLink,target:"_blank"},[_("span",null,p(t.editPost(s.context.postType.singular)),1)],8,gt)])])):b("",!0)]),clicks:i(({row:s})=>[w(p(e.numbers.compactNumber(s.clicks)),1)]),ctr:i(({row:s})=>[w(p(s.ctr)+"% ",1)]),impressions:i(({row:s})=>[w(p(e.numbers.compactNumber(s.impressions)),1)]),position:i(({row:s})=>[s.difference.comparison?(d(),S(g,{key:0,type:"position",total:s.position,difference:s.difference.position},null,8,["total","difference"])):b("",!0)]),_:1},8,["columns","rows"])):b("",!0)])}const mt=C(at,[["render",_t]]),wt={setup(){return{licenseStore:K(),searchStatisticsStore:x(),settingsStore:N()}},components:{CoreTooltip:Z,CoreWpTable:O,Cta:H,KeywordInner:mt,Statistic:L,SvgCaret:et},mixins:[A,J,Q],data(){return{numbers:U,tableId:"aioseo-search-statistics-keywords-table",activeRow:-1,showUpsell:!1,isPreloading:!1,isFetching:!1,interval:null,sortableColumns:[],strings:{position:this.$t.__("Position",this.$td),ctaButtonText:this.$t.__("Unlock Keyword Tracking",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Keyword Tracking is a %1$s Feature",this.$td),"PRO")}}},props:{keywords:Object,loading:{type:Boolean,default(){return!1}},showHeader:{type:Boolean,default(){return!0}},showTableFooter:Boolean,showItemsPerPage:Boolean,columns:{type:Array,default(){return["keyword","clicks","ctr","impressions","position","diffPosition","buttons"]}},appendColumns:{type:Object,default(){return{}}},postDetail:{type:Boolean,default(){return!1}},refreshOnLoad:{type:Boolean,default(){return!0}},page:{type:String,default(){return""}}},computed:{changeItemsPerPageSlug(){return this.postDetail?"searchStatisticsPostDetailKeywords":"searchStatisticsKeywordRankings"},allColumns(){var r,l;const t=X(this.columns),h=((l=(r=this.keywords)==null?void 0:r.filters)==null?void 0:l.find(e=>e.active))||{};return this.appendColumns[h.slug||"all"]&&t.push(this.appendColumns[h.slug||"all"]),t.map(e=>(e.endsWith("Sortable")&&(e=e.replace("Sortable",""),this.sortableColumns.push(e)),e))},tableColumns(){return[{slug:"keyword",label:this.$t.__("Keyword",this.$td)},{slug:"clicks",label:this.$t.__("Clicks",this.$td),width:"80px"},{slug:"ctr",label:this.$t.__("Avg. CTR",this.$td),width:"100px"},{slug:"impressions",label:this.$t.__("Impressions",this.$td),width:"120px"},{slug:"position",label:this.$t.__("Position",this.$td),width:"85px"},{slug:"diffDecay",label:this.$t.__("Diff",this.$td),width:"95px"},{slug:"diffPosition",label:this.$t.__("Diff",this.$td),width:"80px"},{slug:"buttons",label:"",width:this.hasSlot("buttons")?"240px":"40px"}].filter(t=>this.allColumns.includes(t.slug)).map(t=>(t.sortable=this.isSortable&&this.sortableColumns.includes(t.slug),t.sortable&&(t.sortDir=t.slug===this.orderBy?this.orderDir:"asc",t.sorted=t.slug===this.orderBy),t))},isSortable(){return this.filter==="all"&&this.$isPro&&!this.licenseStore.isUnlicensed}},methods:{sanitizeString:B,isRowActive(t){return t===this.activeRow},toggleRow(t){if(this.activeRow===t){this.activeRow=-1;return}this.activeRow=t},fetchData(t){return this.isPreloading=!1,this.isFetching=!0,this.page!==""&&(t={...t,page:this.page}),this.postDetail?this.searchStatisticsStore.updatePostDetailKeywords(t).finally(()=>{this.isFetching=!1}):this.searchStatisticsStore.updateKeywords(t).finally(()=>{this.isFetching=!1})},hasSlot(t="default"){return!!this.$slots[t]},shouldLimitText(t){return 120<B(t).length},maybePreloadPages(){if(!(!this.$isPro||this.licenseStore.isUnlicensed||!this.searchStatisticsStore.isConnected||this.isPreloading)){if(this.isFetching&&!this.interval){this.interval=setInterval(()=>{this.isFetching||(clearInterval(this.interval),this.maybePreloadPages())},100);return}this.isPreloading=!0,this.preloadPages().then(()=>{this.isPreloading=!1})}},preloadPages(){var e,a,u,g,m;let t=((a=(e=this.searchStatisticsStore.data.keywords)==null?void 0:e.paginated)==null?void 0:a.rows)||[];this.postDetail&&(t=((m=(g=(u=this.searchStatisticsStore.data.postDetail)==null?void 0:u.keywords)==null?void 0:g.paginated)==null?void 0:m.rows)||[]);const h=[];t.forEach(s=>{s.pages||h.push(s.keyword)});const r=[];for(let s=0;s<h.length;s+=10)r.push(h.slice(s,s+10));const l=[];return r.forEach(s=>{l.push(new Promise(P=>{this.searchStatisticsStore.getPagesByKeywords(s).then($=>{Object.entries($).forEach(T=>{const[o,f]=T,y=t.findIndex(R=>R.keyword===o);if(y===-1)return;const v=Object.values(f).slice(0,10);this.postDetail?this.searchStatisticsStore.data.postDetail.keywords.paginated.rows[y].pages=v:this.searchStatisticsStore.data.keywords.paginated.rows[y].pages=v})}).finally(()=>{P()})}))}),Promise.all(l)}},mounted(){this.maybePreloadPages()},updated(){this.maybePreloadPages()}},yt={class:"aioseo-search-statistics-keywords-table"},kt={class:"keyword"},bt=["onClick"],St=["onClick"],Pt={class:""};function $t(t,h,r,l,e,a){const u=n("core-tooltip"),g=n("statistic"),m=n("svg-caret"),s=n("base-button"),P=n("keyword-inner"),$=n("cta"),T=n("core-wp-table");return d(),k("div",yt,[c(T,{ref:"table",class:"keywords-table",id:e.tableId,columns:a.tableColumns,rows:Object.values(r.keywords.rows),totals:r.keywords.totals,filters:r.keywords.filters,"additional-filters":r.keywords.additionalFilters,loading:r.loading,"initial-page-number":t.pageNumber,"initial-search-term":t.searchTerm,"initial-items-per-page":l.settingsStore.settings.tablePagination[a.changeItemsPerPageSlug],"show-header":r.showHeader,"show-bulk-actions":!1,"show-table-footer":r.showTableFooter,"show-items-per-page":r.showItemsPerPage,"show-pagination":"","blur-rows":e.showUpsell,onFilterTable:t.processFilter,onProcessAdditionalFilters:t.processAdditionalFilters,onPaginate:t.processPagination,onProcessChangeItemsPerPage:t.processChangeItemsPerPage,onSearch:t.processSearch,onSortColumn:t.processSort},{keyword:i(({row:o,index:f,editRow:y})=>[_("div",kt,[a.shouldLimitText(o.keyword)?(d(),S(u,{key:0},{tooltip:i(()=>[w(p(a.sanitizeString(o.keyword)),1)]),default:i(()=>[_("a",{class:"limit-line",href:"#",onClick:D(v=>{y(f),a.toggleRow(f)},["prevent"])},p(a.sanitizeString(o.keyword)),9,bt)]),_:2},1024)):(d(),k("a",{key:1,href:"#",onClick:D(v=>{y(f),a.toggleRow(f)},["prevent"])},p(a.sanitizeString(o.keyword)),9,St))])]),clicks:i(({row:o})=>[w(p(o.clicks),1)]),ctr:i(({row:o})=>[w(p(e.numbers.compactNumber(o.ctr))+"% ",1)]),impressions:i(({row:o})=>[w(p(e.numbers.compactNumber(o.impressions)),1)]),position:i(({row:o})=>[w(p(Math.round(o.position).toFixed(0)),1)]),diffPosition:i(({row:o})=>[o.difference.comparison?(d(),S(g,{key:0,type:"position",difference:o.difference.position,showCurrent:!1,"tooltip-offset":"-100px,0"},null,8,["difference"])):b("",!0)]),diffDecay:i(({row:o})=>[o.difference.comparison?(d(),S(g,{key:0,type:"decay",difference:o.difference.decay,showCurrent:!1,"tooltip-offset":"-100px,0"},null,8,["difference"])):b("",!0)]),buttons:i(({row:o,index:f,column:y,editRow:v})=>[_("div",Pt,[F(t.$slots,"buttons",{row:o,column:y,index:f}),c(s,{type:"gray",class:V(["toggle-row-button",{active:a.isRowActive(f)}]),onClick:R=>{v(f),a.toggleRow(f)}},{default:i(()=>[c(m)]),_:2},1032,["class","onClick"])])]),"edit-row":i(({index:o})=>[c(P,{index:o,postDetail:r.postDetail},null,8,["index","postDetail"])]),cta:i(()=>[e.showUpsell?(d(),S($,{key:0,"cta-link":t.$links.getPricingUrl("search-statistics","search-statistics-upsell"),"button-text":e.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("search-statistics","search-statistics-upsell",t.$isPro?"pricing":"liteUpgrade"),"hide-bonus":!l.licenseStore.isUnlicensed},{"header-text":i(()=>[w(p(e.strings.ctaHeader),1)]),_:1},8,["cta-link","button-text","learn-more-link","hide-bonus"])):b("",!0)]),tablenav:i(()=>[F(t.$slots,"tablenav")]),_:3},8,["id","columns","rows","totals","filters","additional-filters","loading","initial-page-number","initial-search-term","initial-items-per-page","show-header","show-table-footer","show-items-per-page","blur-rows","onFilterTable","onProcessAdditionalFilters","onPaginate","onProcessChangeItemsPerPage","onSearch","onSortColumn"])])}const vt=C(wt,[["render",$t]]),Ct={setup(){return{searchStatisticsStore:x()}},components:{CoreBlur:G,CoreCard:q,GridColumn:M,GridRow:j,KeywordsDistributionGraph:nt,KeywordsGraph:W,KeywordsTable:vt,SeoStatisticsOverview:E},data(){return{strings:{keywordPositionsCard:this.$t.__("Keyword Positions",this.$td),keywordPositionsTooltip:this.$t.__("This graph is a visual representation of how well <strong>keywords are ranking in search results over time</strong> based on their position and average CTR. This can help you understand the performance of keywords and identify any trends or fluctuations.",this.$td),keywordPerformanceCard:this.$t.__("Keyword Performance",this.$td),keywordPerformanceTooltip:this.$t.__("This table displays the performance of keywords that your site ranks for over time, including metrics such as impressions, click-through rate, and average position in search results. It allows for easy analysis of how keywords are performing and identification of any underperforming keywords that may need to be optimized or replaced.",this.$td)},defaultKeywords:{rows:[],totals:{page:0,pages:0,total:0}}}}},Tt={class:"aioseo-search-statistics-dashboard"},xt=["innerHTML"],Dt=["innerHTML"];function Rt(t,h,r,l,e,a){const u=n("seo-statistics-overview"),g=n("keywords-graph"),m=n("grid-column"),s=n("keywords-distribution-graph"),P=n("grid-row"),$=n("core-card"),T=n("keywords-table"),o=n("core-blur");return d(),S(o,null,{default:i(()=>[_("div",Tt,[c(P,null,{default:i(()=>[c(m,null,{default:i(()=>[c($,{slug:"keywordPositions","header-text":e.strings.keywordPositionsCard,toggles:!1,"no-slide":""},{tooltip:i(()=>[_("span",{innerHTML:e.strings.keywordPositionsTooltip},null,8,xt)]),default:i(()=>[c(u,{statistics:["keywords","impressions","position"],"show-graph":!1,view:"side-by-side"}),c(P,null,{default:i(()=>[c(m,{md:"6"},{default:i(()=>[c(g,{"legend-style":"simple"})]),_:1}),c(m,{md:"6"},{default:i(()=>[c(s)]),_:1})]),_:1})]),_:1},8,["header-text"]),c($,{slug:"keywordPerformance","header-text":e.strings.keywordPerformanceCard,toggles:!1,"no-slide":""},{tooltip:i(()=>[_("span",{innerHTML:e.strings.keywordPerformanceTooltip},null,8,Dt)]),default:i(()=>{var f,y;return[c(T,{keywords:((y=(f=l.searchStatisticsStore.data)==null?void 0:f.keywords)==null?void 0:y.paginated)||e.defaultKeywords,ref:"table","show-items-per-page":"","show-table-footer":""},null,8,["keywords"])]}),_:1},8,["header-text"])]),_:1})]),_:1})])]),_:1})}const Bt=C(Ct,[["render",Rt]]),Ft={setup(){return{licenseStore:K()}},components:{Blur:Bt,Cta:H,RequiredPlans:st},data(){return{strings:{ctaButtonText:this.$t.__("Unlock Search Statistics",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Search Statistics is a %1$s Feature",this.$td),"PRO"),ctaDescription:this.$t.__("Connect your site to Google Search Console to receive insights on how content is being discovered. Identify areas for improvement and drive traffic to your website.",this.$td),thisFeatureRequires:this.$t.__("This feature requires one of the following plans:",this.$td),feature1:this.$t.__("Search traffic insights",this.$td),feature2:this.$t.__("Track page rankings",this.$td),feature3:this.$t.__("Track keyword rankings",this.$td),feature4:this.$t.__("Speed tests for individual pages/posts",this.$td)}}}},It={class:"aioseo-search-statistics-keyword-rankings"};function Kt(t,h,r,l,e,a){const u=n("blur"),g=n("required-plans"),m=n("cta");return d(),k("div",It,[c(u),c(m,{"cta-link":t.$links.getPricingUrl("search-statistics","search-statistics-upsell","keyword-rankings"),"button-text":e.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("search-statistics","keyword-rankings",t.$isPro?"pricing":"liteUpgrade"),"feature-list":[e.strings.feature1,e.strings.feature2,e.strings.feature3,e.strings.feature4],"align-top":"","hide-bonus":!l.licenseStore.isUnlicensed},{"header-text":i(()=>[w(p(e.strings.ctaHeader),1)]),description:i(()=>[c(g,{"core-feature":["search-statistics","keyword-rankings"]}),w(" "+p(e.strings.ctaDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list","hide-bonus"])])}const I=C(Ft,[["render",Kt]]),Ut={mixins:[Y],components:{KeywordRankings:I,Lite:I}},At={class:"aioseo-search-statistics-keyword-rankings"};function Lt(t,h,r,l,e,a){const u=n("keyword-rankings",!0),g=n("lite");return d(),k("div",At,[t.shouldShowMain("search-statistics","keyword-rankings")?(d(),S(u,{key:0})):b("",!0),t.shouldShowUpgrade("search-statistics","keyword-rankings")||t.shouldShowLite?(d(),S(g,{key:1})):b("",!0)])}const fe=C(Ut,[["render",Lt]]);export{fe as default};