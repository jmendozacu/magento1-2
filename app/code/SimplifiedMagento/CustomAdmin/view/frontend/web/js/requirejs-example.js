/*
console.log("I am loaded by REquireJs");*/

/*
define(function(){
    'use strict';

    return function(config,element) {
        //console.log("I am a RequiredJS and model function",config);
        console.log(element);
    }
});*/

define(['jquery'], function($){
    'use strict';

    return function(config,element){
        $.getJSON(config.base_url + 'rest/V1/directory/currency',function(result){
            element.innerText = JSON.stringify(result,null,2);
        });
    }
});
