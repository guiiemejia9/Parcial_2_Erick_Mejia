new Vue({
    el: '#crud',
    created: function() {
        this.getDatos();
    },
    data: {
        datos: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newNombre: '',
        newFecha: '',
        newNombre_autor: '',
        newSerie: '',
        fillDato: {'id': '', 'nombre': '', 'fecha': '', 'nombre_autor': '', 'serie': ''},
        errors: '',
        offset: 3,
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if(!this.pagination.to){
                return [];
            }

            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }

            var to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        getDatos: function(page) {
            var urlDatos = 'libros?page='+page;
            axios.get(urlDatos).then(response => {
                this.datos = response.data.libros.data,
                    this.pagination = response.data.pagination
            });
        },
        editDato: function(dato) {
            this.fillDato.id   = dato.id;
            this.fillDato.nombre = dato.nombre;
            this.fillDato.fecha = dato.fecha;
            this.fillDato.nombre_autor = dato.nombre_autor;
            this.fillDato.serie = dato.serie;
            $('#edit').modal('show');
        },
        updateDato: function(id) {
            var url = 'libros/' + id;
            axios.put(url, this.fillDato).then(response => {
                this.getDatos();
                this.fillDato = {'id': '', 'nombre': '', 'fecha': '', 'nombre_autor': '', 'serie': ''};
                this.errors	  = [];
                $('#edit').modal('hide');
                toastr.success('Tarea actualizada con éxito');
            }).catch(error => {
                this.errors = 'Corrija para poder editar con éxito'
            });
        },
        deleteDato: function(dato) {
            var url = 'libros/' + dato.id + dato.nombre + dato.fecha + dato.nombre_autor + dato.serie;
            axios.delete(url).then(response => { //eliminamos
                this.getDatos(); //listamos
                toastr.success('Eliminado correctamente'); //mensaje
            });
        },

        createDato: function() {
            var url = 'libros';
            axios.post(url, {
                nombre: this.newNombre,
                fecha: this.newFecha,
                nombre_autor: this.newNombre_autor,
                serie: this.newSerie,
            }).then(response => {
                this.getDatos();
                this.newNombre = '';
                this.newFecha = '';
                this.newNombre_autor = '';
                this.newSerie = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nueva tarea creada con éxito');
            }).catch(error => {
                this.errors = 'Corrija para poder crear con éxito'
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getDatos(page);
        }
    }
});
































