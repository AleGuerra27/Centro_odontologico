<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nueva Cita</h4>
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
                                    Nueva Cita
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Médico-Odontólogo</label>
                                            <select v-model="form.dentist_id" class="form-control">
                                                <option v-for="option in dentist" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de tratamiento</label>
                                            <input v-model="form.date_of_treatment" type="date" class="form-control" id="datepicker" name="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hora Inicio</label>
                                            <input v-model="form.start_time" type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hora Fin</label>
                                            <input v-model="form.end_time" type="time" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Paciente</label>
                                            <select v-model="form.patient_id" class="form-control" id="select2">
                                                <option v-for="option in patient" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Monto</label>
                                            <input v-model="form.monto" type="text" required class="form-control" maxlength="8" placeholder="Ingrese monto" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-action">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal" data-target="#exampleModal"  @click.prevent="clickAddItemInvoice">
                                            + Agregar Servicio
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary" name="agregar" class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Generar Cita</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <items :showDialog.sync="showDialogPayments"
                           @add="addPayments"></items>
    </form>
</template>
<script>
    import items from './item/items.vue'
    import VueSweetalert2 from 'vue-sweetalert2';
    export default {
        components: {items},
        data(){
            return{
                loading_submit: false,
                resource: 'citas',
                errors: {},
                form: {},
                dentist: [],
                showDialogPayments: false,
                customers: [],
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
        },
        methods: {
            initForm() {
                this.errors = {}
                this.form = {
                    id: null,
                    dentist_id: null,
                    patient_id: null,
                    date_of_treatment: null,
                    start_time: null,
                    end_time: null,
                    description: null,
                    monto: 0,                    
                }
                this.orders= {
                    id : null,
                    patient_id: null,
                    description: null,
                    monto: null,
                },
                this.patient = null
                this.dentist = null
            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.patient = response.data.customers
                    this.dentist = response.data.dentist
                });
            },
            addPayments(){
                
            },
            clickAddItemInvoice(){

            },
            async submit() {
                this.orders.patient_id = this.form.patient_id
                this.orders.description = this.form.description
                this.orders.monto = this.form.monto
                this.loading_submit = true
                console.log(this.form)
                this.saveOrder();
                this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.$swal("Registrado","Se registrò la cita")
                        this.close()
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            saveOrder(){
                this.$http.post(`/orders`, this.orders)
                    .then(response => {
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            close() {
                console.log("xddd")
                this.initForm()
            },
        }
    }
</script>
