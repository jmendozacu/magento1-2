define(['uiElement'], function (uiElement){
    'use strict';
    
    return uiElement.extend({
        defaults: {
            label: "Some random nos",
            values: [100,200,300,400]
        }
    });
});