(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[71,74],{113:function(e,t,n){"use strict";n.d(t,"a",(function(){return r}));var a=n(24),c=n(22);const r=e=>Object(a.a)(e)?JSON.parse(e)||{}:Object(c.a)(e)?e:{}},150:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var a=n(64),c=n(22),r=n(113);const s=e=>{const t=Object(c.a)(e)?e:{},n=Object(r.a)(t.style);return Object(a.__experimentalUseBorderProps)({...t,style:n})}},22:function(e,t,n){"use strict";n.d(t,"a",(function(){return a})),n.d(t,"b",(function(){return c}));const a=e=>!(e=>null===e)(e)&&e instanceof Object&&e.constructor===Object;function c(e,t){return a(e)&&t in e}},23:function(e,t,n){"use strict";var a=n(0),c=n(6),r=n.n(c);t.a=e=>{let t,{label:n,screenReaderLabel:c,wrapperElement:s,wrapperProps:o={}}=e;const l=null!=n,i=null!=c;return!l&&i?(t=s||"span",o={...o,className:r()(o.className,"screen-reader-text")},Object(a.createElement)(t,o,c)):(t=s||a.Fragment,l&&i&&n!==c?Object(a.createElement)(t,o,Object(a.createElement)("span",{"aria-hidden":"true"},n),Object(a.createElement)("span",{className:"screen-reader-text"},c)):Object(a.createElement)(t,o,n))}},285:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var a=n(64),c=n(22),r=n(113);const s=e=>{const t=Object(c.a)(e)?e:{},n=Object(r.a)(t.style);return Object(a.__experimentalUseColorProps)({...t,style:n})}},289:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var a=n(22),c=n(24),r=n(113);const s=e=>{const t=Object(a.a)(e)?e:{},n=Object(r.a)(t.style),s=Object(a.a)(n.typography)?n.typography:{},o=Object(c.a)(s.fontFamily)?s.fontFamily:"";return{className:t.fontFamily?`has-${t.fontFamily}-font-family`:o,style:{fontSize:t.fontSize?`var(--wp--preset--font-size--${t.fontSize})`:s.fontSize,fontStyle:s.fontStyle,fontWeight:s.fontWeight,letterSpacing:s.letterSpacing,lineHeight:s.lineHeight,textDecoration:s.textDecoration,textTransform:s.textTransform}}}},306:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var a=n(64),c=n(22),r=n(113);const s=e=>{if("function"!=typeof a.__experimentalGetSpacingClassesAndStyles)return{style:{}};const t=Object(c.a)(e)?e:{},n=Object(r.a)(t.style);return Object(a.__experimentalGetSpacingClassesAndStyles)({...t,style:n})}},326:function(e,t,n){"use strict";n.r(t),n.d(t,"Block",(function(){return f}));var a=n(0),c=n(1),r=n(6),s=n.n(r),o=n(23),l=n(51),i=n(150),u=n(285),b=n(289),d=n(306),p=n(133);n(327);const f=e=>{const{className:t,align:n}=e,{parentClassName:r}=Object(l.useInnerBlockLayoutContext)(),{product:p}=Object(l.useProductDataContext)(),f=Object(i.a)(e),m=Object(u.a)(e),g=Object(b.a)(e),O=Object(d.a)(e);if(!p.id||!p.on_sale)return null;const j="string"==typeof n?"wc-block-components-product-sale-badge--align-"+n:"";return Object(a.createElement)("div",{className:s()("wc-block-components-product-sale-badge",t,j,{[r+"__product-onsale"]:r},m.className,f.className,g.className),style:{...m.style,...f.style,...g.style,...O.style}},Object(a.createElement)(o.a,{label:Object(c.__)("Sale","woocommerce"),screenReaderLabel:Object(c.__)("Product on sale","woocommerce")}))};t.default=Object(p.withProductDataContext)(f)},327:function(e,t){},351:function(e,t,n){"use strict";n.d(t,"a",(function(){return y}));var a=n(13),c=n.n(a),r=n(0),s=n(1),o=n(6),l=n.n(o),i=n(2),u=n(51),b=n(289),d=n(150),p=n(306),f=n(133),m=n(72),g=n(326);n(352);const O=()=>Object(r.createElement)("img",{src:i.PLACEHOLDER_IMG_SRC,alt:"",width:void 0,height:void 0}),j=e=>{let{image:t,loaded:n,showFullSize:a,fallbackAlt:s}=e;const{thumbnail:o,src:l,srcset:i,sizes:u,alt:b}=t||{},d={alt:b||s,hidden:!n,src:o,...a&&{src:l,srcSet:i,sizes:u}};return Object(r.createElement)(r.Fragment,null,d.src&&Object(r.createElement)("img",c()({"data-testid":"product-image"},d)),!t&&Object(r.createElement)(O,null))},y=e=>{const{className:t,imageSizing:n="full-size",showProductLink:a=!0,showSaleBadge:c,saleBadgeAlign:o="right"}=e,{parentClassName:i}=Object(u.useInnerBlockLayoutContext)(),{product:f,isLoading:y}=Object(u.useProductDataContext)(),{dispatchStoreEvent:h}=Object(m.a)(),w=Object(b.a)(e),S=Object(d.a)(e),v=Object(p.a)(e);if(!f.id)return Object(r.createElement)("div",{className:l()(t,"wc-block-components-product-image",{[i+"__product-image"]:i},S.className),style:{...w.style,...S.style,...v.style}},Object(r.createElement)(O,null));const _=!!f.images.length,k=_?f.images[0]:null,E=a?"a":r.Fragment,x=Object(s.sprintf)(
/* translators: %s is referring to the product name */
Object(s.__)("Link to %s","woocommerce"),f.name),N={href:f.permalink,...!_&&{"aria-label":x},onClick:()=>{h("product-view-link",{product:f})}};return Object(r.createElement)("div",{className:l()(t,"wc-block-components-product-image",{[i+"__product-image"]:i},S.className),style:{...w.style,...S.style,...v.style}},Object(r.createElement)(E,a&&N,!!c&&Object(r.createElement)(g.default,{align:o,product:f}),Object(r.createElement)(j,{fallbackAlt:f.name,image:k,loaded:!y,showFullSize:"cropped"!==n})))};t.b=Object(f.withProductDataContext)(y)},352:function(e,t){},529:function(e,t,n){"use strict";n.r(t);var a=n(133),c=n(351);t.default=Object(a.withFilteredAttributes)({showProductLink:{type:"boolean",default:!0},showSaleBadge:{type:"boolean",default:!0},saleBadgeAlign:{type:"string",default:"right"},imageSizing:{type:"string",default:"full-size"},productId:{type:"number",default:0},isDescendentOfQueryLoop:{type:"boolean",default:!1}})(c.b)},6:function(e,t,n){var a;!function(){"use strict";var n={}.hasOwnProperty;function c(){for(var e=[],t=0;t<arguments.length;t++){var a=arguments[t];if(a){var r=typeof a;if("string"===r||"number"===r)e.push(a);else if(Array.isArray(a)){if(a.length){var s=c.apply(null,a);s&&e.push(s)}}else if("object"===r)if(a.toString===Object.prototype.toString)for(var o in a)n.call(a,o)&&a[o]&&e.push(o);else e.push(a.toString())}}return e.join(" ")}e.exports?(c.default=c,e.exports=c):void 0===(a=function(){return c}.apply(t,[]))||(e.exports=a)}()}}]);