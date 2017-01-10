<script>
    var vm = new Vue({
        el: "#app",
        data: {
            concept: '',
            quantity: '',
            account_id: 0,
            errors_incomes: '',
            construction: '{{$obra->id}}',
        },
        methods: {
            create_income: function()
            {
                var that = this;
                this.$http.post('/ingreso', {concept: this.concept, quantity: this.quantity, account_id: this.account_id, construction: this.construction}).then((response) => {
                    if (response.body == 'Exito') {
                        location.reload();
                    }
                    else {
                        that.errors_incomes = response.body;
                    }
                }, (response) => {
                    // error callback
                });
            }
        }
    })
</script>