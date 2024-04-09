"use strict";(self["webpackChunktradetrove"]=self["webpackChunktradetrove"]||[]).push([[275],{1241:function(e,l){l.A=(e,l)=>{const a=e.__vccOpts||e;for(const[s,o]of l)a[s]=o;return a}},6018:function(e,l,a){a.d(l,{O:function(){return o}});var s=a(3367);const o=(0,s.nY)("errors",{state:()=>({errorMessages:{"Authentication failed":"Неверный пароль. Попробуйте снова"}}),actions:{setErrors(e){this.errors=e}}})},2275:function(e,l,a){a.r(l),a.d(l,{default:function(){return P}});a(4114);var s=a(6768),o=a(5130),i=a(4232),u=a(144),r=a(8145),t=a(1387),n=a(6018),v=a(5665);const d=e=>((0,s.Qi)("data-v-e558107c"),e=e(),(0,s.jt)(),e),_={class:"center"},f={class:"login"},m={class:"container login__content"},c=d((()=>(0,s.Lk)("h2",{class:"login__title title"},"Регистрация",-1))),p={class:"form__fields"},k=d((()=>(0,s.Lk)("div",{class:"form-field__label"},"Email",-1))),b={key:0,class:"form-field__errors"},w={class:"form-field__error"},g=d((()=>(0,s.Lk)("div",{class:"form-field__label"},"Имя",-1))),C={key:0,class:"form-field__errors"},L={class:"form-field__error"},y=d((()=>(0,s.Lk)("div",{class:"form-field__label"},"Фамилия",-1))),h={key:0,class:"form-field__errors"},E={class:"form-field__error"},K=d((()=>(0,s.Lk)("div",{class:"form-field__label"},"Пароль",-1))),X=["type"],F={key:0,class:"form-field__errors"},R={class:"form-field__error"},S={class:"form-field__validations"},x={key:0,class:"form-field__validation-icon form-field__validation-icon--error"},T={key:1,class:"form-field__validation-icon form-field__validation-icon--success"},B={class:"form-field__validation-text"},I=d((()=>(0,s.Lk)("div",{class:"form-field__label"},"Повторите пароль",-1))),O=["type"],Q={key:0,class:"form-field__errors"},V={class:"form-field__error"},j={class:"form__btn-wrapper"},J=["disabled"],U={class:"form__error"},A={class:"login__register-wrapper"},W=d((()=>(0,s.Lk)("div",{class:"login__agreement"},[(0,s.Lk)("p",null," При регистрации и входе вы соглашаетесь с условиями использования TradeTrove и политикой конфиденциальности. ")],-1)));var $={__name:"RegisterView",setup(e){const l=(0,r.r)().host,a=(0,t.rd)(),d=(0,n.O)().errorMessages,$=((0,v.n)(),(0,u.KR)([])),M=(0,u.KR)(""),N=(0,u.KR)(""),P=(0,u.KR)(""),z=(0,u.KR)(""),D=(0,u.KR)(""),Y=(0,u.KR)(!1),Z=(0,u.KR)(""),q=(0,u.KR)(!1),G=(0,u.KR)(!1),H=(0,u.KR)(!1),ee=(0,u.KR)(!1),le=(0,u.KR)({minlength:{text:"Минимальная длина пароля 8 символов",value:!0},lowerCaseLetter:{text:"Пароль должен содержать хотя бы одну строчную букву",value:!0},upperCaseLetter:{text:"Пароль должен содержать хотя бы одну заглавную букву",value:!0},number:{text:"Пароль должен содержать хотя бы одну цифру",value:!0}}),ae=(0,u.KR)(!0),se=(0,s.EW)((()=>!(N.value&&P.value&&z.value&&D.value&&Z.value&&oe.value&&!ae.value))),oe=(0,s.EW)((()=>D.value===Z.value));(0,s.wB)([D,Z,G,H],(()=>{G.value||H.value||(Z.value&&Z.value!=D.value?$.value.passwordSubmit=["Пароли должны совпадать"]:$.value.passwordSubmit=null)})),(0,s.wB)([D,Z],(()=>{D.value&&Z.value&&D.value!=Z.value||($.value.passwordSubmit=null)})),(0,s.wB)(D,(()=>{D.value.length<8?(le.value.minlength.value=!0,ae.value=!0):(le.value.minlength.value=!1,ae.value=!1),/[a-z]/.test(D.value)?(le.value.lowerCaseLetter.value=!1,ae.value=!1):(le.value.lowerCaseLetter.value=!0,ae.value=!0),/[A-Z]/.test(D.value)?(le.value.upperCaseLetter.value=!1,ae.value=!1):(le.value.upperCaseLetter.value=!0,ae.value=!0),/[0-9]/.test(D.value)?(le.value.number.value=!1,ae.value=!1):(le.value.number.value=!0,ae.value=!0)}));let ie=null;(0,s.wB)(ee,(async e=>{e?clearTimeout(ie):N.value&&(ie=setTimeout((async()=>{const e=await fetch(`${l}/api/check-email`,{method:"POST",body:JSON.stringify({email:N.value}),headers:{"Content-Type":"application/json"}}),a=await(e?.json());console.log(a),$.value.email=a?.success?null:["Такой email уже зарегистрирован"]}),1e3))}));const ue=async e=>{const s=e.target,o=await fetch(`${l}/api/register`,{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({email:s.email.value,password:s.password.value,first_name:s.first_name.value,last_name:s.last_name.value})}),i=await o.json();i&&(i.success?a.push("/login"):i.errors?$.value=i.errors:M.value=d[i.message]||"Что-то пошло не так")};return(e,l)=>{const a=(0,s.g2)("font-awesome-icon"),u=(0,s.g2)("router-link");return(0,s.uX)(),(0,s.CE)("div",_,[(0,s.Lk)("div",f,[(0,s.Lk)("div",m,[c,(0,s.Lk)("form",{onSubmit:(0,o.D$)(ue,["prevent"]),class:"login__form form"},[(0,s.Lk)("div",p,[(0,s.Lk)("div",{class:(0,i.C4)([{invalid:$.value.email},"form__field form-field"])},[k,(0,s.bo)((0,s.Lk)("input",{onBlur:l[0]||(l[0]=e=>ee.value=!1),onFocus:l[1]||(l[1]=e=>ee.value=!0),"onUpdate:modelValue":l[2]||(l[2]=e=>N.value=e),name:"email",type:"email",class:"form-field__input"},null,544),[[o.Jo,N.value]]),$.value.email?((0,s.uX)(),(0,s.CE)("div",b,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)($.value.email,(e=>((0,s.uX)(),(0,s.CE)("div",w,(0,i.v_)(e),1)))),256))])):(0,s.Q3)("",!0)],2),(0,s.Lk)("div",{class:(0,i.C4)([{invalid:$.value.first_name},"form__field form-field"])},[g,(0,s.bo)((0,s.Lk)("input",{"onUpdate:modelValue":l[3]||(l[3]=e=>P.value=e),name:"first_name",type:"text",class:"form-field__input"},null,512),[[o.Jo,P.value]]),$.value.first_name?((0,s.uX)(),(0,s.CE)("div",C,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)($.value.first_name,(e=>((0,s.uX)(),(0,s.CE)("div",L,(0,i.v_)(e),1)))),256))])):(0,s.Q3)("",!0)],2),(0,s.Lk)("div",{class:(0,i.C4)([{invalid:$.value.last_name},"form__field form-field"])},[y,(0,s.bo)((0,s.Lk)("input",{"onUpdate:modelValue":l[4]||(l[4]=e=>z.value=e),name:"last_name",type:"text",class:"form-field__input"},null,512),[[o.Jo,z.value]]),$.value.last_name?((0,s.uX)(),(0,s.CE)("div",h,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)($.value.last_name,(e=>((0,s.uX)(),(0,s.CE)("div",E,(0,i.v_)(e),1)))),256))])):(0,s.Q3)("",!0)],2),(0,s.Lk)("div",{class:(0,i.C4)([{invalid:$.value.password},"form__field form-field"])},[K,(0,s.Lk)("div",{class:(0,i.C4)([{"show-password":Y.value},"form-field__input-wrapper form-field__input-wrapper--password"])},[(0,s.bo)((0,s.Lk)("input",{onBlur:l[5]||(l[5]=e=>H.value=!1),onFocus:l[6]||(l[6]=e=>H.value=!0),"onUpdate:modelValue":l[7]||(l[7]=e=>D.value=e),name:"password",type:Y.value?"text":"password",class:"form-field__input"},null,40,X),[[o.hp,D.value]]),(0,s.Lk)("button",{onClick:l[8]||(l[8]=e=>Y.value=!Y.value),type:"button",class:"form-field__toggle-pas form-field__toggle-pas--show"},[(0,s.bF)(a,{icon:"eye"})]),(0,s.Lk)("button",{onClick:l[9]||(l[9]=e=>Y.value=!Y.value),type:"button",class:"form-field__toggle-pas form-field__toggle-pas--hide"},[(0,s.bF)(a,{icon:"eye-slash"})])],2),$.value.password?((0,s.uX)(),(0,s.CE)("div",F,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)($.value.password,(e=>((0,s.uX)(),(0,s.CE)("div",R,(0,i.v_)(e),1)))),256))])):(0,s.Q3)("",!0),(0,s.Lk)("div",S,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)(le.value,(e=>((0,s.uX)(),(0,s.CE)("div",{class:(0,i.C4)([{invalid:e.value},"form-field__validation"])},[e.value?((0,s.uX)(),(0,s.CE)("div",x,[(0,s.bF)(a,{icon:"times"})])):((0,s.uX)(),(0,s.CE)("div",T,[(0,s.bF)(a,{icon:"check"})])),(0,s.Lk)("div",B,(0,i.v_)(e.text),1)],2)))),256))])],2),(0,s.Lk)("div",{class:(0,i.C4)([{invalid:$.value.passwordSubmit},"form__field form-field"])},[I,(0,s.Lk)("div",{class:(0,i.C4)(["form-field__input-wrapper form-field__input-wrapper--password",{"show-password":q.value}])},[(0,s.bo)((0,s.Lk)("input",{onBlur:l[10]||(l[10]=e=>G.value=!1),onFocus:l[11]||(l[11]=e=>G.value=!0),"onUpdate:modelValue":l[12]||(l[12]=e=>Z.value=e),name:"passwordSubmit",type:q.value?"text":"password",class:"form-field__input"},null,40,O),[[o.hp,Z.value]]),(0,s.Lk)("button",{onClick:l[13]||(l[13]=e=>q.value=!q.value),type:"button",class:"form-field__toggle-pas form-field__toggle-pas--show"},[(0,s.bF)(a,{icon:"eye"})]),(0,s.Lk)("button",{onClick:l[14]||(l[14]=e=>q.value=!q.value),type:"button",class:"form-field__toggle-pas form-field__toggle-pas--hide"},[(0,s.bF)(a,{icon:"eye-slash"})])],2),$.value.passwordSubmit?((0,s.uX)(),(0,s.CE)("div",Q,[((0,s.uX)(!0),(0,s.CE)(s.FK,null,(0,s.pI)($.value.passwordSubmit,(e=>((0,s.uX)(),(0,s.CE)("div",V,(0,i.v_)(e),1)))),256))])):(0,s.Q3)("",!0)],2)]),(0,s.Lk)("div",j,[(0,s.Lk)("button",{disabled:!!se.value,type:"submit",class:"form__btn btn"}," Зарегистрироваться ",8,J)]),(0,s.Lk)("div",U,(0,i.v_)(M.value),1)],32),(0,s.Lk)("div",A,[(0,s.bF)(u,{class:"login__register link",to:"/login"},{default:(0,s.k6)((()=>[(0,s.eW)("Войти")])),_:1})]),W])])])}}},M=a(1241);const N=(0,M.A)($,[["__scopeId","data-v-e558107c"]]);var P=N}}]);
//# sourceMappingURL=275.562585e0.js.map