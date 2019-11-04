<template>
    <div class="pb-2">
        <b-list-group>
            <b-list-group-item href="#" class="flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between border-bottom mb-2">
                    <h5 class="mb-1"><b>{{reply.user}}</b></h5>
                    <small>{{reply.created_at}}</small>
                </div>
                <b-row>
                    <b-col cols="10">
                        <p class="mb-1">
                            {{reply.reply}}
                        </p>
                    </b-col>
                    <b-col cols="2 text-right" v-if="own">
                        <b-button class="btn-sm" variant="primary" @click="edit">Edit</b-button>
                        <b-button class="btn-sm" variant="danger" @click="destroy">Delete</b-button>
                    </b-col>
                </b-row>

            </b-list-group-item>

        </b-list-group>
    </div>
</template>

<script>
    export default {
        name: "reply",
        props:['reply'],
        computed:{
            own(){
                return User.own(this.reply.user_id);
            },
            destroy(id, index){
                /*axios.delete(`/api/category/${id}`)
                    .then(resData =>{
                        this.categories.splice(index,1);
                    });*/
            },
            edit(id,index){
                /*this.form.name = this.categories[index].name;
                this.editId = id;
                this.categories.splice(index,1);*/
            },
        }

    }
</script>

<style scoped>

</style>