import{_ as g}from"./_plugin-vue_export-helper.BN1snXvA.js";import{o as m,c as w,v as s,k as _,l as r,a as c,C as p,t as a,B as i,b as S}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{f as v}from"./links.DOdXC3mL.js";import{_ as n,s as x}from"./default-i18n.DXRQgkn2.js";import{C as B}from"./Blur.CvHKqkVq.js";import{C as $}from"./SettingsRow.BwYvQArk.js";import{S as A}from"./External.BnlDuPIp.js";import{B as G}from"./Checkbox.CmdF-nFt.js";import{C as M}from"./Card.DPoAfijm.js";import{C as D}from"./ProBadge.CVd2ImKm.js";import{C as R}from"./Index.DyvJ1GBk.js";import{R as H}from"./RequiredPlans.BRtESoGg.js";import{A as I}from"./AddonConditions.BFVZ2btl.js";import"./helpers.CXsRrhc8.js";import"./Row.DRnp1mVs.js";import"./Checkmark.DOG99yeO.js";import"./Tooltip.DhkkBQWW.js";import"./Caret.Ke5gylGO.js";import"./index.BR_tv7_M.js";import"./Slide.fjAuzpC8.js";import"./constants.qeJG2F0i.js";import"./addons.Z32PCU1d.js";import"./upperFirst.yVnsg4QL.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.zLSwYOtv.js";import"./license.BEch2NZa.js";const o="all-in-one-seo-pack",L=()=>({strings:{news:n("News Sitemap",o),setPublicationName:n("Set Publication Name",o),publicationName:n("Publication Name",o),postTypes:n("Post Types",o),exclude:n("Exclude Pages/Posts",o),description:n("The Google News Sitemap lets you control which content you submit to Google News and only contains articles that were published in the last 48 hours.",o),extendedDescription:n("In order to submit a News Sitemap to Google, you must have added your site to Google’s Publisher Center and had it approved.",o),enableSitemap:n("Enable Sitemap",o),openSitemap:n("Open News Sitemap",o),noIndexDisplayed:n("Noindexed content will not be displayed in your sitemap.",o),doYou404:n("Do you get a blank sitemap or 404 error?",o),ctaButtonText:n("Unlock News Sitemaps",o),ctaHeader:x(n("News Sitemaps is a %1$s Feature",o),"PRO"),includeAllPostTypes:n("Include All Post Types",o),selectPostTypes:n("Select which Post Types appear in your sitemap.",o)}}),U={};function O(e,f){return m(),w("div")}const V=g(U,[["render",O]]),E={setup(){const{strings:e}=L();return{strings:e}},components:{CoreBlur:B,CoreSettingsRow:$,SvgExternal:A,BaseCheckbox:G}},q={class:"aioseo-settings-row aioseo-section-description"},z=["innerHTML"],Y={class:"aioseo-sitemap-preview"},F={class:"aioseo-description"},j=c("br",null,null,-1),J=["innerHTML"],K={class:"aioseo-description"},Q=["innerHTML"];function W(e,f,y,t,N,k){const d=s("base-toggle"),l=s("core-settings-row"),u=s("svg-external"),b=s("base-button"),h=s("base-input"),P=s("base-checkbox"),C=s("core-blur");return m(),_(C,null,{default:r(()=>[c("div",q,[p(a(t.strings.description)+" "+a(t.strings.extendedDescription)+" ",1),c("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"newsSitemaps",!0)},null,8,z)]),i(l,{name:t.strings.enableSitemap},{content:r(()=>[i(d,{modelValue:!0})]),_:1},8,["name"]),i(l,{name:e.$constants.GLOBAL_STRINGS.preview},{content:r(()=>[c("div",Y,[i(b,{size:"medium",type:"blue"},{default:r(()=>[i(u),p(" "+a(t.strings.openSitemap),1)]),_:1})]),c("div",F,[p(a(t.strings.noIndexDisplayed)+" ",1),j,p(" "+a(t.strings.doYou404)+" ",1),c("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"blankSitemap",!0)},null,8,J)])]),_:1},8,["name"]),i(l,{name:t.strings.publicationName,align:""},{content:r(()=>[i(h,{size:"medium"})]),_:1},8,["name"]),i(l,{name:t.strings.postTypes},{content:r(()=>[i(P,{size:"medium"},{default:r(()=>[p(a(t.strings.includeAllPostTypes),1)]),_:1}),c("div",K,[p(a(t.strings.selectPostTypes)+" ",1),c("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"selectPostTypesNews",!0)},null,8,Q)])]),_:1},8,["name"])]),_:1})}const X=g(E,[["render",W]]),Z={setup(){const{strings:e}=L();return{licenseStore:v(),strings:e}},components:{Blur:X,CoreCard:M,CoreProBadge:D,Cta:R,RequiredPlans:H}},ee={class:"aioseo-news-sitemap-lite"};function te(e,f,y,t,N,k){const d=s("core-pro-badge"),l=s("blur"),u=s("required-plans"),b=s("cta"),h=s("core-card");return m(),w("div",ee,[i(h,{slug:"newsSitemap",noSlide:!0},{header:r(()=>[c("span",null,a(t.strings.news),1),i(d)]),default:r(()=>[i(l),i(b,{"feature-list":[t.strings.setPublicationName,t.strings.exclude],"cta-link":e.$links.getPricingUrl("news-sitemap","news-sitemap-upsell"),"button-text":t.strings.ctaButtonText,"learn-more-link":e.$links.getUpsellUrl("news-sitemap",null,e.$isPro?"pricing":"liteUpgrade"),"hide-bonus":!t.licenseStore.isUnlicensed},{"header-text":r(()=>[p(a(t.strings.ctaHeader),1)]),description:r(()=>[i(u,{addon:"aioseo-news-sitemap"}),p(" "+a(t.strings.description),1)]),_:1},8,["feature-list","cta-link","button-text","learn-more-link","hide-bonus"])]),_:1})])}const T=g(Z,[["render",te]]),ne={mixins:[I],components:{Cta:V,Lite:T,NewsSitemap:T},data(){return{addonSlug:"aioseo-news-sitemap"}}},oe={class:"aioseo-news-sitemap"};function se(e,f,y,t,N,k){const d=s("news-sitemap",!0),l=s("cta"),u=s("lite");return m(),w("div",oe,[e.shouldShowMain?(m(),_(d,{key:0})):S("",!0),e.shouldShowUpdate||e.shouldShowActivate?(m(),_(l,{key:1})):S("",!0),e.shouldShowLite?(m(),_(u,{key:2})):S("",!0)])}const $e=g(ne,[["render",se]]);export{$e as default};
