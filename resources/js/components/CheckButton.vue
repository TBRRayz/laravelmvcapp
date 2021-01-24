<template>
    <div>
        <button class="btn btn-primary" @click="checkFestival" v-text="buttonText"></button>
    </div>
</template>

<script>
export default {
    props: ['festivalId', 'checkIns'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {
        return {
            status: this.checkIns,
        }
    },

    methods: {
        checkFestival() {
            axios.post('/check/' + this.festivalId).then(response => {
                this.status = ! this.status;
            }).catch(errors => {
                if (errors.response.status === 401) {
                    window.location = '/login';
                }
            });
        }
    },

    computed: {
        buttonText() {
            return (this.status) ? 'Ceck-Out' : 'Check-In';
        }
    }
}
</script>
