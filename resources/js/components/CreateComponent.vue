<template>
    <div>
        <div className="mb-3">
            <input type="text" v-model="name" id="name" placeholder="Name">
        </div>
        <div className="mb-3">
            <input type="number" v-model="age" id="age" placeholder="Age">
        </div>
        <div className="mb-3">
            <input type="text" v-model="job" id="job" placeholder="Job">
        </div>
        <div className="mb-3">
            <input type="submit" value="Add" @click.prevent="addPerson">
        </div>
    </div>
</template>

<script>

export default {
    name: 'CreateComponent',
    data() {
        return {
            name: null,
            age: null,
            job: null
        }
    },
    mounted() {

    },
    methods: {
        addPerson() {
            axios.post('/api/people', {
                name: this.name,
                age: this.age,
                job: this.job
            }).then(res => {
                this.name = null,
                    this.age = null,
                    this.job = null
            })
        },
        someMethod(){
            console.log("Test")
        }
    }
}
</script>

<style scoped>

</style>
