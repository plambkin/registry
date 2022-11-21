<template>
    {{ countDown }}
    <button type="button" v-on:click="countdown = 5"> setTimeout </button>
</template>

<script>
    export default {
        name: 'Countman',

        data() {
            return {
                countDown : 0
            }
        },
        method: {},
        watch: {
            countdown: function(val) {
                if(val > 0) {
                    setTimeout(() => {
                        this.countdown -= 1;
                    }, 1000);
                }
            },
        }
    }

</script>
