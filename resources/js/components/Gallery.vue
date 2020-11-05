<template>
    <div>
        <h3>{{ title }}</h3>
        <p v-if="description">{{ description }}</p>
        <VueSlickCarousel v-bind="settings" v-if="images.length !== 0">
            <div v-for="image in images" class="p-1">
                <img class="w-100" :src="image.thumb"/>
            </div>
        </VueSlickCarousel>
        <vue-easy-lightbox
            :visible="visible"
            :imgs="images"
            :index="index"
            @hide="handleHide"
        ></vue-easy-lightbox>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

export default {
    name: "Gallery",

    props: ['id'],

    components: {VueSlickCarousel},

    data() {
        return {
            visible: false,
            index: 0,
            title: '',
            images: [],
            description: '',
            settings: {
                "dots": true,
                "focusOnSelect": true,
                "infinite": true,
                "speed": 500,
                "slidesToShow": 3,
                "slidesToScroll": 3,
                "touchThreshold": 5,
                "responsive": [
                    {
                        "breakpoint": 1024,
                        "settings": {
                            "slidesToShow": 3,
                            "slidesToScroll": 3,
                            "infinite": true,
                            "dots": true
                        }
                    },
                    {
                        "breakpoint": 600,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 2,
                            "initialSlide": 2
                        }
                    },
                    {
                        "breakpoint": 480,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                    }
                ]
            }
        }
    },

    mounted() {
        axios.get('/gallery/' + this.id)
            .then(data => {
                this.title = data.data.gallery.title;
                this.description = data.data.gallery.description;
                this.images = data.data.images;
            })
    },

    methods: {
        showImg(index) {
            this.index = index
            this.visible = true
        },

        handleHide() {
            this.visible = false
        }
    }
}
</script>

<style scoped>

</style>
