pmc_in_script_time_9930=new Date()*1;pmc_in_script_time_4398=new Date()*1;(function(){var D="sArrCMX",A=D+'.push("';var B={js:{tagG:"js",isBgn:1,isEnd:1,sBgn:'");',sEnd:";"+A},"if":{tagG:"if",isBgn:1,rlt:1,sBgn:'");if',sEnd:"{"+A},elseif:{tagG:"if",cond:1,rlt:1,sBgn:'");} else if',sEnd:"{"+A},"else":{tagG:"if",cond:1,rlt:2,sEnd:'");}else{'+A},"/if":{tagG:"if",isEnd:1,sEnd:'");}'+A},"for":{tagG:"for",isBgn:1,rlt:1,sBgn:'");for',sEnd:"{"+A},"/for":{tagG:"for",isEnd:1,sEnd:'");}'+A},"while":{tagG:"while",isBgn:1,rlt:1,sBgn:'");while',sEnd:"{"+A},"/while":{tagG:"while",isEnd:1,sEnd:'");}'+A}};function C(H){var J=-1,I=[];var F=[[/\{strip\}([\s\S]*?)\{\/strip\}/g,function(L,K){return K.replace(/[\r\n]\s*\}/g," }").replace(/[\r\n]\s*/g,"");}],[/\\/g,"\\\\"],[/"/g,'\\"'],[/\r/g,"\\r"],[/\n/g,"\\n"],[/\{[\s\S]*?\S\}/g,function(L){L=L.substr(1,L.length-2);for(var N=0;N<G.length;N++){L=L.replace(G[N][0],G[N][1]);}var M=L;if(/^(.\w+)\W/.test(M)){M=RegExp.$1;}var K=B[M];if(K){if(K.isBgn){var O=I[++J]={tagG:K.tagG,rlt:K.rlt};}if(K.isEnd){if(J<0){throw new Error("多余的结束标记"+L);}O=I[J--];if(O.tagG!=K.tagG){throw new Error("标记不匹配："+O.tagG+"--"+M);}}else{if(!K.isBgn){if(J<0){throw new Error("多余的标记"+L);}O=I[J];if(O.tagG!=K.tagG){throw new Error("标记不匹配："+O.tagG+"--"+M);}if(K.cond&&!(K.cond&O.rlt)){throw new Error("标记使用时机不对："+M);}O.rlt=K.rlt;}}return(K.sBgn||"")+L.substr(M.length)+(K.sEnd||"");}else{return'",('+L+'),"';}}]];var G=[[/\\n/g,"\n"],[/\\r/g,"\r"],[/\\"/g,'"'],[/\\\\/g,"\\"],[/\$(?=\w+)/g,"opts."],[/print/g,D+".push"]];for(var E=0;E<F.length;E++){H=H.replace(F[E][0],F[E][1]);}if(J>=0){throw new Error("存在未结束的标记："+I[J].tagG);}H="var "+D+"=[];"+A+H+'");return '+D+'.join("");';return new Function("opts",H);}BB.Tmpl=C;})();pmc_exec_time_4398=new Date()*1-pmc_in_script_time_4398;pmc_exec_time_9930=new Date()*1-pmc_in_script_time_9930;