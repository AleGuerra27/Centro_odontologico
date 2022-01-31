<template>
    <form autocomplete="off" @submit.prevent="submit">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nuevo comprobante electrónico</h4>
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
                                    Nuevo comprobante electrónico
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo de comprobante</label>
                                            <select v-model="form.document_type_id" @change="changeDocumentType" class="form-control">
                                                <option v-for="option in document_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Serie</label>
                                            <select v-model="form.serie_id" class="form-control">
                                                <option v-for="option in series" :key="option.id" :value="option.id" :label="option.number"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de emisión</label>
                                            <input v-model="form.date_of_issue" type="date" class="form-control" id="datepicker" name="datepicker" @change="RateByDate">
                                        </div>
                                    </div>                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha de vencimiento</label>
                                            <div class="input-group">
                                                <input v-model="form.date_of_due" type="date" class="form-control" id="datepicker" name="datepicker">
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Paciente</label>
                                            <select v-model="form.customer_id" class="form-control" id="select2">
                                                <option v-for="option in customers" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Moneda</label>
                                            <select v-model="form.currency_type_id" @change="changeCurrencyType" class="form-control" id="select2">
                                                <option v-for="option in currency_types" :key="option.id" :value="option.id" :label="option.description"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo de cambio</label>
                                            <input v-model="form.exchange_rate_sale" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <select v-model="form.customer_id" class="form-control" id="select2">
                                                <option v-for="option in customers" :key="option.id" :value="option.id" :label="option.name"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="30%" >Descripción</th>
                                                <th width="15%">Unidad</th>
                                                <th width="10%">Cantidad</th>
                                                <th width="15%">Valor Unitario</th>
                                                <th width="15%">Precio Unitario</th>
                                                <th width="10%">Subtotal</th>
                                                <!--<th class="text-right font-weight-bold">Cargo</th>-->
                                                <th width="10%">Total</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in form.items" :key="index">
                                                <td>{{index + 1}}</td>
                                                <td><el-input v-model="row.item.description"></el-input>
                                                <td class="text-right">{{currency_type.symbol}} {{getFormatUnitPriceRow(row.unit_value)}}</td>
                                                <td class="text-right">{{currency_type.symbol}} {{getFormatUnitPriceRow(row.unit_price)}}</td>
                                                <td class="text-right">{{currency_type.symbol}} {{row.total_value}}</td>
                                                <td class="text-right">{{currency_type.symbol}} {{row.total}}</td>
                                                <td class="text-right">
                                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickRemoveItem(index)">x</button>
                                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-info" @click="ediItem(row, index)" ><span style='font-size:10px;'>&#9998;</span> </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal" data-target="#exampleModal"  @click.prevent="clickAddItemInvoice">
                                                            + Buscar Pagos
                                                        </button>
                                                    </div>
                                                </td>
                                                <td colspan="2"></td>
                                                <td colspan="5" class="p-0">
                                                    <table class="table-sm text-right" style="width: 100%;">
                                                        <tr v-if="form.total_exportation > 0">
                                                            <td>OP.EXPORTACIÓN</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_exportation }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_free > 0">
                                                            <td>OP.GRATUITAS</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_free }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_unaffected > 0">
                                                            <td>OP.INAFECTAS</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_unaffected }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_exonerated > 0">
                                                            <td>OP.EXONERADAS</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_exonerated }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_taxed > 0">
                                                            <td>OP.GRAVADA</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_taxed }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_prepayment > 0">
                                                            <td>ANTICIPOS</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_prepayment }}</td>
                                                        </tr>
                                                        <!-- <tr v-if="form.total_discount > 0">
                                                            <td>DESCUENTOS</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_discount }}</td>
                                                        </tr> -->
                                                        <tr v-if="form.total_igv > 0">
                                                            <td>IGV</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_igv }}</td>
                                                        </tr>
                                                        <tr v-if="form.total_plastic_bag_taxes > 0">
                                                            <td>ICBPER</td>
                                                            <td>:</td>
                                                            <td class="text-right">{{ currency_type.symbol }} {{ form.total_plastic_bag_taxes }}</td>
                                                        </tr>
                                                        <tr>
                                                            <template v-if="form.total > 0">
                                                                <td class="text-right" v-if="form.total > 0">TOTAL A PAGAR</td>
                                                                <td>:</td>
                                                                <td>{{ currency_type.symbol }} {{ form.total }}</td>
                                                            </template>
                                                        </tr>
                                                        <tr v-if="form.total > 0">
                                                            <td>CONDICION DE PAGO</td>
                                                            <td>:</td>
                                                            <td><div class="form-group mb-2 mr-2" :class="{'has-danger': errors.method_type_id}">
                                                                <el-select v-model="form.method_type_id" filterable @change="changePaymentMethodType" popper-class="el-select-method_types" dusk="method_type_id">
                                                                    <el-option v-for="option in method_types" :key="option.id" :value="option.id" :label="option.name"></el-option>
                                                                </el-select>
                                                                <small class="form-control-feedback" v-if="errors.method_type_id" v-text="errors.method_type_id[0]"></small>
                                                            </div></td>
                                                        </tr>
                                                        <template v-if="(form.operation_type_id == '1001' || form.operation_type_id == '1004')">
                                                            <tr v-if="form.total_pending_payment > 0">
                                                            <!-- <tr v-if="form.detraction.amount > 0 && form.total_pending_payment > 0"> -->
                                                                <td>M. PENDIENTE</td>
                                                                <td>:</td>
                                                                <td>{{ currency_type.symbol }} {{ form.total_pending_payment }}</td>
                                                            </tr>
                                                        </template>
                                                        <template v-if="(form.retention)">
                                                            <tr v-if="form.total_pending_payment > 0 && form.retention.amount > 0">
                                                            <!-- <tr v-if="form.detraction.amount > 0 && form.total_pending_payment > 0"> -->
                                                                <td>M. PENDIENTE</td>
                                                                <td>:</td>
                                                                <td>{{ currency_type.symbol }} {{ form.total_pending_payment }}</td>
                                                            </tr>
                                                        </template>
                                                        <tr v-if="form.total > 0">
                                                            <td colspan="3" class="p-0">
                                                                <div>
                                                                    <table class="text-left" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <template v-if="enabled_payments">
                                                                                    <th style="width: 120px;">Método de pago</th>
                                                                                    <template v-if="enabled_credit">
                                                                                        <th style="width: 120px;" v-if="form.payments2.length>0" class="pb-2">Destino
                                                                                            <el-tooltip class="item" effect="dark" content="Aperture caja o cuentas bancarias" placement="top-start">
                                                                                                <i class="fa fa-info-circle"></i>
                                                                                            </el-tooltip>
                                                                                        </th>
                                                                                        <th style="width: 120px;" v-if="form.payments2.length>0" class="pb-2">Referencia</th>
                                                                                        <th style="width: 100px;" v-if="form.payments2.length>0" class="pb-2">Monto</th>
                                                                                        <th style="width: 30px;"></th>
                                                                                    </template>
                                                                                </template>
                                                                                <template v-if="enabled_credito">
                                                                                    <th style="width: 40%;">Método de pago</th>
                                                                                    <th style="width: 40%;" v-if="form.payments2.length>0" class="pb-2">Fecha</th>
                                                                                    <th style="width: 20%;" v-if="form.payments2.length>0" class="pb-2">Monto</th>
                                                                                </template>
                                                                                <!-- <template v-if="enabled_CreditoCuotas">
                                                                                    <th style="width: 50%;" v-if="form.payments2.length>0" class="pb-2">Fecha</th>
                                                                                    <th style="width: 50%;" v-if="form.payments2.length>0" class="pb-2">Monto</th>
                                                                                </template>-->
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr v-for="(row, index) in form.payments2" :key="index">
                                                                                <template v-if="enabled_payments" >   
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" :class="{'has-danger': errors.payment_method_type_id}">
                                                                                            <el-select v-model="row.payment_method_type_id" filterable popper-class="el-select-payment_method_types" dusk="payment_method_type_id" @change="changeMethodType(index)">
                                                                                                <el-option v-for="option in payment_method_types" :key="option.id" :value="option.id" :label="option.description"></el-option>
                                                                                            </el-select>
                                                                                            <small class="form-control-feedback" v-if="errors.payment_method_type_id" v-text="errors.payment_method_type_id[0]"></small>
                                                                                        </div>
                                                                                    </td> 
                                                                                    <template v-if="enabled_credit">
                                                                                        <td>
                                                                                            <div class="form-group mb-2 mr-2">
                                                                                                <el-select v-model="row.payment_destination_id" filterable >
                                                                                                    <el-option v-for="option in payment_destinations" :key="option.id" :value="option.id" :label="option.description"></el-option>
                                                                                                    <!-- <el-option v-for="option in payment_destinations" @change="changeDestinationSale(index)" :key="option.id" :value="option.id" :label="option.description"></el-option> -->
                                                                                                </el-select>
                                                                                            </div>
                                                                                        </td>
                                                                                    
                                                                                        <td>
                                                                                            <div class="form-group mb-2 mr-2"  >
                                                                                                <el-input v-model="row.reference"></el-input>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="form-group mb-2 mr-2" >
                                                                                                <el-input v-model="row.payment"></el-input>
                                                                                            </div>
                                                                                        </td>
                                                                                    </template>
                                                                                    <th v-if="form.payments2.length>1">
                                                                                        <button  type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickCancel(index)">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </button>
                                                                                    </th>
                                                                                </template>
                                                                                <template v-if="enabled_credito">
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" :class="{'has-danger': errors.payment_method_type_id}">
                                                                                            <el-select v-model="row.payment_method_type_id" filterable popper-class="el-select-payment_method_types" dusk="payment_method_type_id" @change="changeMethodType(index)">
                                                                                                <el-option v-for="option in payment_method_types" :key="option.id" :value="option.id" :label="option.description"></el-option>
                                                                                            </el-select>
                                                                                            <small class="form-control-feedback" v-if="errors.payment_method_type_id" v-text="errors.payment_method_type_id[0]"></small>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" >
                                                                                            <div class="form-group" :class="{'has-danger': errors.date_of_payment}">
                                                                                                <el-date-picker v-model="row.date_of_payment" type="date" value-format="yyyy-MM-dd" :clearable="false" :readonly="readonly_date_of_due"></el-date-picker>
                                                                                                <small class="form-control-feedback" v-if="errors.date_of_payment" v-text="errors.date_of_payment[0]"></small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" >
                                                                                            <el-input v-model="row.payment"></el-input>
                                                                                        </div>
                                                                                    </td> 
                                                                                </template>
                                                                                <template v-if="enabled_CreditoCuotas">
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" >
                                                                                            <div class="form-group" :class="{'has-danger': errors.date_of_payment}">
                                                                                                <!--<label class="control-label">Fecha de emisión</label>-->
                                                                                                <el-date-picker v-model="row.date_of_payment" type="date" value-format="yyyy-MM-dd" :clearable="false" :readonly="readonly_date_of_due"></el-date-picker>
                                                                                                <small class="form-control-feedback" v-if="errors.date_of_payment" v-text="errors.date_of_payment[0]"></small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="form-group mb-2 mr-2" >
                                                                                            <el-input v-model="row.payment"></el-input>
                                                                                        </div>
                                                                                    </td>
                                                                                    <th v-if="form.payments2.length>1">
                                                                                        <button  type="button" class="btn waves-effect waves-light btn-xs btn-danger" @click.prevent="clickCancel(index)">
                                                                                            <i class="fa fa-trash"></i>
                                                                                        </button>
                                                                                    </th>
                                                                                </template>
                                                                                <br>
                                                                            </tr>
                                                                            <template v-if="enabled_AddPayment">
                                                                                <tr >
                                                                                    <td colspan="5" class="p-0">
                                                                                        <a href="#" @click.prevent="clickAddPayment" class="btn waves-effect waves-light btn-xs btn-primary"><i class="fas fa-plus spaceIcon"></i>Agregar Pago</a>
                                                                                    </td>
                                                                                </tr>
                                                                            </template>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> 
                                        </tbody>
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
        <document-form-person :showDialog.sync="showDialogPayments"
                           @add="addPayments"></document-form-person>
    </form>
    
</template>
<script>
    import DocumentFormPerson from './pagos/pagos.vue'
    import {functions, exchangeRate} from '../../mixins/functions'
    import moment from 'moment'
    export default {
        components: {DocumentFormPerson},
        mixins: [functions, exchangeRate],
        data(){
            return{
                loading_submit: false,
                resource: 'documents',
                errors: {},
                form: {},
                document_types: [],
                series: [],
                currency_types: [],
                all_series: [],
                payment_method_types: [],
                method_types: [],
                customers: [],
                showDialogPayments: false,
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
                    series_id: null,
                    method_types_id: null,
                    document_type_id: null,
                    date_of_issue: moment().format('YYYY-MM-DD'),
                    time_of_issue: null,
                    customer_id: null,
                    currency_type_id: null,
                    purchase_order: null,
                    exchange_rate_sale: 0,
                    total_prepayment: 0,
                    total_charge: 0,
                    total_discount: 0,
                    total_exportation: 0,
                    total_free: 0,
                    total_taxed: 0,
                    total_unaffected: 0,
                    total_exonerated: 0,
                    total_igv: 0,
                    total_base_isc: 0,
                    total_isc: 0,
                    total_base_other_taxes: 0,
                    total_other_taxes: 0,
                    total_plastic_bag_taxes: 0,
                    total_taxes: 0,
                    total_value: 0,
                    total: 0,
                    operation_type_id: null,
                    date_of_due: moment().format('YYYY-MM-DD'),
                    date_of_payment: null,
                    payments: [],
                    payments2: [],
                    payment_method_type_id:null,
                    method_type_id:null,
                }
            },
            getRecords(){
                this.$http.get(`/${this.resource}/tables`).then((response) => {
                    console.log(response)
                    this.customers = response.data.customers
                    this.all_series = response.data.series
                    this.payment_method_types = response.data.payment_method_types
                    this.method_types = response.data.method_types
                    this.document_types = response.data.document_types
                    this.currency_types = response.data.currency_types

                    this.form.currency_type_id = (this.currency_types.length > 0)?this.currency_types[0].id:null;
                    this.form.document_type_id = (this.document_types.length > 0)?this.document_types[0].id:null;
                    this.filterSeries();
                    this.RateByDate();
                });
            },
            changeCurrencyType(){

            },
            async RateByDate() {
              
                let response = await this.$http.get(`/Service/exchange_rate/${this.form.date_of_issue}`)
                this.form.exchange_rate_sale = response.data.exchange.venta
            },
            addPayments(){
                
            },
            filterSeries() {
                this.form.serie_id = null
                this.series = _.filter(this.all_series, {'document_type_id': this.form.document_type_id});
                this.form.serie_id = (this.series.length > 0)?this.series[0].id:null
            },
            changeDocumentType() {
                this.filterSeries();
            },
            clickAddItemInvoice(){
                this.showDialogPayments = true
            },
            async submit() {
                this.loading_submit = true
                await this.$http.post(`/${this.resource}`, this.form)
                    .then(response => {
                        if (response.data.success) {
                            this.$message.success(response.data.message)
                            this.close()
                        } else {
                            this.$message.error(response.data.message)
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
                    .then(() => {
                        this.loading_submit = false
                    })
            },
            close() {
                this.initForm()
            },
        }
    }
</script>
