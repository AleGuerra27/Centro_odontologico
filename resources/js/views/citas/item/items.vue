<template>
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto o Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Producto/Servicio</label>
                                <select v-model="form.item_id"  class="form-control" @change="changeItem(form.item_id)">
                                    <option v-for="option in items" :key="option.id" :value="option.id" :label="option.name"></option>
                                </select>
                                <div class="custom-control custom-checkbox">
                                    <input  type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Impuesto a la Bolsa Plástica</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Afectación Igv</label>
                                <select v-model="form.sale_affectation_igv_type_id" @change="changeAffectationIgvType" class="form-control">
                                    <option v-for="option in affectation_igv_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                </select>
                                <div class="custom-control custom-checkbox">
                                    <input  type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Editar </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cantidad</label>
                                <input v-model="form.quantity" @input="calculateQuantity" ref="inputQuantity" class="form-control">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio Unitario</label>
                                <input v-model="form.unit_price_value" @input="calculateQuantity" ref="inputQuantity" class="form-control">
                                </input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Total</label>
                                <input v-model="readonly_total" ref="inputQuantity" class="form-control">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
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
                items: [],
            }
        },
        async created() {
            await this.initForm()
            await this.getAffectationIgv()
            await this.$http.get(`/${this.resource}/table`)
                .then(response => {
                    console.log(response)
                    this.all_items = response.data.items
                    this.items = response.data.items
                })
        },
        methods: {
            initForm() {
                this.errors = {}
                this.readonly_total = 0,
                this.form = {
                    item_id: null,
                    item: {},
                    affectation_igv_type_id: null,
                    affectation_igv_type: {},
                    has_isc: false,
                    system_isc_type_id: null,
                    percentage_isc: 0,
                    suggested_price: 0,
                    quantity: 1,
                    readonly_total: 0,
                    unit_price_value: 0,
                    input_unit_price_value: 0,
                    unit_price: 0,
                    has_igv: null,
                    has_plastic_bag_taxes:false,
                    warehouse_id:null,
                    document_item_id: null,
                }
                this.show_has_igv = true
                this.purchase_show_has_igv = true
                this.enabled_percentage_of_profit = false
            },
            getAffectationIgv(){
                this.$http.get(`/${this.resource}/tables`)
                .then(response => {
                    console.log(response)
                    this.affectation_igv_types = response.data.affectation_igv_types
                })
            },
            calculateQuantity(){
                this.readonly_total = _.round((this.form.quantity * this.form.unit_price_value), 4)
            },
            changeItem(item_id){
                let item = item_id
                this.form.sale_affectation_igv_type_id = null
                this.itemss = _.filter(this.all_items, {'id': item});
                console.log(this.itemss)
                this.form.unit_price_value = this.itemss[0].sale_unit_price
                this.form.sale_affectation_igv_type_id = (this.itemss.length > 0)?this.itemss[0].sale_affectation_igv_type_id:null
                this.readonly_total = _.round((this.form.quantity * this.form.unit_price_value), 4)
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
