<template>
    <b-card-group deck>
        <b-card header="Categories">
            <b-list-group>
                <b-list-group-item v-for="category in categories" :key="category.id" class="d-flex justify-content-between align-items-center" href="#some-link">
                    {{category.name}}
                    <b-badge variant="primary" pill>14</b-badge>
                </b-list-group-item>
            </b-list-group>
        </b-card>
    </b-card-group>
</template>

<script>
    export default {
        name: "AppSidebar",
        data(){
            return {
                categories:{}
            }
        },
        created(){
            axios.get('/api/category')
                .then(resData => {
                    this.categories = resData.data.data;
                }).catch(error=> {
                console.log(error);
            });
        }
    }
</script>

<style scoped>

</style>