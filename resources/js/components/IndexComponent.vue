<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" class="btn btn-success" @click.prevent="changeEditPersonId(person.id, person.name, person.age, person.job)">Edit</a></td>
                    <td><a href="#" class="btn btn-danger" @click.prevent="deletePeople(person.id)" :class="isEdit(person.id) ? 'd-none' : ''">Delete</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td>
                        <input type="text" v-model="name" class="form-control">
                    </td>
                    <td>
                        <input type="number" v-model="age" class="form-control">
                    </td>
                    <td>
                        <input type="text" v-model="job" class="form-control">
                    </td>
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    data() {
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: ''
        }
    },
    mounted() {
        this.getPeople()
        this.$parent.$refs.create.someMethod()
    },
    methods: {
        getPeople() {
            axios.get('/api/people')
                .then(data => {
                    this.people = data.data
                })
        },

        updatePerson(id){
            this.editPersonId = null
            axios.patch(`/api/people/${id}`,{
                name: this.name,
                age: this.age,
                job: this.job
            })
            .then(data => {
                this.getPeople()
            })
        },

        changeEditPersonId(id, name, age, job)
        {
            this.editPersonId = id
            this.name = name
            this.age = age
            this.job = job
        },

        isEdit(id) {
            return this.editPersonId === id
        },

        deletePeople(id) {
            axios.delete(`/api/people/${id}`)
                .then(data => {
                    this.getPeople()
                })
        }
    }
}
</script>

<style scoped>

</style>
