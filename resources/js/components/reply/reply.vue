<template>
    <div class="pb-2">
        <b-list-group>
            <b-list-group-item class="flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between border-bottom mb-2">
                    <h5 class="mb-1"><b>{{reply.user}},</b>
                        <small> {{reply.created_at}}</small>
                    </h5>


                    <like :reply="reply"></like>

                </div>
                <edit-reply
                        v-if="editing"
                        :reply=reply
                >
                </edit-reply>
                <b-row v-else>
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
    import EditReply from './editReply';
    import Like from '../likes/like';
    export default {
        name: "reply",
        props:['reply', 'index'],
        components:{EditReply, Like},
        data(){
            return {
                editing:false
            }
        },
        created(){
            this.listen();
        },
        computed:{
            own(){
                return User.own(this.reply.user_id);
            }
        },
        methods:{
            destroy(){
                EventBus.$emit('deleteReply', this.index);
            },
            edit(){
                this.editing = true;
            },
            listen(){
                EventBus.$on('cancelEditing', () =>{
                    this.editing = false;
                });
            }
        }

    }
</script>

<style scoped>

</style>