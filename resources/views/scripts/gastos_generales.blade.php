<script>
    var vm = new Vue({
        el: "#app",
        data: {
            nombre: '',
            placeholder_nombre: 'Terreno',
            errors: '',
            gasto_general: '{{$gasto_general->id}}',
        },
        methods: {
            create_expenditure_type: function()
            {
                var that = this;
                this.$http.post('/tipo_gasto', {name: this.nombre, gasto_general: this.gasto_general}).then((response) => {
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