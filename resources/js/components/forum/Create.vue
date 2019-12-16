<template>
    <div class="row container-fluid">
        <div class="badge-light col-md-6 mb-5 mt-5 offset-3 p-4">
            <h4>Question Form</h4>
            <b-form @submit.prevent="onSubmit" @reset.prevent="onReset" v-if="show">
                <b-form-group
                        label="Title:"
                        label-for="title"
                >
                    <b-form-input
                            id="title"
                            v-model="form.title"
                            type="text"
                            required
                            placeholder="Enter Title Name"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="category-group" label="Category:" label-for="category">
                    <b-form-select
                            v-model="form.category_id"
                            :options="categories"
                            value-field="id"
                            text-field="name"
                            required
                    ></b-form-select>
                </b-form-group>

                <vue-simplemde required v-model="form.body" preview-class="markdown-body" />

                <b-button :disabled="!(form.title && form.body && form.category_id)" type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Create",
        data() {
            return {
                form: {
                    title: null,
                    body: null,
                    category_id: null,

                },
                categories :[],
                show: true,
                errors:{}
            }
        },
        created(){
            axios.get ('/api/category')
            .then(resData => {
                this.categories = resData.data.data;
            }).catch(error => {
                console.log(error.response.data.errors);
            });
        },
        methods: {
            onSubmit() {
                axios.post('/api/question', this.form)
                .then(resData => {
                    this.$router.push('/question/'+resData.data.id);
                }).catch(error => {
                    this.errors = error.response.data.error
                });
            },
            onReset() {
                this.form.title = null,
                    this.form.category_id = null,
                    this.form.body = null,
                this.show = false,
                this.$nextTick(() => {
                    this.show = true
                })
            }
        }
    }
</script>