<template>
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
                        <a href="#">Listado de citas</a>
                    </li>
                </ul>
            </div>
            <div class="row">						
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Mostrar</h4>
                                <a href="#" @click.prevent="Nuevo()" class="btn btn-primary btn-round ml-auto">Nuevo</a>
                            </div>
                            <div class="card-tools">
                                <a href="../view/specialty/reporte.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Nombre Paciente</th>
                                                <th>DNI</th>
                                                <th>Descripción</th>
                                                <th>Teléfono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in form.records" role="row">
                                                <td>{{index}}</td>
                                                <td>{{row.patient.name}}</td>
                                                <td>{{row.patient.number}}</td>
                                                <td>{{row.description}}</td>
                                                <td>{{row.patient.telephone}}</td>
                                                <td v-if="row.patient.historia==0"><div class="form-button-action">
													<button @click.prevent="Aperturar(row.patient_id)" type="button" class="btn btn-link btn-black btn-lg" title="Aperturar Historia"><i class="fa fa-id-card" aria-hidden="true"></i></button>
								                </div></td>
                                                <td v-else>
                                                    <button @click.prevent="Actualizar(row.patient_id)" href="#" class="btn btn-link btn-lg" title="Actualizar Historia" data-original-title="Delete Task"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                                        
                            </div>
                        </div>                                                
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
    export default {
        data(){
            return{
                loading_submit: false,
                resource: 'Historia',
                errors: {},
                form: {},
                form2: {},
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
        },
        methods:{
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
                }
                this.form2 = {
                    FechaApertura: null,
                    Description: null,
                    patient_id: null,
                    odontogram_id: null,
                }
            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.form = response.data
                });
            },
            Nuevo(){
                location.href = '/patients/create'
            },
            Aperturar(patient){
                this.form2.FechaApertura = moment().format("DD/MM/YYYY");
                this.form2.Description = "historia clìnica";
                this.form2.patient_id = patient;
                this.$http.post(`/${this.resource}/create/historia`, this.form2)
                    .then(response => {
                        console.log(response)
                        this.$swal("Aperturado","Historia Clínica aperturada")
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.getRecords();
            },
            Actualizar(patient){
                console.log(patient)
                location.href = `/Historia/create/${patient}`
            },
        }
    }
</script>
