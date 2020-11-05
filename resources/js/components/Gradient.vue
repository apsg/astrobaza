<template>
    <div class="overlay-container">
        <slot></slot>
        <div class="overlay bg-gradient"
             :class="inverse? 'overlay-inverse' : ''"
             :style="style"></div>
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
        },
        inverse: {
            type: Boolean,
            default: false
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

    .overlay-inverse {
        opacity: 0 !important;

        &:hover {
            opacity: 0.65 !important;
        }
    }
}
</style>
