/*define(['ko','jquery'], function(ko,$){
    'use strict';

    return function(config){
        /*const title = ko.observable('This is a simple example of view model');*/
        /*title.subscribe(function (newValue) {
           console.log("Changed to: ", newValue);
        });
        title.subscribe(function (oldValue) {
           console.log("Changed from: ", oldValue);
        },this,'beforeChange');*/

        /*return {
            title: title
            /!*getTitle: function () {
                return this.title;
            }*!/
            /!*config: config*!/
        };*/
        /*let currencyInfo = ko.observable();
        $.getJSON(config.base_url + 'rest/V1/directory/currency', currencyInfo,null,2);

        const viewModel = {
            label: ko.observable('Currency Info')
        };
        viewModel.output = ko.computed(function () {
            if(currencyInfo()) {
                return  JSON.stringify(currencyInfo());
            }
            return '..loading';
        }.bind(viewModel));

        return viewModel;*/

        /*const viewModel = {
            exchange_rates: ko.observableArray([
                {
                    currency_to: 'INR',
                    rate: 50.0
                },
                {
                    currency_to: 'USD',
                    rate: 1.0
                },
                {
                    currency_to: 'GBX',
                    rate: 11.0
                }
            ])

        };
         return viewModel;
    }
});*/

define(['ko'], function (ko) {
    'use strict';

    return function() {
        const viewModel = ko.track({
            label: 'Observables now with property getters and setters!',
            additional_charge: 2,
            items: [
                {name: 'Surprise Box', qty: 5, price: 1.5},
                {name: 'Surprise Box1', qty: 1, price: 7.5}
            ],
            rowTotal: item => item.qty * item.price,
            total: function () {
                const sum = this.items.map(this.rowTotal)
                    .reduce((acc, curr) => acc + curr);
                return sum + this.additional_charge;
            }
        });

        ko.observable(viewModel, 'additional_charge').subscribe(function (newValue) {
            console.log('Additional Charge changed to: ',newValue);
        });

        return viewModel;
    }
});