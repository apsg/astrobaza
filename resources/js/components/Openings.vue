<template>
    <div class="openings">
        <p class="alert alert-info">
            <i class="fa fa-info mr-3"></i> Najedź kursorem na datę by zobaczyć prognozę pogody. Prognoza pogody dostępna na
            najbliższe 7 dni.
        </p>
        <div class="d-flex pb-3" v-for="opening in openings"
             @mouseenter="show(opening.date_formatted, $event)"
             @mouseleave="hide">
            <div><i class="fa fa-calendar-day"></i> {{ opening.date_formatted }} ({{ opening.day }})</div>
            <div class="flex-fill text-center">
                -
            </div>
            <div>
                <i class="fa fa-clock "></i> <span>{{ opening.from }}</span>-<span>{{ opening.to }}</span>
                <a v-if="admin"
                   class="btn btn-outline-danger btn-sm"
                   @click.prevent="remove(opening.id)"
                >
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
        <div v-if="current" class="forecast bg-light-blue shadow-sm p-3 rounded border border-white"
             :style="forecastStyle">
            <h3>Prognoza pogody na {{ current.date }}: </h3>
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
export default {
    name: "Openings",

    props: {
        openings: {
            type: Array,
            required: true,
        },
        admin: {
            type: Boolean,
            default: false
        }
    },

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
            this.position.x = e.layerX;
            this.position.y = e.layerY + 10;

            this.current = this.forecasts.find(obj => {
                return obj.date === date;
            });
        },

        hide() {
            this.current = null;
        },

        remove(id) {
            axios.delete('/openings/' + id).then(() => {
                location.reload();
            });
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

    & > div {
        cursor: pointer;
    }

    .forecast {
        position: absolute;
        z-index: 100;
    }
}
</style>
