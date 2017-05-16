var app = new Vue ({
    el: '#root',

    data: {
        // product: '',
        costumer: '',
        costumerID: '',

        rows: [{
            productID: '',
            price: 0,
            weight: 0,
            qty: 0,
            totalWeight: 0,
            addCost: 0,
            totalPrice: 0,
            product: []
        }],

        diskon: 0,
        ongkir: 0,
        SubTotal: 0,
        totalBerat: 0,
        GrandTotal: 0

    },

    methods: {
        productSelected(index) {
            axios.get('/ajax/getProduct/' + this.rows[index].productID).
            then(response => this.rows[index].product = response.data);
        },

        custSelected() {
            axios.get('/ajax/getCostumer/' + this.costumerID).
            then(response => this.costumer = response.data);
        },

        store() {
            axios.post('/orders', {
                firstName: 'Fred',
                lastName: 'Flintstone'
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        addRow() {
            return this.rows.push({
                productID: '',
                price: 0,
                weight: 0,
                qty: 0,
                totalWeight: 0,
                addCost: 0,
                totalPrice: 0,
                product: []
            });
        },

        delRow(index) {
            return this.rows.splice(index, 1);
        }
    },

    computed: {
        subTotal() {
            var sum = 0;
            for (var i = 0; i < this.rows.length; i++) {
                sum += parseFloat(this.rows[i].totalPrice);
            }
            return this.SubTotal = sum;
        },

        beratOrder() {
            var sum = 0;
            for (var i = 0; i < this.rows.length; i++) {
                sum += parseFloat(this.rows[i].totalWeight);
            }
            return this.totalBerat = sum;
        },

        grandTotal() {
            return this.GrandTotal = this.SubTotal + parseFloat(this.ongkir) - parseFloat(this.diskon);
        }

    }
});
