new Vue ({
    el: '#root',

    data: {
        productID: '',
        product: [],
        productQty: 0,

        costumerID: 0,
        costumer: [],

        tambahan: 0
    },

    methods: {
        productSelected() {
            axios.get('/ajax/getProduct/' + this.productID).
                then(response => this.product = response.data);
        },

        custSelected() {
            axios.get('/ajax/getCostumer/' + this.costumerID).
                then(response => this.costumer = response.data);
        }
    },

});
