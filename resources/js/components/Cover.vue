<template>
    <div :style="style" class="cover">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "Cover",

    props: ['img'],

    data() {
        return {
            width: 100,
            height: 800
        }
    },

    mounted() {
        this.height = window.innerHeight;
    },

    computed: {
        style() {
            return "height: " + this.height + "px; "
                + "background-image: url('" + this.img + "');"
        }
    }
}
</script>

<style lang="scss" scoped>
.cover {
    width: 100%;
    height: 800px;
    background-size: cover;
}
</style>
