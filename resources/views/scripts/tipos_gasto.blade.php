<script>
    var vm = new Vue({
        el: "#app",
        data: {
            concept: '',
            measure_unit: '',
            unit_cost: '',
            quantity: '',
            total: '',
            deductible: '',
            errors: '',
            expenditure_type: '{{$tipo_gasto->id}}',
        },
        methods: {
            create_expenditure: function()
            {
                var that = this;
                this.$http.post('/gasto', {expenditure_type: this.expenditure_type, concept: this.concept, measure_unit: this.measure_unit, unit_cost: this.unit_cost, quantity: this.quantity, total: this.total, deductible: this.deductible}).then((response) => {
                    if (response.body == 'Exito') {
                        location.reload();
                    }
                    else {
                        that.errors = response.body;
                    }
                }, (response) => {
                    // error callback
                });
            }
        }
    })
</script>