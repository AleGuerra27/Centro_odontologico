<template>
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
                        <a href="#">Mostrar</a>
                    </li>
                </ul>
            </div>
            <div class="row">						
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Listado de Productos</h4>
                                <a href="#" @click.prevent="Nuevo()" class="btn btn-primary btn-round ml-auto">Nuevo</a>
                            </div>
                            <div class="card-tools">
                                
                            </div>
                            <div class="card-body">                                                
                                <div class="table-responsive">
                                    <table  class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Unidad</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>P.Unitario (Venta)</th>
                                                <th>Tiene Igv (Venta)</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in form.items" role="row">
                                                <td>{{index}}</td>
                                                <td>{{row.unit_type_id}}</td>
                                                <td>{{row.name}}</td>
                                                <td>{{row.stock}}</td>
                                                <td>{{row.sale_unit_price}}</td>
                                                <td>{{row.has_igv}}</td>
                                                <td><div class="form-button-action">
				                                    <a href="#" title="Editar" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
													<button href="#" class="btn btn-link btn-danger btn-lg" title="" data-original-title="Delete Task"><i class="fa fa-times"></i></button>
								                </div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                                                        
                            </div>
                        </div>                                                
                    </div>
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
            }
        },
        async created() {
            await this.initForm()
            await this.getRecords()
        },
        methods:{
            initForm() {
                this.errors = {}
                this.form = {}
            },
            getRecords(){
                this.$http.get(`/${this.resource}/table`).then((response) => {
                    this.form = response.data
                    console.log(response)
                });
            },
            Nuevo(){
                location.href = '/items/create'
            },
        }
    }
</script>
