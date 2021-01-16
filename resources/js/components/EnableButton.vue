<template>
    <div>
        <button class="btn btn-primary" @click="statusFestival" v-text="buttonText"></button>
    </div>
</template>

<script>
export default {
    props: ['festivalId', 'enable'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {
        return {
            status: this.enable,
        }
    },

    methods: {
        statusFestival() {
            axios.post('/status/' + this.festivalId).then(response => {
                if(this.status === '1') {
                    this.status = '0';
                } else {
                    this.status = '1'
                }
            }).catch(errors => {
                if (errors.response.status === 401) {
                    window.location = '/login';
                }
            });
        }
    },

    computed: {
        buttonText() {
            return (this.status === '1') ? 'disable' : 'enable';
        }
    }
}
</script>

