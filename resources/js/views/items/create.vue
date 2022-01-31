<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Productos</h4>
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
                            <a href="#">Nuevo Producto</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Nuevo Producto
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input v-model="form.name"  type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre Secundario</label>
                                            <input v-model="form.second_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <input v-model="form.description"  type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label>Modelo</label>
                                            <div class="input-group">
                                                <input v-model="form.model" class="form-control" >
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Unidad</label>
                                            <select v-model="form.unit_type_id" class="form-control">
                                                <option v-for="option in unit_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Moneda</label>
                                            <select v-model="form.currency_type_id"  class="form-control" id="select2">
                                                <option v-for="option in currency_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Precio Unitario</label>
                                            <div class="input-group">
                                                <input v-model="form.sale_unit_price" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de afectación (Venta)</label>
                                            <select v-model="form.sale_affectation_igv_type_id" @change="changeAffectationIgvType" class="form-control">
                                                <option v-for="option in affectation_igv_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" v-show="show_has_igv">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input v-model="form.has_igv" type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Incluye Igv </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input v-model="form.has_plastic_bag_taxes" type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Impuesto a la Bolsa Plástica </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" v-show="form.unit_type_id !='ZZ'">
                                            <label>Stock Inicial</label>
                                            <div class="input-group">
                                                <input v-model="form.stock" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" v-show="form.unit_type_id !='ZZ'">
                                            <label>Stock Mínimo</label>
                                            <div class="input-group">
                                                <input v-model="form.stock_min" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" v-if="form.unit_type_id !='ZZ'">
                                        <div class="form-group">
                                            <label>Almacén</label>
                                            <select v-model="form.warehouse_id" filterable class="form-control">
                                                <option v-for="option in warehouses" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" v-show="form.unit_type_id !='ZZ'">
                                        <div class="form-group">
                                            <label>Fecha Vencimiento</label>
                                            <div class="input-group">
                                                <input v-model="form.date_of_due" class="form-control" type="date">
                                            </div>
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
                resource: 'Items',
                errors: {},
                form: {},
                unit_types: [],
                currency_types: [],
                affectation_igv_types: [],
                warehouses: [],
            }
        },
        async created() {
            await this.initForm()
            await this.$http.get(`/${this.resource}/tables`)
                .then(response => {
                    console.log(response)
                    this.unit_types = response.data.unit_types
                    this.currency_types = response.data.currency_types
                    this.affectation_igv_types = response.data.affectation_igv_types
                    this.warehouses = response.data.warehouses

                    this.form.sale_affectation_igv_type_id = (this.affectation_igv_types.length > 0)?this.affectation_igv_types[0].id:null
                    this.form.purchase_affectation_igv_type_id = (this.affectation_igv_types.length > 0)?this.affectation_igv_types[0].id:null
                })
        },
        methods: {
            initForm() {
                this.errors = {}
                this.form = {
                    id: null,
                    internal_id: null,
                    item_code: null,
                    item_code_gs1: null,
                    description: null,
                    model: null,
                    name: null,
                    second_name: null,
                    unit_type_id: 'NIU',
                    currency_type_id: 'PEN',
                    sale_unit_price: 0,
                    purchase_unit_price: 0,
                    has_isc: false,
                    percentage_isc: 0,
                    suggested_price: 0,
                    amount_plastic_bag_taxes: 0.10,
                    sale_affectation_igv_type_id: null,
                    purchase_affectation_igv_type_id: null,
                    stock: 0,
                    stock_min: 1,
                    has_igv: false,
                    date_of_due:null,
                    has_plastic_bag_taxes: false,
                }
                this.show_has_igv = true
                this.purchase_show_has_igv = true
                this.enabled_percentage_of_profit = false
            },
            async submit() {
                this.loading_submit = true
                console.log(this.form)
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        console.log(response)
                        this.close()
                        this.$swal("Producto registrado exitosamente")
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            changeAffectationIgvType(){
                let affectation_igv_type_exonerated = [20,21,30,31,32,33,34,35,36,37]
                let is_exonerated = affectation_igv_type_exonerated.includes((parseInt(this.form.sale_affectation_igv_type_id)));

                if(is_exonerated){
                    this.show_has_igv = false
                    this.form.has_igv = true
                }else{
                    this.show_has_igv = true
                }
            },
            close() {
                console.log("xddd")
                this.initForm()
            },
        }
    }
</script>