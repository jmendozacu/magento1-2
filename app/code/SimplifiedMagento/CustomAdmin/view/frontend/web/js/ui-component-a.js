/*
define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
      defaults: {
          label: 'Observables now with property getters and setters!',
          additional_charge: 2,
          items: [
              {name: 'Surprise Box', qty: 5, price: 1.5},
              {name: 'Surprise Box1', qty: 1, price: 7.5}
          ]
      },
      rowTotal: item => item.qty * item.price,
      total: function() {
          const sum = this.items.map(this.rowTotal)
              .reduce((acc,total) => acc + Total);
          return sum + this.additional_charge;
      }
    });
});*/


define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        defaults: {
            title: 'Component A',
            value: 5.5
        }
    });
});
