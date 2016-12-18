<script>
    var vm = new Vue({
        el: "#app",
        data: {
            nombre: '',
            placeholder_nombre: 'Terreno',
            errors: '',
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
            }
        }
    })
</script>