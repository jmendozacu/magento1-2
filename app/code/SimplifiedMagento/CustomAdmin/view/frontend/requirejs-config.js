/*var config = {
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'SimplifiedMagento_CustomAdmin/js/add-to-cart-mixin': true
            }
        }
    },
    map: {
        '*': {
            alaiasexample: "SimplifiedMagento_CustomAdmin/js/requirejs-example"
        }
    }
};*/


/*
var config = {
    deps: ['SimplifiedMagento_CustomAdmin/js/log-when-loaded'],
    config: {
        mixins: {
            'Magento_Checkout/js/checkout-data': {
                'SimplifiedMagento_CustomAdmin/js/checkout-data-mixin': true
            }
        }
    }
};*/

/*
var config = {
  shim: {
      'Magento_Catalog/js/view/compare-products': {
          deps: ['SimplifiedMagento_CustomAdmin/js/before-compare-products']
      }
  }
};*/

var config = {
    paths: {
        'redirectpath': "SimplifiedMagento_CustomAdmin/js/v2",
        'redirectpath-v1': "SimplifiedMagento_CustomAdmin/js/v1/title"
    }
};