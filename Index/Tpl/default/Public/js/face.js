pmc_in_script_time_6120=new Date()*1;(function(){var G=BB.ObjectH,F=BB.CustEvent,D=BB.EventTargetH,I=BB.EventH,C=BB.DomU,B=BB.NodeH,A=BB.StringH;var H=function(){this.host=null;this.className="face";this.containerClassName="editor";this._handlers={popFacePanel:null,selectFace:null};this.initialize.apply(this,arguments);};H.EVENTS={};H.popup=null;H.container=null;G.mix(H.prototype,function(){return{initialize:function(L){var E=this,J=[];for(var K in H.EVENTS){J.push(K);}F.createEvents(this,J);G.mix(this,L||{},true);this._handlers.popFacePanel=function(){H.container=W(this).parentNode("."+E.containerClassName).query("textarea")[0];E.popFacePanel(this);};this._handlers.selectFace=function(){E.selectFace(this);};},render:function(E){if(E==null){return ;}this.host=E;this._addTriggerHandler();},_addTriggerHandler:function(){var E=this;var J=W(this.host).parentNode("."+this.containerClassName).query("."+this.className).first();D.on(J,"click",E._handlers.popFacePanel);},popFacePanel:function(J){var E=this;if(!H.popup){H.popup=new LayerPopup({className:"panel panel-t3 panel-t3-tl panel-faces",header:false,width:330,shadow:true,cue:true,corner:true,close:true});E.buildContent();}H.popup.show(0,30,null,null,J);},buildContent:function(){var E=this;var K=['<div class="faces-cont">','<ul class="faces-list cls">'],J=this;Ajax.get("/publish/getFaceInfo",{_of:"json",tmp:new Date().getTime()},function(L){var M=Ajax.opResults(L,false);if("mcphp.ok"==M.err){var O=M.data.face_info;for(var N in O){K.push('<li data-title="[{0}]"><img src="{1}" alt="{0}" title="{0}"></li>'.format(N,"http://st.youa.com/static/face/"+O[N]+".gif"));}}else{K.push("<li>加载失败...</li>");}K.push("</ul></div>");H.popup.setContent(K.join(""));});W(".panel-faces").delegate("li","click",this._handlers.selectFace);},selectFace:function(E){var J=E.getAttribute("data-title");textAreaUtilsFacade.insertText(H.container,J);H.popup.hide();}};}(),true);BB.provide("PublishFace",H);})();pmc_exec_time_6120=new Date()*1-pmc_in_script_time_6120;
