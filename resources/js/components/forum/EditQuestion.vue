<template>
    <div class="row container-fluid">
        <div class="offset-3 col-md-6 mt-5 mb-5">
            <h4>Edit Question</h4>
            <b-form @submit.prevent="onUpdate" v-if="show">
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

                <vue-simplemde required v-model="form.body" preview-class="markdown-body" />

                <b-button type="submit" variant="primary">Update</b-button>
                <b-button type="button" variant="secondary" @click="cancel">Cancel</b-button>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditQuestion",

        props:['question'],
        data() {
            return {
                form: {
                    title: null,
                    body: null,

                },
                show: true,
                errors: {}
            }
        },
        mounted() { //created
            this.form = this.question
        },

        methods: {
            onUpdate() {
                axios.patch(`/api/question/${this.question.id}`, this.form)
                .then(resData => {
                    this.cancel();
                }).catch(error => {
                    this.errors = error.response.data.error
                });
            },

            cancel() {
               EventBus.$emit('cancelEditing')
            }
        }
    }
</script>

<style scoped>

</style>