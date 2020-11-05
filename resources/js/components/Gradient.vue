<template>
    <div class="overlay-container">
        <slot></slot>
        <div class="overlay bg-gradient" :style="style"></div>
    </div>
</template>

<script>
export default {
    name: "Gradient",

    props: {
        hover: {
            type: Boolean,
            default: true
        },
        opacity: {
            type: Number,
            default: 0.85
        }
    },

    computed: {
        style() {
            return `opacity: ${this.opacity};`;
        }
    }
}
</script>

<style lang="scss">
.overlay-container {
    position: relative;

    .overlay {
        position: absolute;
        z-index: 1000;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        transition: 0.3s;

        &:hover {
            opacity: 0 !important;
        }
    }
}
</style>
