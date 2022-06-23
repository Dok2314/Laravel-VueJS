<template>
    <div>
        <CreateComponent ref="create"></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";

export default {
    name: "PostComponent",
    components: {
        IndexComponent,
        CreateComponent
    },
    mounted() {

    },
    methods: {
        parentLog() {
            console.log('This is parent component log!')
        }
    }
}
</script>

<style scoped>

</style>
