<template>
    <div>
        <div class="d-flex pb-3" v-for="opening in openings" @mouseenter="show(opening.date_formatted)"
             @mouseleave="hide">
            <div>{{ opening.date_formatted }}</div>
            <div class="flex-fill text-center">
                -
            </div>
            <div>godziny: <span>{{ opening.from }}</span>-<span>{{ opening.to }}</span></div>
        </div>
        <div v-if="current">
            Prognoza pogody: <br />
            Zachód słońca: {{ current.sunset }} <br />
            Temperatura: {{ current.temp }}&deg;C <br />
            Zachmurzenie: {{ current.clouds }}% <br />
            <img :src="current.icon" />
            {{ current.description }}
        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    name: "Openings",

    props: ['openings'],

    data() {
        return {
            forecasts: null,
            current: null,
        }
    },

    mounted() {
        this.fetchWeather();
    },

    methods: {
        fetchWeather() {
            axios.get('/weather')
                .then(data => {
                    this.forecasts = data.data.data;
                });
        },

        show(date) {
            this.current = this.forecasts.find(obj => {
                return obj.date === date;
            });
        },

        hide() {
            console.log('mouseleave');
            this.current = null;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
