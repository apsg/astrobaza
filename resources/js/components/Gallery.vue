<template>
    <div>
        <h3 v-if="gallery" class="mt-3 col-md-6 col-sm-12" :class="fancy ? 'bg-gradient p-1' : ''">
            {{ gallery.title }}
            <span v-if="fancy" class="float-right mr-3">
                {{ gallery.date }}
            </span>
        </h3>
        <p v-if="gallery && gallery.description && fancy">{{ gallery.description }}</p>
        <VueSlickCarousel v-bind="settings" v-if="images.length !== 0">
            <div v-for="image in images" class="p-1">
                <a :href="image.url" target="_blank" @click.prevent="show(image)">
                    <gradient :opacity="0.6" :inverse="true">
                        <img class="w-100" :src="image.thumb"/>
                        <button class="btn btn-sm btn-outline-danger remove" @click.prevent="remove(image)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </gradient>
                </a>
            </div>
        </VueSlickCarousel>
        <div class="preview" @click="hide" v-if="showPreview">
            <div class="image w-100 h-100 d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-outline-secondary hide-preview" @click="hide">
                    <i class="fa fa-times"></i>
                </a>
                <img :src="currentImage">
            </div>
        </div>
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
            settings: gallerySettings,
            currentImage: null,
            showPreview: false
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
            });

        window.addEventListener('keyup', this.keyboardListener);
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
        },

        show(image) {
            this.currentImage = image.url;
            this.showPreview = true;
        },

        hide() {
            this.showPreview = false;
        },

        keyboardListener(e) {
            if (e.code === 'Escape')
                this.hide();
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

.preview {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 2000;
    transition: 0.5s;
    padding: 10px;

    .image {
        img {
            max-width: 100%;
            max-height: 100%;
        }
    }

    .hide-preview {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2100;
    }
}
</style>
