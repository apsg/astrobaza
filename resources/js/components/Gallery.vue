<template>
    <div>
        <h3 v-if="gallery" class="mt-3" :class="fancy ? 'bg-gradient w-50 p-1' : ''">
            {{ gallery.title }}
            <span v-if="fancy" class="float-right mr-3">
                {{ gallery.date }}
            </span>
        </h3>
        <p v-if="gallery && gallery.description && fancy">{{ gallery.description }}</p>
        <VueSlickCarousel v-bind="settings" v-if="images.length !== 0">
            <div v-for="image in images" class="p-1">
                <a :href="image.url" target="_blank">
                    <gradient :opacity="0.6" :inverse="true">
                        <img class="w-100" :src="image.thumb"/>
                        <button class="btn btn-sm btn-outline-danger remove" @click.prevent="remove(image)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </gradient>
                </a>
            </div>
        </VueSlickCarousel>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import {gallerySettings} from '../constants'

export default {
    name: "Gallery",

    props: {
        id: {
            type: Number,
            required: true
        },
        fancy: {
            type: Boolean,
            default: false
        },
        admin: {
            type: Boolean,
            default: false
        }
    },

    components: {VueSlickCarousel},

    data() {
        return {
            visible: false,
            index: 0,
            images: [],
            gallery: null,
            settings: gallerySettings
        }
    },

    mounted() {
        axios.get('/gallery/' + this.id)
            .then(data => {
                this.title = data.data.gallery.title;
                this.description = data.data.gallery.description;
                this.description = data.data.gallery.description;
                this.gallery = data.data.gallery;
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
        },

        remove(image) {
            axios.delete('/gallery/' + this.id + '/images/' + image.uuid)
                .then(() => {
                    this.images = this.images.filter(img => {
                        return img.uuid !== image.uuid;
                    });
                });
        }
    }
}
</script>

<style lang="scss" scoped>
.remove {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 2000;
}
</style>
