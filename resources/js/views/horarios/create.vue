 <template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Horarios</h4>
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
                            <a href="#">Crear Horario</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Gestionar Horario: {{doctor.name}}
                                </div>
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <table  class="display table table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>DIA</th>
                                                <th>ACTIVO</th>
                                                <th colspan="2">TURNO MAÑANA</th>
                                                <th colspan="2">TURNO TARDE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="days in times">
                                                <th>{{days.Description}}</th>
                                                <th>
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <select v-model="form.InicioMañana" class="form-control">
                                                            <option v-for="option in days.hour" :key="option.id" :value="option.id" :label="option.Mañana"></option>
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <select v-model="form.FinMañana" class="form-control">
                                                            <option v-for="option in days.hour" :key="option.id" :value="option.id" :label="option.Mañana"></option>
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <select v-model="form.InicioTarde" class="form-control">
                                                            <option v-for="option in days.hour" :key="option.id" :value="option.id" :label="option.Tarde"></option>
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        <select v-model="form.FinTarde" class="form-control">
                                                            <option v-for="option in days.hour" :key="option.id" :value="option.id" :label="option.Tarde"></option>
                                                        </select>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                                        
                            </div>
                            <div class="card-action">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="button" class="btn btn-default" @click.prevent="close()"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="primary" name="agregar" class="btn btn-primary" :loading="loading_submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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
        props: {
            'records': {
                required: true,
            
                default: 0
            },
        },
        data(){
            return{
                loading_submit: false,
                resource: 'Horarios',
                errors: {},
                form: {},
                times: [],
                doctor: {},
            }
        },
        async created() {
            await this.initForm()
            await this.getTimes()
            await this.getDoctor()
        },
        methods: {
            initForm() {
                this.errors = {}

                this.times = null,
                this.doctor = null,
                this.form = {
                    id: null,
                    InicioMañana: null,
                    FinMañana: null,
                    InicioTarde: null,
                    FinTarde: null,
                    description: " ",
                    estado: null,
                }
                
            },
            getTimes(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.times = response.data.time
                    console.log(this.times)
                });
            },
            getDoctor(){
                
                this.$http.get(`/${this.resource}/dentist/${this.records}`).then((response) => {
                    this.doctor = response.data.dentist[0]
                });
            },
            async submit() {
                this.loading_submit = true
                console.log(this.form)
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.close()
                        this.$swal("Odontòlogo registrado exitosamente")
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            close() {
                this.initForm()
            },
        }
    }
</script>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 70px;
  height: 25px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 10px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(30px);
  -ms-transform: translateX(30px);
  transform: translateX(30px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 25px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>