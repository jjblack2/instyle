new Vue ({
    el: '#root',

    mounted() {
        axios.get('/products').then(response => console.log(response));
    }
});
