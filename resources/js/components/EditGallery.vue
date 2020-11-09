<template>
    <div class="text-black">
        <div class="form-group">
            <label>Tytuł </label>
            <input class="form-control" v-model="title" @change="save">
        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea class="form-control" v-model="description" @change="save"></textarea>
        </div>

        <vue-dropzone
            class="w-100 h-25"
            v-if="id"
            ref="myVueDropzone"
            id="dropzone"
            :options="dropzoneOptions"
            v-on:vdropzone-removed-file="removeFile"
        ></vue-dropzone>
    </div>
</template>

<script>
// import FileUpload from 'vue-upload-component';
import vue2Dropzone from 'vue2-dropzone';

export default {
    name: "EditGallery",

    components: {
        vueDropzone: vue2Dropzone
    },

    data() {
        return {
            id: null,
            title: null,
            description: null,
            images: [],
            dropzoneOptions: {
                url: '/gallery',
                thumbnailWidth: 150,
                maxFilesize: 10,
                addRemoveLinks: true,
                dictDefaultMessage: "DODAJ ZDJĘCIA",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        }
    },

    methods: {
        save() {
            axios.post('/gallery' + (this.id ? "/" + this.id : ''), {
                title: this.title,
                description: this.description,
            }).then(r => {
                this.setId(r.data.id);
            });
        },

        setId(id) {
            this.id = id;
            this.dropzoneOptions.url = '/gallery/' + id + '/images';
        },

        loadGallery(id) {
            console.log(id);
            axios.get('/gallery/' + id).then(r => {
                this.setId(r.data.gallery.id);
                this.title = r.data.gallery.title;
                this.description = r.data.gallery.description;
                this.images = r.data.images;
            });
        },

        removeFile(file) {
            console.log(file);
            axios.delete(this.dropzoneOptions.url + '/' + file.upload.uuid);
        }
    }
}
</script>

<style scoped>

</style>
