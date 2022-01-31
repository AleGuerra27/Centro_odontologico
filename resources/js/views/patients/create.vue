<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Citas</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="../view/admin/admin.php">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a href="#">Mostrar</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Registrar Paciente
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>  Tipo de Documento</label>
                                            <select v-model="form.tipo" @change="changeDocumentType" class="form-control">
                                                <option v-for="option in document_types" :key="option.id" :value="option.id" :label="option.TipoDocument"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <template v-if="enabled_dni">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>DNI</label>
                                                <div class="input-group">
                                                    <input v-model="form.number"  type="text" required class="form-control" maxlength="8" placeholder="Ingrese dni" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn-black btn-border" type="button" @click.prevent="searchPatient">
                                                            <span class="spinner-border spinner-border-sm" v-if="enabled_spinner"></span>
                                                            RENIEC
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-if="enabled_ruc">
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label>RUC</label>
                                                <div class="input-group">
                                                    <input v-model="form.number"  type="text" required class="form-control" maxlength="11" placeholder="Ingrese ruc" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn-black btn-border" type="button" @click.prevent="searchPatient">
                                                            <span class="spinner-border spinner-border-sm" v-if="enabled_spinner"></span>
                                                            SUNAT
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input v-model="form.name" name="nombrep" type="text" class="form-control" required placeholder="Nombre y/o Razòn social">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Dirección</label>
                                            <input v-model="form.address" name="apellidop" type="text" class="form-control" required placeholder="Ingrese dirección">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Fecha de nacimiento</label>
                                            <div class="input-group">
                                                <input v-model="form.nacimiento" type="date" class="form-control" id="datepicker" name="datepicker">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar-check"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input v-model="form.telephone" name="tele" type="text" class="form-control" required maxlength="9" placeholder="Ingrese teléfono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select v-model="form.sexo" class="form-control" name="sexo">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo Paciente</label>
                                            <select v-model="form.tratamiento" class="form-control" name="tratamiento">
                                                <option value=""></option>
                                                <option value="Tratamiento">Tratamiento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input v-model="form.email" name="email" type="text" class="form-control" required placeholder="Ingrese email">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary" name="agregar" class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </form>
</template>
<script>
    
    export default {
        data(){
            return{
                loading_submit: false,
                resource: 'patients',
                errors: {},
                form: {},
                enabled_dni: true,
                enabled_spinner: false,
                enabled_ruc: false,
                document_types: [],
            }
        },
        async created() {
            await this.initForm()
        },
        methods: {
            initForm() {
                this.errors = {}
                this.form = {
                    id: null,
                    number: '',
                    name: null,
                    address: null,
                    telephone: null,
                    nacimiento: null,
                    email: null,
                    sexo: null,
                    tipo: null,
                    tratamiento: null,
                }
                this.getRecords();
            },
            async submit() {
                this.loading_submit = true
                console.log(this.form)
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.close()
                        this.$swal("Paciente registrado exitosamente")
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            async searchPatient(){
                if(this.form.number === '') {
                    this.$message.error('Ingresar el número a buscar')
                    return
                }
                let identity_document_type_name = ''
                let nombres = ''
                this.form.name = nombres
                console.log(this.form.tipo)
                if(this.form.tipo=='6'){
                    this.enabled_spinner= true
                    identity_document_type_name = 'ruc'
                    let response = await this.$http.get(`/Service/${identity_document_type_name}/${this.form.number}`)
                    console.log(response)
                    this.enabled_spinner=false
                    nombres = response.data.person.razonSocial
                    this.form.address = response.data.person.direccion
                    this.form.name = nombres
                    if(response.data.success) {
                        
                    } else {
                        this.$message.error(response.data.message)
                    }
                }
                if(this.form.tipo=='1'){
                    this.enabled_spinner= true
                    identity_document_type_name = 'dni'
                    let response = await this.$http.get(`/Service/${identity_document_type_name}/${this.form.number}`)
                    console.log(response)
                    this.enabled_spinner=false
                    nombres = response.data.person.apellidoPaterno+' '+response.data.person.apellidoMaterno+' '+response.data.person.nombres
                    this.form.name = nombres
                        console.log(nombres)
                    if(response.data.success) {
                        
                    } else {
                        this.$message.error(response.data.message)
                    }
                }
            },
            getRecords(){
                this.$http.get(`/${this.resource}/document`).then((response) => {
                    console.log(response)
                    this.document_types = response.data.document
                    this.form.tipo = (this.document_types.length > 0)?this.document_types[0].id:null
                });
            },
            
            changeDocumentType(){
                if(this.enabled_dni == false){
                    this.enabled_dni = true
                    this.enabled_ruc = false
                }
                else{
                    this.enabled_dni = false
                    this.enabled_ruc = true
                }
                this.form.number = ''
            },
            close() {
                console.log("xddd")
                this.initForm()
            },            
        }
    }
</script>
