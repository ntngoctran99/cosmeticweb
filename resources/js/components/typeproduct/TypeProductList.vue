
<template>
    <div class="content-wrapper ">
        <h4 class="title">LIST TYPE PRODUCTS</h4>
        <div class="page-content">
            <div class="table-responsive mb-4">
                <table class="table table-products">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody v-for="typeproduct in typeproducts" :key="typeproduct.id">
                        <!-- <div>{{typeproduct}}</div> -->
                        <tr>
                            <td class="text-center">{{ typeproduct.id }}</td>
                            <td class="text-center">{{ typeproduct.name }}</td>
                            <td class="text-center">{{ typeproduct.description }}</td>
                            <td class="text-center">{{ typeproduct.image }}</td>
                            <td class="text-center">{{ typeproduct.created_at }}</td>
                            <td class="text-center">{{ typeproduct.updated_at }}</td>
                            <td><button type="button" class="btn">
                                <span class="badge badge-light"><i class="fa fa-edit"></i> EDIT</span>
                            </button></td>
                            <td><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </button></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'TypeProductList',
        created(){
            this.loadData();
        },
        methods: {
            loadData(){
                let url = this.url + '/api/type_products';
                this.axios.get(url).then(response => {
                    this.typeproducts = response.data.data
                    console.log(this.typeproducts);
                });
            }
        },
        mounted(){
            console.log('Type Product List Component Mounted');
        },
        data(){
            return{
                url: document.head.querySelector('meta[name="url"]').content,
                typeproducts:[]
            }
        }
    }
</script>