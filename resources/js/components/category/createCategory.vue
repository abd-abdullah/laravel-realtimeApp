<template>
    <!-- Default form login -->
    <b-container class="bg-white min-vh-100">
        <b-row>
            <b-col cols="12">
                <form @submit.prevent="submit" @reset.prevent="cancel">
                    <b-row class="pt-4">
                        <b-col cols="10">
                            <input v-model="form.name" type="text" placeholder="Category name" id="name"
                                   class="form-control"/>
                        </b-col>
                        <b-col cols="">
                            <div v-if="editId">
                                <button class="btn btn-outline-dark" type="submit">Update</button>
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                            </div>
                            <div v-else>
                                <button class="btn btn-success " type="submit">Add</button>
                            </div>
                        </b-col>
                    </b-row>
                </form>
            </b-col>

            <b-col cols="12 mt-4 mb-4">
                <div class="card text-left border-primary">
                    <div class="card-header bg-primary text-white">
                        <div>Category List</div>
                    </div>
                    <div class="">
                        <b-list-group class="text-left">
                            <b-list-group-item class="d-flex justify-content-between align-items-center" v-for="(category,index) in categories" :key="category.id">{{category.name}}
                                <div>
                                    <button @click="edit(category.id, index)" class="btn btn-sm btn-success">Edit</button>
                                    <button @click="destroy(category.id, index)"  class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </b-list-group-item>
                        </b-list-group>
                    </div>
                </div>
            </b-col>
        </b-row>
    </b-container>
    <!-- Default form login -->
</template>

<script>
    export default {
        name: "createCategory",
        data() {
            return {
                form: {
                    name: null,
                },
                categories :{},
                errors :{},
                editId:null,

            }
        },
        created(){
           this.getAll();
        },
        methods: {

            create(){
                axios.post('api/category', this.form)
                    .then(resData => {
                        this.categories.unshift(resData.data);
                        this.form.name = null;
                    }).catch(error => {
                    //this.errors = error.response.data.errors
                });
            },

            update(){
                axios.patch(`api/category/${this.editId}`, this.form)
                    .then(resData => {
                        this.categories.unshift(resData.data);
                        this.form.name = null;
                    }).catch(error => {
                    //this.errors = error.response.data.errors
                });
            },

            submit() {
                this.editId ? this.update() : this.create();
            },

            cancel() {
                this.editId = null;
                this.form.name = null;
                this.getAll();

            },

            destroy(id, index){
                axios.delete(`/api/category/${id}`)
                    .then(resData =>{
                        this.categories.splice(index,1);
                    });
            },
            edit(id,index){
                this.form.name = this.categories[index].name;
                this.editId = id;
                this.categories.splice(index,1);
            },

            getAll(){
                axios.get('/api/category')
                    .then(resData => {
                        this.categories = resData.data.data;
                    }).catch(error=> {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>