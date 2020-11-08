<template>
    <div class="openings">
        <div class="d-flex pb-3" v-for="opening in openings"
             @mouseenter="show(opening.date_formatted, $event)"
             @mouseleave="hide">
            <div>{{ opening.date_formatted }}</div>
            <div class="flex-fill text-center">
                -
            </div>
            <div>godziny: <span>{{ opening.from }}</span>-<span>{{ opening.to }}</span></div>
        </div>
        <div v-if="current" class="forecast bg-light-blue shadow-sm p-3" :style="forecastStyle">
            <h3>Prognoza pogody: </h3>
            Zachód słońca: {{ current.sunset }} <br/>
            Temperatura: {{ current.temp }}&deg;C <br/>
            Zachmurzenie: {{ current.clouds }}% <br/>
            <div class="text-center">
                <img :src="current.icon"/> <br/>
                {{ current.description }}
            </div>
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
            position: {
                x: 0,
                y: 0
            }
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

        show(date, e) {
            console.log(e);

            this.position.x = e.layerX;
            this.position.y = e.layerY;

            this.current = this.forecasts.find(obj => {
                return obj.date === date;
            });
        },

        hide() {
            console.log('mouseleave');
            this.current = null;
        }
    },

    computed: {
        forecastStyle() {
            return `left: ${this.position.x}px; top: ${this.position.y}px;`;
        }
    }
}
</script>

<style lang="scss" scoped>
.openings {
    position: relative;

    & > *{
        cursor: pointer;
    }

    .forecast {
        position: absolute;
        z-index: 100;
    }
}
</style>
