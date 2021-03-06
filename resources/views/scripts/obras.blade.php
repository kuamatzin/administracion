<script>
    var vm = new Vue({
        el: "#app",
        data: {
            nombre: '',
            placeholder_nombre: 'Terreno',
            errors: '',
            concept: '',
            quantity: '',
            account_id: 0,
            errors_incomes: '',
            construction: '{{$obra->id}}',
        },
        methods: {
            create_general_expenditure: function()
            {
                var that = this;
                this.$http.post('/gasto_general', {name: this.nombre, construction: this.construction}).then((response) => {
                    if (response.body == 'Exito') {
                        location.reload();
                    }
                    else {
                        that.errors = response.body;
                    }
                }, (response) => {
                    // error callback
                });
            },
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