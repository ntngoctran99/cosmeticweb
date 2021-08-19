<template>
    <div class="content-wrapper ">
        <h4 class="title">ADD TYPE PRODUCT</h4>
        <div class="page-content">
            <div class="alert alert-danger alert-dismissible" role="alert" v-if="error">
                <b>{{ error.message }}</b>
                <ul>
                    <li v-for="(errorName, index) in error.errors" :key="index">
                        {{ errorName[0] }}
                    </li>
                </ul>
                <button type="button" class="close" @click="error = null">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form action="#" class="billing-form w-100">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label for="emailaddress">Name <span>*</span></label>
                    <input v-model="typeproduct.name" type="text" class="form-control" placeholder="" />
                </div>
                    </div>
                    <div class="col-md-12">
                <div class="form-group">
                  <label for="emailaddress">Upload Image (url) <span>*</span></label>
                  <input v-model="typeproduct.image" type="text" class="form-control" placeholder="" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="emailaddress">Description <span>*</span></label>
                  <textarea v-model="typeproduct.description"
                    class="form-control"
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                  ></textarea>
                </div>
              </div>
              <div class="col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">
                  Add Type Product
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'AddTypeProduct',
        data() {
           return {
                url: document.head.querySelector('meta[name="url"]').content,
                typeproduct: {
                    name: '',
                    description: '',
                    image:''
                },
                error: null
           }
       },
       methods: {
            createProduct() {
               try {
                  let url = this.url + '/api/type_products';
                  this.error = null
                  const response = await axios.post('/type_products', {
                      name: this.typeproduct.name,
                      image: this.typeproduct.image,
                      description: this.typeproduct.description
                  })
                   console.log(response.data.product)
               } catch (error) {
                   this.error = error.response.data.data
               }
           }
       }
    }
    </script>